<?php $this->assign('title','Sight');?>
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <script type="text/javascript">
        var page = document.getElementById("sight");
        page.className="active";
    </script>
    <table class="table">
            <?php   
                    for($i=0; $i<$lig;$i++)
                    {
                        echo('<tr>');
                        for($j=0;$j<$col;$j++)
                        {
                            echo('<td>');
                            
                            if(abs($fighter->coordinate_x-$j)+abs($fighter->coordinate_y-$i)>$fighter->skill_sight)
                            {
                                echo 'x';
                            }
                            // A l'intérieur du champ de vision
                            if(abs($fighter->coordinate_x-$j)+abs($fighter->coordinate_y-$i)<=$fighter->skill_sight
                               &&!($j==$fighter->coordinate_x&&$i==$fighter->coordinate_y))
                            {
                                
                                $t=0;
                                $l=0;
                                foreach($pos_y as $y)
                                {

                                    foreach($pos_x as $x)
                                    { 

                                        if($l == $t)
                                        {
                                            if($j == $x->coordinate_x && $i == $y->coordinate_y)
                                            {
                                                echo 'B';
                                            }
                                            else
                                            {
                                                echo '_';
                                            }
                                        }
                                        $l += 1;

                                    }
                                    $l=0;
                                    $t += 1;
                                }
                            }
                            if($j==$fighter->coordinate_x&&$i==$fighter->coordinate_y) //perso
                            {
                                echo 'A';
                            }
                            echo('</td>');
                        }
                        echo('</tr>');
                        };
            ?>
            
        </table>
        <?php echo $this->Form->postButton('haut', ['action' => 'setPlayerPosition',$fighter->id,$fighter->coordinate_x,($fighter->coordinate_y-1)]);
        echo $this->Form->postButton('bas', ['action' => 'setPlayerPosition',$fighter->id,$fighter->coordinate_x,($fighter->coordinate_y+1)]);
        echo $this->Form->postButton('gauche', ['action' => 'setPlayerPosition',$fighter->id,($fighter->coordinate_x-1),$fighter->coordinate_y]);
        echo $this->Form->postButton('droite', ['action' => 'setPlayerPosition',$fighter->id,($fighter->coordinate_x+1),$fighter->coordinate_y]);
        echo $this->Form->postButton('add event', ['action' => 'addEvent',$fighter->coordinate_x,$fighter->coordinate_y]); ?>
</body>
