<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "formulary";

// Crear conexión

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión

if ($conn->connect_error) 
{
  die("Conexión fallida: " . $conn->connect_error);
}


// Verificar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

  // Recoger los datos del formulario

  $nombre = $_POST['nombre'];  
  $apellidos = $_POST['apellidos'];
  $email = $_POST['email'];
  $telefono = $_POST['telefono'];
  $asunto = $_POST['asunto'];
  $mensaje = $_POST['mensaje'];

  // Preparar la sentencia SQL

  $stmt = $conn->prepare("INSERT INTO opiniones (nombre, apellidos, email, telefono, asunto, mensaje) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssss", $nombre, $apellidos, $email, $telefono, $asunto, $mensaje);

  $sql = "INSERT INTO opiniones (nombre, apellidos, email, telefono, asunto, mensaje) VALUES ('$nombre', '$apellidos', '$email', '$telefono', '$asunto', '$mensaje')";

}

 // Ejecutar la sentencia SQL

$stmt->execute();

if ($conn->query($sql) === TRUE) 
{
  echo "Nuevo registro creado exitosamente";
} else 
{
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo "Nuevo registro creado exitosamente";

$stmt->close();
$conn->close();
?>
