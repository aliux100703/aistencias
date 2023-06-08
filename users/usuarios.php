<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <style>
    .sidebar {
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      width: 250px;
      background-color: #f8f9fa;
      padding: 20px;
    }

    .sidebar-logo {
      text-align: center;
      margin-bottom: 20px;
    }

    .sidebar-logo img {
      max-width: 100%;
      height: auto;
    }

    .sidebar-menu {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    .sidebar-menu-item {
      margin-bottom: 10px;
    }

    .sidebar-menu-link {
      display: block;
      padding: 8px;
      color: #333;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .sidebar-menu-link:hover {
      background-color: #e9ecef;
    }

    .content {
      margin-left: 250px;
      padding: 20px;
    }
  </style>
  <title>Panel de Control</title>
</head>
<body>
  <div class="sidebar">
    <div class="sidebar-logo">
      <img src="assets/logo-inicio.png" alt="Logo">
    </div>
    <ul class="sidebar-menu">
      <li class="sidebar-menu-item">
        <a href="index.php" class="sidebar-menu-link">Inicio</a>
      </li>
      
      <li class="sidebar-menu-item">
        <a href="usuarios.php" class="sidebar-menu-link active">Usuarios</a>
      </li>
      <li class="sidebar-menu-item">
      <a href="../login/login.php?cerrar_sesion=2" class="bot1">Cerrar sesión</a>
      </li>
    </ul>
  </div>
  <div class="content">
  
    <h1>Contenido de Usuarios</h1>
    <div class="container-sm">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Sistemas</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Marketing</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Juridico</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
      <ul>
        <?php
          // Ejemplo de conexión a la base de datos
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "asistencias";


          $conn = new mysqli($servername, $username, $password, $dbname);

          if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
          }

          // Consulta para obtener los empleados del área 1
          $sql = "SELECT * FROM empleado WHERE area_id = 1";
          $result = $conn->query($sql);

          // Iterar sobre los resultados y mostrar la información de cada empleado
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<li>ID: " . $row["id"] . ", Nombre: " . $row["nombre"] . ", Apellidos: " . $row["apellidos"] . "</li>";
            }
          } else {
            echo "No se encontraron empleados en el área 1.";
          }

          $conn->close();
        ?>
      </ul>
    </div>
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
      <ul>
        <?php
          // Ejemplo de conexión a la base de datos
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "asistencias";

          $conn = new mysqli($servername, $username, $password, $dbname);

          if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
          }

          // Consulta para obtener los empleados del área 2
          $sql = "SELECT * FROM empleado WHERE area_id = 2";
          $result = $conn->query($sql);

          // Iterar sobre los resultados y mostrar la información de cada empleado
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<li>ID: " . $row["id"] . ", Nombre: " . $row["nombre"] . ", Apellidos: " . $row["apellidos"] . "</li>";
            }
          } else {
            echo "No se encontraron empleados en el área 2.";
          }

          $conn->close();
        ?>
      </ul>
    </div>
    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
      <ul>
        <?php
          // Ejemplo de conexión a la base de datos
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "asistencias";


          $conn = new mysqli($servername, $username, $password, $dbname);

          if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
          }

          // Consulta para obtener los empleados del área 3
          $sql = "SELECT * FROM empleado WHERE area_id = 3";
          $result = $conn->query($sql);

          // Iterar sobre los resultados y mostrar la información de cada empleado
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              echo "<li>ID: " . $row["id"] . ", Nombre: " . $row["nombre"] . ", Apellidos: " . $row["apellidos"] . "</li>";
            }
          } else {
            echo "No se encontraron empleados en el área 3.";
          }

          $conn->close();
        ?>
      </ul>
    </div>
  </div>
</div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
