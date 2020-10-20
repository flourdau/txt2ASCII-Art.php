<?php

function loopTxt(string $T = "HelloWorld", int $L = 4, int $H = 5) : ?string {
    $tmp = [];
    $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ?";
    $ROW = "";
    
    $tmp = str_split(trim($T));

    $handle = @fopen(__DIR__ . "/ascii.txt", "r");
    if ($handle) {
        while ($buffer = stream_get_line($handle, 256 + 1, "\n") ) {
            foreach ($tmp as $c) {
                $position = mb_stripos($alpha, $c);
                if ($position === false) {
                    $position = 26;
                }
                $ROW .= mb_substr($buffer, ($position * $L), $L);
            }
            $ROW .= "\n";
        }
        if (!feof($handle)) {
            echo "Erreur: fopen() a échoué\n";
        }
        fclose($handle);
        return $ROW;
    }
    return NULL;
}

print_r(loopTxt("Youpi"));
die;
