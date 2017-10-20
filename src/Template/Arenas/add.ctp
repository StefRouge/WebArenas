<h1>Ajouter un combattant</h1>
        <?php
            


            echo $this->Form->create();
            echo "Name";
            echo $this->Form->input('name');
            echo "Avatar";
            echo $this->Form->radio(
    				'Logo',
    				[
        				['value' => '1', 'text' => 'Logo 1'],
        				['value' => '2', 'text' => 'Logo 2'],
    				]
			);
            echo $this->Form->button(__('OK'));
            echo $this->Form->end();
        ?>
<?= $this->Html->image("/img/Logo1.jpg", ['alt' => 'Logo1']);?>
logo1
<?= $this->Html->image("/img/Logo2.jpg", ['alt' => 'Logo2']);?>
logo2