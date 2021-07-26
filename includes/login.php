<?php

session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user']='';
    $_SESSION['nome']='';
    $_SESSION['tipo']='';
}

function logout(){
  
    unset($_SESSION['user']);
    unset($_SESSION['nome']);
    unset($_SESSION['tipo']);
    
}

function gerarhash($senha){

    $texto= enigma($senha);
    $hash= password_hash($texto,PASSWORD_DEFAULT);
    return $hash;
}
function testarhash($senha,$hash){
    $ok = password_verify($senha,$hash);
    return $ok;
}
function enigma($senha){
    $c=null;
    for($pos=0; $pos < strlen($senha);$pos++){
           $letra=ord($senha[$pos])+23.7;
           $c.=chr($letra);
    }
    return $c;
}
/* OLWAGOWAGAWGAWGAW MARCY */
/* Salve Salve Curitiba */





?>