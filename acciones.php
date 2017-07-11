<?php

   if($_POST){
	$json = json_encode($_POST);
	$json2 = json_decode($json, true);
    //print_r($json2);
    $user = generaPass();
	$pass = generaPass();

    $mysql = new mysqli('localhost','root','19019122','webservice'); 

    if ($mysql->connect_error) {
      die("Connection failed: " . $mysql->connect_error);
    }

    $sql="INSERT INTO usuarios VALUES('".$user."', '".$pass."', '".$json2['nombre']."', '".$json2['apellido']."', '".$json2['email']."', '".$json2['phone']."', CURDATE());";
    //echo $sql;
    

    if ($mysql->query($sql) === TRUE) {
      echo "New record created successfully";
      header('Location: index.php');

    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $mysql->close();
  }



function generaPass(){
    	//Se define una cadena de caractares. Te recomiendo que uses esta.
    	$cadena = "MAYAPRUEBAdesifM4R10Y4lF0nS0rado23445";
    	//Obtenemos la longitud de la cadena de caracteres
    	$longitudCadena=strlen($cadena);
     
    	//Se define la variable que va a contener la contraseña
    	$pass = "";
    	//Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
    	$longitudPass=10;
     
    	//Creamos la contraseña
    	for($i=1 ; $i<=$longitudPass ; $i++){
        		//Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
        		$pos=rand(0,$longitudCadena-1);
        		//Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
        		$pass .= substr($cadena,$pos,1);
    	}
    	return $pass;
	}


?>