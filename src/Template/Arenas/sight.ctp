<!DOCTYPE HTML>

<html lang="en"> 
	
	<head> 
        <script src="script.js"></script>
		<title>My Resumee</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="CV.css">
	</head> 
	
	<body>
        <!--<button action = setPlayerPosition(,$pos_,$pos_y+1)> </button>-->
        <?php
        /*echo $form->create($hero[0]);
        echo $form->hidden('id');
        echo $form->end('Haut');*/
        ?>
        <table>
            <?php   
                    for($i=0; $i<20;$i++)
                    {
                        echo('<tr>');
                        for($j=0;$j<30;$j++)
                        {
                            echo('<td>');
                            if(abs($pos_x-$j)+abs($pos_y-$i)>$vision) 
                            {
                                echo 'x';
                            }
                            if(abs($pos_x-$j)+abs($pos_y-$i)<=$vision
                               &&!($j==$pos_x&&$i==$pos_y))
                            {
                                echo '_';
                            }
                            if($j==$pos_x&&$i==$pos_y) //perso
                            {
                                echo 'A';
                            }
                            echo('</td>');
                        }
                        echo('</tr>');
                        };
            ?>
            
        </table>
        <?php echo $this->Form->postButton('haut', ['action' => 'setPlayerPosition',$hero[0]['id'],($hero[0]['coordinate_x']),$hero[0]['coordinate_y']-1]);
        echo $this->Form->postButton('bas', ['action' => 'setPlayerPosition',$hero[0]['id'],($hero[0]['coordinate_x']),$hero[0]['coordinate_y']+1]);
        echo $this->Form->postButton('gauche', ['action' => 'setPlayerPosition',$hero[0]['id'],($hero[0]['coordinate_x']-1),$hero[0]['coordinate_y']]);
        echo $this->Form->postButton('droite', ['action' => 'setPlayerPosition',$hero[0]['id'],($hero[0]['coordinate_x']+1),$hero[0]['coordinate_y']]) ?>
    </body>
</html>
