<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
	header{display: none;}
</style>

<section>
	<div style="margin-top: 50px" class="container">
		<div class="row">
			<div class="col-md-4">
				
				<div class="card">
					<label>Humano 1</label>
					<a href="#" class="thumbnail">
				      	<img src="<?php echo base_url(); ?>assets/img/humano.png" alt="...">
				    </a>

			    	<div class="progress">
					  	<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
					    	<span>12</span>
					  	</div>
					</div>

					<ul class="list-group">
					  <li class="list-group-item">Força: 1</li>
					  <li class="list-group-item">Defesa: 1</li>
					  <li class="list-group-item">Agilidade: 2</li>
					  <li class="list-group-item">Arma: Espada longa</li>
					  <li class="list-group-item">Dano da arma: 2</li>
					  <li class="list-group-item">Dado: 1d6</li>
					</ul>				
			    </div>

			</div>

			<div class="col-md-4">
				<img src="<?php echo base_url(); ?>assets/img/combate.jpg" width="100%">
				<br/>
			    <button id="decidir_atacante" class="btn btn-block btn-success">DECIDIR ATACANTE</button>
			    <button id="atacar" style="display: none" class="btn btn-block  btn-primary">ATACAR</button>
			    <button id="defender" style="display: none" class="btn btn-block btn-danger">DEFENDER OU ESQUIVAR</button>
			</div>

			<div class="col-md-4">

				<div class="card card_orc">
					<label>Orc 1</label>
					<a href="#" class="thumbnail">
				      	<img src="<?php echo base_url(); ?>assets/img/orc.png" alt="...">
				    </a>

			    	<div class="progress">
					  	<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
					    	<span>20</span>
					  	</div>
					</div>

					<ul class="list-group">
					  <li class="list-group-item">Força: 2</li>
					  <li class="list-group-item">Defesa: 0</li>
					  <li class="list-group-item">Agilidade: 0</li>
					  <li class="list-group-item">Arma: Clava de madeira</li>
					  <li class="list-group-item">Dano da arma: 0</li>
					  <li class="list-group-item">Dado: 1d8</li>
					</ul>				
			    </div>
			</div>
		</div>
	</div>
</section>