<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section>
    
    
    <div class="container">
        <a class="btn btn-primary" href="<?php echo base_url(); ?>personagem/cadastrar">Cadastrar personagem</a>

        <table style="margin-top: 2em" class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Raça</th>
                    <th>Defesa</th>
                    <th>Força</th>
                    <th>Agilidade</th>
                    <th>Vida</th>
                    <th>Tipo de arma</th>
                    <th>Dano da arma</th>
                    <th>Dado</th>
                    <th></th>
                </tr>
                <tr>
                    <td>Bruno</td>
                    <td>Humanos</td>
                    <td>2</td>
                    <td>3</td>
                    <td>4</td>
                    <td>5</td>
                    <td>6</td>
                    <td>7</td>
                    <td>8</td>
                    <td><a href="<?php echo base_url(); ?>personagem/atualizar/3" class="glyphicon glyphicon-pencil"></a></td>
                </tr>
            </thead>
        </table>
    </div>
</section>
