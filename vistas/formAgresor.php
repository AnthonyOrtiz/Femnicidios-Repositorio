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
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../diseño/css/formAgresor.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>
    <div id="formulario">
                <p>
                    <a href="agresor.php" class="btn btn-primary">Atras</a>
                </p>

                <form name="form" method="post">
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">ID:</label>
                        <div class="col-sm-10">
                        <input type="text" name="id" id="id" placeholder="Identificacion" autofocus="true" class="form-control" required="true" /></div>
                    </div>

                    <div class="form-group row">
                        <label for="nombres" class="col-sm-2 col-form-label">Nombres:</label>
                        <div class="col-sm-10">
                        <input type="text" name="nombres" id="nombres" placeholder="Nombres" autofocus="true" class="form-control" required="true" /></div>
                    </div>

                    <div class="form-group row">
                        <label for="apellidos" class="col-sm-2 col-form-label">Apellidos:</label>
                        <div class="col-sm-10">
                        <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos" autofocus="true" class="form-control" required="true" /></div>
                    </div>

                    <div class="form-group row">
                        <label for="edad" class="col-sm-2 col-form-label">Edad:</label>
                        <div class="col-sm-10">
                        <input type="number" name="edad" id='edad' value="-1" class="form-control" /></div>
                    </div>

                    <div class="form-group row">
                        <label for="ocupacion" class="col-sm-2 col-form-label">Ocupacion:</label>
                        <div class="col-sm-10">
                        <input type="text" name="ocupacion" id="ocupacion" placeholder="Ocupacion" class="form-control" required="true" /></div>
                    </div>

                    <div class="form-group row">
                        <label for="atecedentes" class="col-sm-2 col-form-label">Atecedentes:</label>
                        <div class="col-sm-10">
                        <textarea name="atecedentes" id="atecedentes" placeholder="Atecedentes" class="form-control"></textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="nacionalidad" class="col-sm-2 col-form-label">Nacionalidad:</label>
                        <div class="col-sm-10">

                            <select class="form-control" id="nacionalidad">
                                <?php 
                                    foreach ($an as $key) {

                                ?>
                                    <option value="<?php echo $key['0'] ?>" ><?php echo $key['1'] ?></option>
                                <?php
                                    }           
                                ?>
                            </select>
                        </div>
                    </div>

                    <hr />
                    <div id="formEstado">
                        <label for="idestado">Datos del estado del agresor</label>
                        <div class="form-group row">
                            <label for="idestado" class="col-sm-2 col-form-label">ID Estado:</label>
                            <div class="col-sm-10">
                            <input type="text" name="idestado" id="idestado" placeholder="ID Estado" class="form-control" required="true" /></div>
                        </div>

                        <div class="form-group row">
                            <label for="concepto" class="col-sm-2 col-form-label">Concepto:</label>
                            <div class="col-sm-10">
                            <input type="text" name="concepto" id="concepto" placeholder="Concepto" class="form-control" required="true" /></div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-sm-2 col-form-label">Descripcion:</label>
                            <div class="col-sm-10">
                            <textarea name="descripcion" id="descripcion" placeholder="Descripcion" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                <hr />
                <input type="submit" id="guardarAgresor" value="Guardar" class="btn btn-primary" />
                </form>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>  
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../js/agresor.js"></script>
</body>
</html>