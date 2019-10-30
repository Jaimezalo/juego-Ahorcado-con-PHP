<?php
session_start();


function elegirPalabra(){
    static $tpalabras = ["Madrid","Sevilla","Murcia","Malaga","Mallorca","Menorca"];
    
    $palabra = $tpalabras[array_rand($tpalabras)];
    
    return $palabra; // Devuelve una palabra al azar
}


function comprobarLetra($letra,$cadena){
    
    for($i=0; $i<strlen($cadena); $i++){
        if($cadena[$i] === $letra){            
            return true;
        }
    }     
        return false;
 
}

/*
 * Devuelve una cadena donde aparecen las letras de la cadenapalabra en su posición si
 * cada letra se encuentra en la cadenaletras
 */

function generaPalabraconHuecos ( $cadenaletras, $cadenapalabra) {
    
    $resu = $cadenapalabra;
    
    for ($i = 0; $i<strlen($resu); $i++){
        $resu[$i] = '-';
    }
    
    for ($i = 0; $i<strlen($cadenaletras); $i++){
        for($j=0; $j<strlen($cadenapalabra); $j++){
            /*if($cadenaletras[$i] == $cadenapalabra[$j]){
                $resu[$j] = $cadenaletras[$i];
            }*/
            if (strcasecmp($cadenaletras[$i], $cadenapalabra[$j]) === 0){
                $resu[$j] = $cadenaletras[$i];
            }
        }   
    }  
    if(strpos($resu, '-')===false){
        header("Location:enhorabuena.php");
    }
    return $resu;
}

?>