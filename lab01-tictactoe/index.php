<?php
    echo 'Holla holla get dolla.';
    echo '<br/>';
    $hours_worked = $_GET['hours'];
    $rate = 22;
    $total = $hours_worked * $rate;
    echo 'I made like $'.$total,' today.';
    if ($total > 1000000) {
        $wealth = 'rich';
    } else {
        $wealth = 'poor';
    }
    echo '<br/>';
    echo ($total > 0) ? 'I would say I\'m pretty '.$wealth.'.' :'Dag yo.';
?>

