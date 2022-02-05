<?php

$login = 'Missael';

var_dump( isset($login ));

if( isset($login)){
    echo '<br>Contenido Protegido';
}else {
    echo '<br>No Tiene Permiso';
}
?>