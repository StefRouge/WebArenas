<!DOCTYPE HTML>

<html lang="en"> 
	
	<head> 
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
        <?php $this->assign('title', 'Combattant');?>
	</head> 
	
	<body>
        <p> <?php  echo "Name = ", $hero[0]['name'], 
                        " Level = ", $hero[0]['level'],
                        " Exp = ", $hero[0]['xp'], 
                        " Sight = ", $hero[0]['skill_sight'],
                        " Strenght = ", $hero[0]['skill_strenght'],
                        " Health max = ", $hero[0]['skill_health'], 
                        " Current Health = ", $hero[0]['current_health'];?></p>
        
        <?php echo $this->Html->link(
            'Editer un Combattant', ['action' => 'edit', $hero[0]['id']]); ?>
        <?= $this->Form->postButton('haut', ['action' => 'setPlayerPosition',$hero[0]['id'],($hero[0]['coordinate_x']-1),$hero[0]['coordinate_y']]) ?>
        <?= $this->Form->postButton('bas', ['action' => 'setPlayerPosition',$hero[0]['id'],($hero[0]['coordinate_x']+1),$hero[0]['coordinate_y']]) ?>
        <?= $this->Form->postButton('gauche', ['action' => 'setPlayerPosition',$hero[0]['id'],($hero[0]['coordinate_x']),$hero[0]['coordinate_y']-1]) ?>
        <?= $this->Form->postButton('droite', ['action' => 'setPlayerPosition',$hero[0]['id'],($hero[0]['coordinate_x']-1),$hero[0]['coordinate_y']+1]) ?>
    </body>
</html>

