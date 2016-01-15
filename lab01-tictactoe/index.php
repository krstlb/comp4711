<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>COMP4711 Tic Tac Toe</title>
    </head>
    <body>
        <?php
        // Initialize the board and start a new game.
        if(!isset($_GET['board'])){
            $position = '---------';
        } else {
            $position = $_GET['board'];
        }
        $game = new Game($position);

        /**
         * Class Game representing the Tic Tac Toe board.
         */
        class Game
        {
            var $position;
            var $newposition;

            function __construct($squares)
            {
                $win_msg= 'I win. Muhahahaha!';
                $this->position = str_split($squares);
                if ($this->winner('x')) {
                    echo 'You win. Lucky guesses!';
                } else if ($this->winner('o')) {
                    echo $win_msg;
                } else {
                    $this->pick_move();
                    if ($this->winner('o')) {
                        echo $win_msg;
                    }
                }
                $this->display();
            }

            /**
             * Function to determine if one of the tokens have won by checking for three tokens in a row
             * (vertically, horizontally or diagonally.)
             * @param $token 'x' or 'o'
             * @return bool true if winner is found
             */
            function winner($token)
            {
                $won = false;
                // Horizontal
                for ($row = 0; $row < 3; $row++) {
                    if (($this->position[3 * $row] == $token) &&
                        ($this->position[3 * $row + 1] == $token) &&
                        ($this->position[3 * $row + 2] == $token)
                    ) {
                        $won = true;
                    }
                }
                // Vertical
                for ($col = 0; $col < 3; $col++) {
                    if (($this->position[$col] == $token) &&
                        ($this->position[$col + 3] == $token) &&
                        ($this->position[$col + 6] == $token)
                    ) {
                        $won = true;
                    }
                }
                // Diagonal TL->BR
                if ($this->position[0] == $token &&
                    $this->position[4] == $token &&
                    $this->position[8] == $token
                ) {
                    $won = true;
                }

                // Diagonal TR->BL
                if ($this->position[2] == $token &&
                    $this->position[4] == $token &&
                    $this->position[6] == $token
                ) {
                    $won = true;
                }
                return $won;
            }

            /**
             * Function to display the current gameboard.
             */
            function display()
            {
                echo '<table cols="3" style="font-size:48px; font-weight:bold">';
                echo '<tr>'; // open the first row
                for ($pos = 0; $pos < 9; $pos++) {
                    echo $this->show_cell($pos);
                    if ($pos % 3 == 2) echo '</tr><tr>'; //start a new row for the next square
                }
                echo '</tr>'; //close the last row
                echo '</table>';
            }

            /**
             * Helper function to display, showing the cell contents
             * @param $which the token to display
             * @return string html string to show cell
             */
            function show_cell($which)
            {
                $token = $this->position[$which];
                if ($token <> '-')
                    return '<td>' . $token . '</td>';

                $this->newposition = $this->position;
                $this->newposition[$which] = 'x';
                $move = implode($this->newposition);
                $link = '?board=' . $move;
                return '<td><a href="' . $link . '">-</a></td>';
            }

            /**
             * Simple AI to pick the next available cell on the board.
             */
            function pick_move()
            {
                for ($pos = 0; $pos < 9; $pos++) {
                    if ($this->position[$pos] == '-') {
                        $this->position[$pos] = 'o';
                        break;
                    }
                }
            }
        }
        ?>
    </body>
</html>