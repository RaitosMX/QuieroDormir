<?php
$usuario = $_POST['username'];
$contrasena = $_POST['password'];

if ($usuario == 'Karla' && $contrasena == '123') {
  header("Location:Tienda.php");
  exit(); 
} else {
  echo "Usuario o contraseña incorrectos";
}
?>
