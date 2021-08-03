<?php

session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user']='';
    $_SESSION['nome']='';
    $_SESSION['tipo']='';
    $_SESSION['rm']='';
}

function logout(){
  
    unset($_SESSION['user']);
    unset($_SESSION['nome']);
    unset($_SESSION['tipo']);
    unset($_SESSION['rm']);
    
}
function logado(){
    if(empty($_SESSION[''])){

        return false;
    }else{
        return true;
    }

}

function admin(){
    $t = $_SESSION['tipo'] ?? null;
    if(is_null($t)){
        return false;
    }
    else{
        if($t=='admin'){
            return true;
        }else{
            return false;
        }
    }
}

function jogador(){
    $t = $_SESSION['tipo'] ?? null;
    if(is_null($t)){
        return false;
    }
    else{
        if($t=='jogador'){
            return true;
        }else{
            return false;
        }
    }
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
           $letra=ord($senha[$pos])+2;
           $c.=chr($letra);
    }
    return $c;
}
/* OLWAGOWAGAWGAWGAW MARCY */
/* Salve Salve Curitiba */





?>