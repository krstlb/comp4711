<?php
    $position = $_GET['board'];
    $squares = str_split($position);

    if (!isset($_GET['board'])) echo 'No board set.';
    else if (winner('x',$squares)) echo 'You win.';
    else if (winner('o',$squares)) echo "HA I win.";
    else echo 'No winner yet.';

    function winner($token, $position) {
        $won = false;
        if (($position[0] == $token) &&
            ($position[1] == $token) &&
            ($position[2] == $token)) {
            $won = true;
        } else if (($position[3] == $token) &&
            ($position[4] == $token) &&
            ($position[5] == $token)) {
            $won = true;
        } else if (($position[6] == $token) &&
            ($position[7] == $token) &&
            ($position[8] == $token)) {
            $won = true;
        } else {
            $won = false;
        }
        return $won;
    }
?>


