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
    <table>
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
                            // Dans le brouillard de guerre
                            if(abs($fighter->coordinate_x-$j)+abs($fighter->coordinate_y-$i)<=$fighter->skill_sight
                               &&!($j==$fighter->coordinate_x&&$i==$fighter->coordinate_y))
                            {
                                echo '_';
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
