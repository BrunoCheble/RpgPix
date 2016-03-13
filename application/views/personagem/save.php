<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- FORMULÁRIO -->
<form style="margin-top: 2em" method="POST" class="container">
	<div class="row">

		<div class="col-md-4">
			<div class="form-group">
			  	<label for="usr">Nome do personagem:</label>
			  	<input name="nome" type="text" value="<?php echo $personagem->getNome(); ?>" class="form-control">
			</div>
			<div class="form-group">
			  	<label for="usr">Raça:</label>
			  	<select name="raca" class="form-control">
			  		<?php
				  		foreach ($racas as $raca) {
				  			$selected = !empty($personagem) && $personagem->getRaca() == $raca['id'] ? 'selected' : '';
				  			echo '<option '.$selected.' value="'.$raca['id'].'">'.$raca['nome'].'</option>';
				  		}
			  		?>
			  	</select>
			</div>
			<div class="form-group">
			  	<label name="forca" for="usr">Força:</label>
			  	<input type="text" name="forca" value="<?php echo $personagem->getForca(); ?>" class="form-control numero">
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
			  	<label for="usr">Vida:</label>
			  	<input name="vida" type="text" value="<?php echo $personagem->getVida(); ?>" class="form-control numero">
			</div>
			<div class="form-group">
			  	<label for="usr">Agilidade:</label>
			  	<input name="agilidade" type="text" value="<?php echo $personagem->getAgilidade(); ?>" class="form-control numero">
			</div>
			<div class="form-group">
			  	<label for="usr">Defesa:</label>
			  	<input name="defesa" type="text" value="<?php echo $personagem->getDefesa(); ?>" class="form-control numero">
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
			  	<label for="usr">Arma:</label>
			  	<input name="arma" type="text" value="<?php echo $personagem->getArma(); ?>" class="form-control">
			</div>
			<div class="form-group">
			  	<label for="usr">Dano da arma:</label>
			  	<input name="dano_arma" type="text" value="<?php echo $personagem->getDanoArma(); ?>" class="form-control numero">
			</div>
			<div class="form-group">
			  	<label for="usr">Dado (qtd. de lados)</label>
			  	<input name="dado" type="text" value="<?php echo $personagem->getDado(); ?>" class="form-control numero">
			</div>
		</div>

		<div class="col-md-12">
			<button type="submit" class="btn btn-success btn-block">SALVAR PERSONAGEM</button>
			<a class="btn btn-default btn-block" href="<?php echo base_url(); ?>site/index">CANCELAR E VOLTAR</a>
		</div>

	</div>
</form>