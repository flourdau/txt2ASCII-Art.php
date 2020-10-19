<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

    fscanf(STDIN, "%d", $L);
    fscanf(STDIN, "%d", $H);
    $T = stream_get_line(STDIN, 256 + 1, "\n");
    $len = strlen($T);
    $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ?";
    $ROW = [];

    $tab = [];
    for ($i = 0; $i < $H; $i++)
    {
        $ROW[$i] = stream_get_line(STDIN, 1024 + 1, "\n");
        for ($j = 0; $j < $len; $j++)
        {
            $position = mb_stripos($alpha, $T[$j]);
            if ($position === false)
            {
                $position = 26;
            }
            $tab[$j][$i] = mb_substr($ROW[$i], ($position * $L), $L);
        }
    }

    $tab2 = [];
    for ($j = 0; $j < $H; $j++)
    {
        for ($i = 0; $i < $len; $i++)
        {
            $tab2[$j] .= $tab[$i][$j];
        }
    }

    foreach ($tab2 as $line) {
        echo ("$line\n");
    }

// Write an answer using echo(). DON'T FORGET THE TRAILING \n
// To debug: error_log(var_export($var, true)); (equivalent to var_dump)
