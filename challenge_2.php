<?php

$file = file('php://stdin');
array_shift($file);

foreach ($file as $index => $line)
{
    $index++;
    $bonus = 0;
    $decNumber = $line;
    $binNumber = decbin($line);

    $sum=0;
    foreach( str_split( $binNumber ) as $bin)
    {
        if ($bin == 1)
        {
            $sum++;
        }
    }

    if ($sum == strlen( $binNumber ) )
    {
        echo "Case #$index: " . $sum . PHP_EOL;
        continue;
    }


    $arrayOnes = array_fill(1, strlen($binNumber)-1, 1);
    $bonus = strlen($binNumber)-1;
    $resto = $decNumber - bindec(implode('',$arrayOnes));

    foreach(str_split(decbin($resto)) as $bin)
    {
        if ($bin)
        {
            $bonus++;
        }
    }

    echo "Case #$index: " . $bonus . PHP_EOL;
}
?>