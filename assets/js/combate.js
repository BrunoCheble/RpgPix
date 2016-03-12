$(document).ready(function(){

	$('#decidir_atacante').click(function(){

		$.ajax({
			url: '../combate/atacar/'+$('#humano').attr('data-id'),
			success: function(humano){
				
				$.ajax({
					url: '../combate/atacar/'+$('#orc').attr('data-id'),
					success: function(orc){

						//Resete ativo
						$('.ativo').removeClass('ativo');
						$('#combate').attr('data-ataque','');
						$('#combate').attr('data-defesa','');

						gerarLog('Humano: '+humano+' | Orc: '+orc);

						if(humano == orc)
							$('#decidir_atacante').click();
						else if(humano > orc)
							$('#humano').addClass('ativo');
						else
							$('#orc').addClass('ativo');

						$('#decidir_atacante').hide();
						$('#atacar').show();
					}
				});
			}
		});
	});

	$('#atacar').click(function(){

		$atacante = $('.ativo');

		$.ajax({
			url: '../combate/atacar/'+$atacante.attr('data-id'),
			success: function(ataque){
				gerarLog('Pts. de Ataque: '+ataque);

				$('#combate').attr('data-ataque',ataque);

				$('#orc,#humano').toggleClass('ativo');
				
				$('#atacar').hide();
				$('#defesa').show();
			}
		});
	});

	$('#defesa').click(function(){
		
		$defensor = $('.ativo');

		$.ajax({
			url: '../combate/atacar/'+$defensor.attr('data-id'),
			success: function(defesa){

				$('#combate').attr('data-defesa',defesa);
	
				if(defesa >= parseInt($('#combate').attr('data-ataque')))
					gerarLog('Pts. de Defesa: '+defesa+' (desviou)');
				else{
					gerarLog('Pts. de Defesa: '+defesa);
					calculaDano();
				}

				$('.ativo').removeClass('ativo');
				$('#defesa').hide();
				$('#decidir_atacante').show();				
			}
		});
	});

	var calculaDano = function()
	{		
		var defensor = $('.ativo');
		
		if($('#orc').hasClass('ativo'))
			atacante = $('#orc');
		else
			atacante = $('#humano');

		$.ajax({
			url: '../combate/calculaDano',
			method: 'POST',
			async : false,
			data: {
				id: atacante.attr('data-id'),
				vida: defensor.find('.vida').text()
			},
			success: function(e)
			{
				res = $.parseJSON(e);

				gerarLog('Pts. de Dano: '+res['dano']+' | Pts. de vida: '+res['vida']);

				calcularProporcao(res['vida']);

				if(res['vida'] < 1)
					vencedor();
			}
		});
	}

	var vencedor = function()
	{
		$('#orc,#humano').toggleClass('ativo');
		$('.ativo').addClass('vencedor');
		$('#batalha').hide();
		$('#log').css('height','auto');
		$('#vencedor').show().text($('.vencedor .nome').text()+" VENCEU!");
		
	}

	var calcularProporcao = function(vida_atual)
	{
		$defensor = $('.ativo');

		var vida_ini    = $defensor.find('.vida').attr('data-vida');
		vida_atual_perc = (vida_atual * 100)/vida_ini; // Regra de três

		$defensor.find('.vida').text(vida_atual);
		$defensor.find('.progress-bar').css('width',vida_atual_perc+'%');
	}

	var gerarLog = function(text)
	{
		$('#log ul').prepend('<li class="list-group-item">'+text+'</li>');
	}

});