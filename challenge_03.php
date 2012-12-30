<?php

$file = file("php://stdin");

$soluciones = array();
$orderedArray = $file;
sort($orderedArray);
$aorderedArray = array_reverse($orderedArray);

foreach( $orderedArray as $element)
{
    $indexMin = array_search($element, $file);
    foreach($aorderedArray as $aelement)
    {
        $indexMax = array_search($aelement, $file);

        if ($indexMax > $indexMin)
        {
            $gain = ($aelement - $element);
            $soluciones[$gain] = array('elementos' => $element . ' ' .$aelement,'indexMin'=>$indexMin, 'indexMax' => $indexMax);
            goto breaking;
        }
    }

    breaking:
}

$indexSolucion = max(array_keys($soluciones));

echo $soluciones[$indexSolucion]['indexMin'] * 100 . ' ' . $soluciones[$indexSolucion]['indexMax'] * 100 .  ' ' . $indexSolucion;
