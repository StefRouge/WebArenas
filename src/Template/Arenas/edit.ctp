<h1>Ajouter un combattant</h1>
        <?php
            echo $this->Form->create($fighter);
            echo $this->Form->input('name');
            echo $this->Form->input('player_id');
            echo $this->Form->input('coordinate_x');
            echo $this->Form->input('coordinate_y');
            echo $this->Form->input('level');
            echo $this->Form->input('xp');
            echo $this->Form->input('skill_sight');
            echo $this->Form->input('skill_strength');
            echo $this->Form->input('skill_health');
            echo $this->Form->input('current_health');
            echo $this->Form->button(__('Sauvegarder le combattant'));
            echo $this->Form->end();
        ?>