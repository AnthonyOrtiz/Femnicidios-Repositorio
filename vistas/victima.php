<?php 
session_start();
require_once("../clases/victima.php");
require_once("../clases/nacionalidad.php");

$nacionalidad = new nacionalidad();
$an = $nacionalidad->getNacionalidades();

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Repositorio feminicidios</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../diseño/css/victima.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>
	<header>
		<nav id="menu">
			<ul>

			  <li><a href="index.php">Home</a></li>
			  <li><a href="feminicidios.php">Feminicidios</a></li>	
			  <li><a href="victima.php">Victima</a></li>
			  <li><a href="agresor.php">Agresor</a></li>
			  <li><a href="#">Ubicacion</a>
			    <ul>
			      <li><a href="#">Pais</a></li>
			      <li><a href="#">Municipio</a></li>
			      <li><a href="#">Estado</a></li>
			    </ul>
			  </li>
			</ul>
		</nav>
	</header>
	<main>
		<div id='formulario'>
			<a href="formVictima.php" class="btn btn-primary">Agregar</a>
		</div>
		<div>
			<table class="table table-hover">
				<thead class="thead-dark">
                    <tr class="info">
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Ocupacion</th>
                        <th>Nacionalidad</th>
                        <th>Funciones</th>
                    </tr>
                </thead>
                <tbody>
                	<?php 
						$victima = new victima();
		              	$a = $victima->getVictimas();

		              	foreach ($a as $dato) {
		            		
		            ?>
		            	<tr>
        		
		            		<td>
		            			<input type="hidden" name="" value='<?php if(isset($dato['0'])){echo $dato['0'];}else{echo "";}?>'>
		            			<span><?php if(isset($dato['0'])){echo $dato['0'];}else{echo "";}?></span>
		            		</td>
		            		<td>
		            			<input type="" value="<?php if(isset($dato['1'])){echo $dato['1'];}else{echo "";}?>" name="">	
		            		</td>
		            		<td>
		            			<input type="" value="<?php if(isset($dato['2'])){echo $dato['2'];}else{echo "";}?>" name="">	
		            		</td>
		            		<td>
		            			<input type="number" value="<?php if(isset($dato['3'])){echo $dato['3'];}else{echo "";}?>" name="">	
		            		</td>
		            		<td>
		            			<input type="" value="<?php if(isset($dato['4'])){echo $dato['4'];}else{echo "";}?>" name="">	
		            		</td>
		            		<td>
		            			<!--<input type="" value="<?php if(isset($dato['5'])){echo $dato['5'];}else{echo "";}?>" name="">-->
		            			
		            			<select name="dias" id="dias"  > 

									<?php 
										foreach ($an as $key) {
											if ($key['1'] == $dato['5']) {
									?>
												<option value="<?php echo $key['0'] ?>" selected="selected" ><?php echo $key['1'] ?></option>
									<?php			
											}else{
									?>
												<option value="<?php echo $key['0'] ?>" ><?php echo $key['1'] ?></option>
									<?php			
											}
									?>		
										
									<?php

										}
									 ?>
									
								</select>

		            		</td>
		            		<td>
		            			<input type="button" name="Actualizar" id="Actualizar" value="Actualizar">
		            			<input type="button" name="Borrar" id="Borrar" value="Borrar">
		            		</td>

		            	</tr>
		            <?php

		              	}

		            ?>

                </tbody>
			</table>
			
		</div>
	</main>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>  
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../js/victima.js"></script>
</body>
</html>