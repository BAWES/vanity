<?php
/* @var $agentActivity Activity */
/* @var $userActivity Activity */
/* @var $adminActivity Activity */
?>
<h2>Latest Admin Activity</h2>
<ul>
    <?php 
    foreach($adminActivity as $activity){
        echo "<li><b>".$activity->datetime."</b> - ".$activity->text."</li>";
     } 
    ?>
</ul>

<h2>Latest Agent Activity</h2>
<ul>
    <?php 
    foreach($agentActivity as $activity){
        echo "<li><b>".$activity->datetime."</b> - ".$activity->text."</li>";
     } 
    ?>
</ul>

<h2>Latest User Activity</h2>
<ul>
    <?php 
    foreach($userActivity as $activity){
        echo "<li><b>".$activity->datetime."</b> - ".$activity->text."</li>";
     } 
    ?>
</ul>
