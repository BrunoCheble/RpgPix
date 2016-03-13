<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
	header{display: none;}
</style>

<section>
	<div style="margin-top: 50px" class="container">
		<div class="row">
			<div id="humano" data-id="<?= $humano->getId(); ?>" style="opacity: 1" class="col-md-4">
				
				<div class="card">
					<label class="nome"><?= $humano->getNome(); ?></label>
					<a href="#" class="thumbnail">
				      	<img src="<?php echo base_url(); ?>assets/img/humano.png" alt="...">
				    </a>

			    	<div class="progress">
					  	<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
					    	<span data-vida="<?= $humano->getVida(); ?>" class="vida"><?= $humano->getVida(); ?></span>
					  	</div>
					</div>

					<ul class="list-group">
					  <li class="list-group-item">Força: <b class="forca"><?= $humano->getForca(); ?></b></li>
					  <li class="list-group-item">Defesa: <b class="defesa"><?= $humano->getDefesa(); ?></b></li>
					  <li class="list-group-item">Agilidade: <b class="agilidade"><?= $humano->getAgilidade(); ?></b></li>
					  <li class="list-group-item">Arma: <b class="arma"><?= $humano->getArma(); ?></b></li>
					  <li class="list-group-item">Dano da arma: <b class="dano_arma"><?= $humano->getDanoArma(); ?></b></li>
					  <li class="list-group-item">Dado: <b class="dado">1d<?= $humano->getDado(); ?></b></li>
					</ul>
			    </div>

			</div>

			<div class="col-md-4">
				<h3 id="vencedor" style="text-align: center; display: none;"></h3>
				<div id="batalha">
					<img id="combate" src="<?php echo base_url(); ?>assets/img/combate.jpg" data-ataque="" data-defesa="" width="100%">
					<br/>
				    <button id="decidir_atacante" class="btn btn-block btn-success">DECIDIR ATACANTE</button>
				    <button id="atacar" style="display: none" class="btn btn-block  btn-primary">ATACAR</button>
				    <button id="defesa" style="display: none" class="btn btn-block btn-danger">DEFENDER OU ESQUIVAR</button>
				    <br/>
				    <label>Log da batalha</label>
				    <br/>
			    </div>
			    <div id="log" style="height: 150px; overflow-y: auto;"></div>
			</div>

			<div id="orc" data-id="<?= $orc->getId(); ?>" class="col-md-4">

				<div class="card card_orc">
					<label class="nome"><?= $orc->getNome(); ?></label>
					<a href="#" class="thumbnail">
				      	<img src="<?php echo base_url(); ?>assets/img/orc.png" alt="...">
				    </a>

			    	<div class="progress">
					  	<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
					    	<span data-vida="<?= $orc->getVida(); ?>" class="vida"><?= $orc->getVida(); ?></span>
					  	</div>
					</div>

					<ul class="list-group">
					  <li class="list-group-item">Força: <b class="forca"><?= $orc->getForca(); ?></b></li>
					  <li class="list-group-item">Defesa: <b class="defesa"><?= $orc->getDefesa(); ?></b></li>
					  <li class="list-group-item">Agilidade: <b class="agilidade"><?= $orc->getAgilidade(); ?></b></li>
					  <li class="list-group-item">Arma: <b class="arma"><?= $orc->getArma(); ?></b></li>
					  <li class="list-group-item">Dano da arma: <b class="dano_arma"><?= $orc->getDanoArma(); ?></b></li>
					  <li class="list-group-item">Dado: <b class="forca">1d<?= $orc->getDado(); ?></b></li>
					</ul>				
			    </div>
			</div>
		</div>
	</div>
</section>