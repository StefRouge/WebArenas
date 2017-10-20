<h1>Editer un combattant</h1>
<?php
    echo $this->Form->create($fighter);
    echo "add sight";
    echo $this->Form->checkbox('skill_sight');
    echo "add strenght";
    echo $this->Form->checkbox('skill_strength');
    echo "add health";
    echo $this->Form->checkbox('skill_health');
    echo $this->Form->button(__('OK'));
    echo $this->Form->end();
?>