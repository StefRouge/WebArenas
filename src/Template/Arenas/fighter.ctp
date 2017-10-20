<?php $this->assign('title','Fighter');?>
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    
    <section class="container-fluid">
    
        <div class="row">
		<?= $this->Html->image($img, ['alt' => 'Logo']);?>
		</div>
        
        <?php foreach ($fighter as $f): ?>
        <div class="row">
            <p> Name : <?= $f->name?></p>
        </div>
        <div class="row">
            <p> Level : <?= $f->level?></p>
        </div>
        <div class="row">
            <p> XP : <?= $f->xp?></p>
        </div>
        <div class="row">
            <p> Strength : <?= $f->skill_strength?></p>
        </div>
        <div class="row">
            <p> Sight : <?= $f->skill_sight?></p>
        </div>
        <div class="row">
            <p> Health : <?= $f->current_health?> / <?= $f->skill_health?></p>
        </div>
        <br>
        <?php endforeach;?>
        
        <?= $this->Form->postButton('level up', ['action' => 'setFighterLevel',$fighter[0]->id]);?>	
        <?= $this->Form->postButton('logo 1', ['action' => 'changeLogo',1]);?>	
        <?= $this->Form->postButton('logo 2', ['action' => 'changeLogo',2]);?>	
    </section>

    
    
    <script type="text/javascript">
        var page = document.getElementById("fighter");
        page.className="active";
    </script>
    
</body>