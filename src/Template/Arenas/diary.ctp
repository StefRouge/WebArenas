<?php $this->assign('title','Diary');?>
<!DOCTYPE html>
<html>
<head>
    
</head>
<body>
    <script type="text/javascript">
        var page = document.getElementById("diary");
        page.className="active";
    </script>
    <section class="container-fluid">
        
        <?php foreach ($diary as $d): ?>
            <div class="row">
            <?= $d->name;?>
            </div>
 
            <div class="row">
                Coord : x = <?= $d->coordinate_x;?> ; y = <?= $d->coordinate_y;?>
            </div>
        
            <div class="row">
            <?= $d->date;?>
            </div>
        
            <br/>
        
        <?php endforeach;?>
        
    </section>
        
</body>