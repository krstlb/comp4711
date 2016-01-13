<?php
    echo 'Holla holla get dolla.';
    echo '<br/>';
    $hours_worked = 8.5;
    $rate = 22;
    $total = $hours_worked * $rate;
    echo 'I made like $'.$total,' today.';
    if ($total > 1000000) {
        $wealth = 'poor';
    } else {
        $wealth = 'rich';
    }
    echo '<br/>';
    echo ($total > 0) ? 'I would say I\'m pretty '.$wealth.'.' :'Dag yo.';
?>