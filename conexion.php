<?php
Class Conexion{
private $dsn = 'mysql:host=localhost;dbname=asistencias';
private $usuario = 'root';
private $contrasena = '';
protected $conexion;
private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);

public function open(){
try {
    $this ->conexion = new PDO($this -> dsn, $this ->usuario,$this -> contrasena, $this ->options);
    return $this->conexion; 
    // Exepcion..
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

}
public function close(){
    $this->conexion = null;
}
}
?>