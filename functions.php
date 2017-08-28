<?php
function body_request1($size){
    $body_request2 = "";
    for ($i = 1; $i <= $size; $i++) {
        $valor = $_POST['valor' . $i];
        if(!is_numeric($valor))
            $valor = '"'.$valor.'"';
        
        if ($i == $size)
            $body_request2 = $body_request2 . '"' . $_POST['atributo' . $i] . '": ' . $valor . '';
        else
            $body_request2 = $body_request2 . '"' . $_POST['atributo' . $i] . '": ' . $valor . ', ';
    }
    $body_request2 = '{ ' . $body_request2 . ' }';
    return $body_request2;
}

function database_query1($size){
    $atrs = '';
    $vls = '';
    
    for ($i = 1; $i <= $size; $i++) {
        $valor = $_POST['valor' . $i];
        if(!is_numeric($valor))
            $valor = "'".$valor."'";
        if ($i == $size){
            $atrs = $atrs.$_POST['atributo' . $i];
            $vls = $vls.$valor;
        }
        else{
            $atrs = $atrs.$_POST['atributo' . $i].', ';
            $vls = $vls.$valor.', ';
        }
    }
    $query = 'INSERT INTO '.$_POST['nome_tabela'].' ('.$atrs.', enabled) VALUES('.$vls.', true)';
    return $query;
}

function body_request2($size){
    $body_request2 = '"'.$_POST['nome_uri'].'Id":1, ';
    for ($i = 1; $i <= $size; $i++) {
        $valor = $_POST['valor' . $i];
        if(!is_numeric($valor))
            $valor = '"'.$valor.'"';
        
        if ($i == $size)
            $body_request2 = $body_request2 . '"' . $_POST['atributo' . $i] . '": ' . $valor . '';
        else
            $body_request2 = $body_request2 . '"' . $_POST['atributo' . $i] . '": ' . $valor . ', ';
    }
    $body_request2 = '{ ' . $body_request2 . ' }';
    return $body_request2;
}

function database_query2($size){
    $atrs = '';
    
    for ($i = 1; $i <= $size; $i++) {
        $valor = $_POST['valor' . $i];
        if(!is_numeric($valor))
            $valor = "'".$valor."'";
        
        if ($i == $size){
            $atrs = $atrs. $_POST['atributo' . $i] .'= '.$valor;
        }
        else{
            $atrs = $atrs. $_POST['atributo' . $i] .'= '.$valor.', ';
        }
    }
    $query = 'UPDATE '.$_POST['nome_tabela'].' SET '.$atrs. ' WHERE id_'.$_POST['nome_uri'].'=1';
    return $query;
}

function database_query3(){
    
    $query = 'UPDATE '.$_POST['nome_tabela'].' SET enabled=false WHERE id_'.$_POST['nome_uri'].'=1';
    return $query;
}

function database_query4($size){
    $atrs = '';
    
    for ($i = 1; $i <= $size; $i++) {
        if ($i == $size){
            $atrs = $atrs.$_POST['atributo' . $i];
        }
        else{
            $atrs = $atrs.$_POST['atributo' . $i].', ';
        }
    }
    $query = 'SELECT '.$atrs.' FROM '.$_POST['nome_tabela'].' WHERE enabled= true';
    return $query;
}

function body_response1($size){
    $response = '[  '.body_request1($size).' ]';
    return $response;
}

function database_query5($size){
    $query = database_query4($size).' AND id_'.$_POST['nome_uri'].'=1';
    return $query;
}