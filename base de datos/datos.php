<?php

$conecxion = mysqli_connect("localhost","root","","registro");
// if(!$conecxion){
//   echo "Error al conectar";
// }else {
//   echo "Conectado a la base de datos";
// }

$name = $_POST['name'];
$apellido = $_POST['apellido'];
$user = $_POST['user'];
$dia = $_POST['dia'];
$mes = $_POST['mes'];
$ano = $_POST['ano'];
$sexo = $_POST['sexo'];
$email = $_POST['email'];
$clave = $_POST['clave'];

$insertar = "INSERT INTO usuarios(name, apellido, user, dia, mes, ano, sexo, email, clave) VALUES ('$name', '$apellido', '$user', '$dia', '$mes','$ano', '$sexo', '$email', '$clave')";
$verificar_user = mysqli_query($conecxion, "SELECT * FROM usuarios WHERE user ='$user'");
if (mysqli_num_rows($verificar_user) > 0) {
  echo
      '<script>
        alert("El Usuario ya esta registrado");
        window.history.go(-1);
      </script>';
      exit;
}
$verificar_user = mysqli_query($conecxion, "SELECT * FROM usuarios WHERE email ='$email'");
if (mysqli_num_rows($verificar_user) > 0) {
  echo
      '<script>
        alert("El Correo ya esta registrado");
        window.history.go(-1);
      </script>';
      exit;
}

//registrar



$resultado = mysqli_query($conecxion, $insertar);
if (!$resultado) {

  echo "Error al registrar";
}
else {
  echo "Usuario Registrado Correctamente";

}

mysqli_close($conecxion);
