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
                        " Strenght = ", $hero[0]['skill_strength'],
                        " Health max = ", $hero[0]['skill_health'], 
                        " Current Health = ", $hero[0]['current_health'];?></p>
        
        <?php echo $this->Html->link(
            'Editer un Combattant', ['action' => 'edit', $hero[0]['id']]); ?>
    </body>
</html>

