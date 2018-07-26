<?php 
session_start();
require_once("../clases/feminicidio.php");
require_once("../clases/tipoAsesinato.php");
require_once("../clases/municipio.php");
require_once("../clases/vinculo.php");

$tipoAsesinato = new tipoAsesinato();
$an = $tipoAsesinato->getTipoAsesinatos();

$municipio = new municipio();
$am = $municipio->getMunicipios();

$feminicidio = new feminicidio();
$victima = $feminicidio->getVictimas();

$agresor = $feminicidio->getAgresores();

$vinculo = new vinculo();
$av = $vinculo->getVinculos();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title></title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../diseño/css/formFeminicidio.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
</head>
<body>
    <div id="formulario">
                <p>
                    <a href="feminicidios.php" class="btn btn-primary">Atras</a>
                </p>

                <form name="form" method="post">
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">ID:</label>
                        <div class="col-sm-10">
                        <input type="text" name="id" id="idfeminicidio" placeholder="Identificacion" autofocus="true" class="form-control" required="true" /></div>
                    </div>

                    <div class="form-group row">
                        <label for="fecha" class="col-sm-2 col-form-label">Fecha:</label>
                        <div class="col-sm-10">
                        <input type="date" name="fecha" value="<?php echo date('Y-m-d',strtotime('01/01/2000'));?>" id="fecha" placeholder="Fecha" autofocus="true" class="form-control" required="true" /></div>
                    </div>

                    <div class="form-group row">
                        <label for="hora" class="col-sm-2 col-form-label">Hora:</label>
                        <div class="col-sm-10">
                        <input type="time" name="hora" id="hora" placeholder="Hora" autofocus="true" class="form-control" required="true" /></div>
                    </div>

                    <div class="form-group row">
                        <label for="detalle" class="col-sm-2 col-form-label">Detalle:</label>
                        <div class="col-sm-10">
                            <textarea name="detalle" id='detalle' placeholder="Detalle" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tipoAsesinato" class="col-sm-2 col-form-label">Tipo asesinato:</label>
                        <div class="col-sm-10">
                            <select name="tipoAsesinato" id="tipoAsesinato"  > 

                                    <?php 
                                        foreach ($an as $key) {
                                    ?>
                                            <option value="<?php echo $key['0']; ?>"><?php echo $key['1'] ?></option> 
                                        
                                    <?php

                                        }
                                     ?>
                                    
                                </select>
                        </div>
                    </div>

                    <hr />

                    <div id="formDireccion">
                        <label for="direccion">Datos de la direccion del feminicidio</label>
                        <div class="form-group row">
                            <label for="idireccion" class="col-sm-2 col-form-label">ID Direccion:</label>
                            <div class="col-sm-10">
                            <input type="text" name="idireccion" id="iddirecccion" placeholder="ID Direccion" class="form-control" required="true" /></div>
                        </div>

                        <div class="form-group row">
                            <label for="descripcion" class="col-sm-2 col-form-label">Descripcion:</label>
                            <div class="col-sm-10">
                            <textarea name="descripcion" id="descripcion" placeholder="Descripcion" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="direccion" class="col-sm-2 col-form-label">Direccion:</label>
                            <div class="col-sm-10">
                                <select name="idmunicipio" id="idmunicipio"  > 

                                    <?php 
                                        foreach ($am as $key) {
                                    ?>
                                            <option value="<?php echo $key['0']; ?>"><?php echo $key['1'] ?></option> 
                                        
                                    <?php

                                        }
                                     ?>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                <hr />
                <div id="formVictima">
                    <label for="victima">Datos de la victima</label>
                    <div class="form-group row">
                        <label for="victima" class="col-sm-2 col-form-label">Victima:</label>
                        <div class="col-sm-10">
                            <select name="idvictima" id="idvictima"  > 

                                <?php 
                                    foreach ($victima as $key) {
                                ?>
                                        <option value="<?php echo $key['0']; ?>"><?php echo $key['0'].': '.$key['1'].'-'.$key['2']?></option>
                                    
                                <?php

                                    }
                                 ?>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <hr />
                <div id="formVictima">
                    <label for="agresor">Datos del agresor</label>
                    <div class="form-group row">
                        <label for="agresor" class="col-sm-2 col-form-label">Agresor:</label>
                        <div class="col-sm-10">
                            <select name="idagresor" id="idagresor"  > 

                                <?php 
                                    foreach ($agresor as $key) {
                                ?>
                                        <option value="<?php echo $key['0']; ?>"><?php echo $key['0'].': '.$key['1'].'-'.$key['2']?></option>
                                    
                                <?php

                                    }
                                 ?>
                                
                            </select>
                        </div>
                    </div>
                </div>
                <hr />
                <div id="formLazo">
                    <label for="lazo">Datos de la relacion</label>
                    <div class="form-group row">
                        <label for="vinculo" class="col-sm-2 col-form-label">Vinculo:</label>
                        <div class="col-sm-10">
                            <select name="idvinculo" id="idvinculo"  > 

                                <?php 
                                    foreach ($av as $key) {
                                ?>
                                        <option value="<?php echo $key['0']; ?>" ><?php echo $key['1']?></option>
                                    
                                <?php

                                    }
                                 ?>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tiempoRelacion" class="col-sm-2 col-form-label">Tiempo relacion:</label>
                        <div class="col-sm-10">
                        <input type="" name="tiempoRelacion" id="tiempoRelacion" placeholder="Tiempo relacion" autofocus="true" class="form-control" required="true" /></div>
                    </div>
                </div>
                <hr />
                <input type="submit" id="guardarFeminicidio" value="Guardar" class="btn btn-primary" />
                </form>
    </div>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>  
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../js/feminicidio.js"></script>
</body>
</html>