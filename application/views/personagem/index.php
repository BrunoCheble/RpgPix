<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    
    <div style="margin-top: 2em" class="container">
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
            </thead>
            <tbody>
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
                        $html .= '<td>1d'.$personagem->getDado().'</td>';
                        $html .= '<td><a href="'.base_url().'site/atualizar/'.$personagem->getId().'" class="glyphicon glyphicon-pencil"></a> <a href="'.base_url().'site/deletar/'.$personagem->getId().'" class="glyphicon glyphicon-remove"></a></td>';

                        $html .= '</tr>';

                        echo $html;
                    }
                ?>
            </tbody>
        </table>

        <nav>
            <ul class="pagination">
                <li>
                  <a href="<?php echo base_url().'site/index/'.($page > 1 ? ($page- 1) : $page); ?>" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>

                <?php
                for ($i=1; $i <= $count; $i++) { 
                    $selected = $page == $i ? 'class="active"' : '';
                    echo '<li '.$selected.'><a href="'.base_url().'site/index/'.$i.'">'.$i.'</a></li>';
                }
                ?>
                
                <li>
                  <a href="<?php echo base_url().'site/index/'.($page < $count ? ($page+1) : $page); ?>" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
            </ul>
        </nav>

    </div>
