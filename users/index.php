<?php

    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: ../login/login.php');
    }else{
        if($_SESSION['rol'] != 2){
            header('location: ../login/login.php');
        }
    }


?>
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
  
    <h1>Bienvenido</h1>
    
    <br>
    
    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-5b6b17b9" data-id="5b6b17b9" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
			<div class="elementor-widget-wrap elementor-element-populated">
								<section class="elementor-section elementor-inner-section elementor-element elementor-element-7c95923d elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="7c95923d" data-element_type="section">
						<div class="elementor-container elementor-column-gap-default">
					<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-3f81af31" data-id="3f81af31" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-245b3db4 elementor-widget elementor-widget-heading animated fadeInDown" data-id="245b3db4" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeInDown&quot;}" data-widget_type="heading.default">
				<div class="elementor-widget-container">
			<h2 class="elementor-heading-title elementor-size-default">Dale mayor valor<br>a tu empresa</h2>		</div>
				</div>
				<div class="elementor-element elementor-element-7acdc66d elementor-widget elementor-widget-text-editor animated fadeIn" data-id="7acdc66d" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;fadeIn&quot;}" data-widget_type="text-editor.default">
				<div class="elementor-widget-container">
							<div class="page" title="Page 2"><div class="section"><div class="layoutArea"><div class="column"><p>Te ayudamos a tener enfoque en las actividades clave del negocio, aligerar procesos administrativos que te puedan restar tiempo, mejorar el clima laboral y la salud financiera.</p></div></div></div></div>						</div>
				</div>
					</div>
		</div>
				<div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-7c08b25f" data-id="7c08b25f" data-element_type="column">
			<div class="elementor-widget-wrap elementor-element-populated">
								<div class="elementor-element elementor-element-6a9e523b elementor-widget__width-initial elementor-absolute elementor-widget-tablet__width-initial elementor-widget-mobile__width-initial elementor-widget elementor-widget-image" data-id="6a9e523b" data-element_type="widget" data-settings="{&quot;_position&quot;:&quot;absolute&quot;}" data-widget_type="image.default">
				<div class="elementor-widget-container">
															<img decoding="async" width="800" height="760" src="https://bechapra.com/wp-content/uploads/2022/11/b-bechapra-09-1024x973.png" data-src="https://bechapra.com/wp-content/uploads/2022/11/b-bechapra-09-1024x973.png" class="attachment-large size-large lazy loaded" alt="" data-srcset="https://bechapra.com/wp-content/uploads/2022/11/b-bechapra-09-1024x973.png 1024w, https://bechapra.com/wp-content/uploads/2022/11/b-bechapra-09-300x285.png 300w, https://bechapra.com/wp-content/uploads/2022/11/b-bechapra-09-768x730.png 768w, https://bechapra.com/wp-content/uploads/2022/11/b-bechapra-09-13x12.png 13w, https://bechapra.com/wp-content/uploads/2022/11/b-bechapra-09.png 1046w" data-sizes="(max-width: 800px) 100vw, 800px" sizes="(max-width: 800px) 100vw, 800px" srcset="https://bechapra.com/wp-content/uploads/2022/11/b-bechapra-09-1024x973.png 1024w, https://bechapra.com/wp-content/uploads/2022/11/b-bechapra-09-300x285.png 300w, https://bechapra.com/wp-content/uploads/2022/11/b-bechapra-09-768x730.png 768w, https://bechapra.com/wp-content/uploads/2022/11/b-bechapra-09-13x12.png 13w, https://bechapra.com/wp-content/uploads/2022/11/b-bechapra-09.png 1046w" data-was-processed="true">															</div>
				</div>
				<div class="elementor-element elementor-element-3602c42c elementor-widget elementor-widget-spacer" data-id="3602c42c" data-element_type="widget" data-widget_type="spacer.default">
				<div class="elementor-widget-container">
					<div class="elementor-spacer">
			<div class="elementor-spacer-inner"></div>
		</div>
				</div>
				</div>
				<div class="elementor-element elementor-element-8c8e56d elementor-align-center elementor-tablet-align-justify elementor-widget elementor-widget-button" data-id="8c8e56d" data-element_type="widget" data-widget_type="button.default">
				<div class="elementor-widget-container">
					<div class="elementor-button-wrapper">
			<a href="https://bechapra.com/nuestros-servicios/" class="elementor-button-link elementor-button elementor-size-sm" role="button">
						<span class="elementor-button-content-wrapper">
						<span class="elementor-button-text">Servicios</span>
		</span>
					</a>
		</div>
				</div>
				</div>
					</div>
		</div>
							</div>
		</section>
					</div>
		</div>
    
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
