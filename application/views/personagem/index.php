<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section>
    
    
    <div class="container">
        <a class="btn btn-primary" href="<?php echo base_url(); ?>site/cadastrar">Cadastrar personagem</a>

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
                <?php
                    foreach ($personagens as $personagem) {
                        
                        $html = '<tr>';
                        $html .= '<td>'.$personagem->getNome().'</td>';
                        $html .= '<td>'.$personagem->getNomeRaca().'</td>';
                        $html .= '<td>'.$personagem->getDefesa().'</td>';
                        $html .= '<td>'.$personagem->getForca().'</td>';
                        $html .= '<td>'.$personagem->getAgilidade().'</td>';
                        $html .= '<td>'.$personagem->getVida().'</td>';
                        $html .= '<td>'.$personagem->getArma().'</td>';
                        $html .= '<td>'.$personagem->getDanoArma().'</td>';
                        $html .= '<td><a href="'.base_url().'site/atualizar/'.$personagem->getId().'" class="glyphicon glyphicon-pencil"></a> <a href="'.base_url().'site/deletar/'.$personagem->getId().'" class="glyphicon glyphicon-remove"></a></td>';

                        $html .= '</tr>';

                        echo $html;
                    }
                ?>
            </thead>
        </table>
    </div>
</section>
