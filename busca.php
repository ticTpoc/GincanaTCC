<?php

/* busca */

$busca = $banco->query("SELECT * FROM USUARIOS");

if(!$busca){
    echo "<p> pani no cistema: $banco->error </p>";
}
while ($reg = $busca->fetch_object()){
    print_r($reg);
}



?>