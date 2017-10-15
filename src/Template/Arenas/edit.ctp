<h1>Ajouter un combattant</h1>
        <?php
            echo $this->Form->create($fighter);
            echo $this->Form->hidden('coordinate_x');
            echo $this->Form->button(__('Sauvegarder le combattant'));
            echo $this->Form->end();
        ?>