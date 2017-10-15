<h1>Editer un combattant</h1>
        <?php
            echo $this->Form->create($fighter);
            echo $this->Form->input('skill_sight');
            echo $this->Form->input('skill_strenght');
            echo $this->Form->input('skill_health');
            echo $this->Form->button(__('Sauvegarder le combattant'));
            echo $this->Form->end();
        ?>