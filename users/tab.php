<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <style>
    .container-sm {
      max-width: 576px;
    }
  </style>
  <title>Document</title>
</head>
<body>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
