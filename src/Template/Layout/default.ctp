<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <?= $this->Html->charset() ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    
    <?= $this->Html->css('webarena.css') ?>
    <?= $this->Html->css('bootstrap.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="container">
         <nav class="navbar navbar-default">
             <div class="container-fluid">
                 <ul class ="nav navbar-nav ">
                    <li id="index"><?php echo $this->Html->link('Home', array('controller' => 'Arenas', 'action' => 'index'));?></li>
                    <li id="login"><?php echo $this->Html->link('Login', array('controller' => 'Arenas', 'action' => 'login'));?></li>
                    <li id="diary"><?php echo $this->Html->link('Diary', array('controller' => 'Arenas', 'action' => 'diary'));?></li>
                    <li id="sight"><?php echo $this->Html->link('Sight', array('controller' => 'Arenas', 'action' => 'sight'));?></li>
                    <li id="fighter"><?php echo $this->Html->link('Fighter', array('controller' => 'Arenas', 'action' => 'fighter'));?></li>
                 </ul>
             </div>
        </nav>
    </div>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
    <footer>
        <p>Victor Bigand - Stéphane Rouge - Achille Burah - Lucas Mattioli<br>ING 4 SI Gr03  Options DF</p>
    </footer>
</body>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- <script src="../../dist/js/bootstrap.min.js"></script> -->
    <?= $this->Html->script('bootstrap.min.css') ?>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</html>
