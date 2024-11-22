<?php

function parseToXML($htmlStr)
{
$xmlStr=str_replace('<','&lt;',$htmlStr);
$xmlStr=str_replace('>','&gt;',$xmlStr);
$xmlStr=str_replace('"','&quot;',$xmlStr);
$xmlStr=str_replace("'",'&#39;',$xmlStr);
$xmlStr=str_replace("&",'&amp;',$xmlStr);
return $xmlStr;
}

header("Content-type: text/xml");

echo "<?xml version='1.0' ?>";
echo '<markers>';


foreach($viviendas as $i){
    echo '<marker id_vivienda="'.$i->id_vivienda.'" direccion_vivienda="'.parseToXML($i->direccion_vivienda).'" lat="'.$i->latitud_vivienda.'" lng="'.$i->longitud_vivienda.'" ></marker>';
}

echo '</markers>';

?>