<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- FORMULÁRIO -->
<form style="margin-top: 2em" method="POST" class="container">
	<div class="row">

		<div class="col-md-4">
			<div class="form-group">
			  	<label for="usr">Nome do personagem:</label>
			  	<input type="text" value="<?php echo !empty($personagem) ? $personagem['nome'] : ''; ?>" class="form-control">
			</div>
			<div class="form-group">
			  	<label for="usr">Raça:</label>
			  	<select class="form-control">
			  		<?php
				  		foreach ($racas as $raca) {
				  			$selected = !empty($personagem) && $personagem['raca'] == $raca['id'] ? 'selected' : '';
				  			echo '<option '.$selected.' value="'.$raca['id'].'">'.$raca['nome'].'</option>';
				  		}
			  		?>
			  	</select>
			</div>
			<div class="form-group">
			  	<label for="usr">Força:</label>
			  	<input type="text" value="<?php echo !empty($personagem) ? $personagem['forca'] : ''; ?>" class="form-control numero">
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
			  	<label for="usr">Vida:</label>
			  	<input type="text" value="<?php echo !empty($personagem) ? $personagem['vida'] : ''; ?>" class="form-control numero">
			</div>
			<div class="form-group">
			  	<label for="usr">Agilidade:</label>
			  	<input type="text" value="<?php echo !empty($personagem) ? $personagem['agilidade'] : ''; ?>" class="form-control numero">
			</div>
			<div class="form-group">
			  	<label for="usr">Defesa:</label>
			  	<input type="text" value="<?php echo !empty($personagem) ? $personagem['defesa'] : ''; ?>" class="form-control numero">
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">
			  	<label for="usr">Arma:</label>
			  	<input type="text" value="<?php echo !empty($personagem) ? $personagem['arma'] : ''; ?>" class="form-control numero">
			</div>
			<div class="form-group">
			  	<label for="usr">Dano da arma:</label>
			  	<input type="text" value="<?php echo !empty($personagem) ? $personagem['dano_arma'] : ''; ?>" class="form-control numero">
			</div>
			<div class="form-group">
			  	<label for="usr">Dado (qtd. de lados)</label>
			  	<input type="text" value="<?php echo !empty($personagem) ? $personagem['dado'] : ''; ?>" class="form-control numero">
			</div>
		</div>

		<div class="col-md-12">
			<button class="btn btn-success btn-block">SALVAR PERSONAGEM</button>
			<a class="btn btn-default btn-block" href="<?php echo base_url(); ?>personagem/index">CANCELAR E VOLTAR</a>
		</div>

	</div>
</form>
