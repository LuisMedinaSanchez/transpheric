<?php
$titulo = 'Modificar registro';
include_once '../app/Conexion.inc.php';
include_once '../app/ValidadorLogin.inc.php';
include_once '../app/ControlSesion.inc.php';
include_once '../app/redireccion.inc.php';
include_once '../app/config.inc.php';
include_once '../app/cn.php';
include_once '../plantillas/a.php';
include_once '../plantillas/navbar.php';
include_once '../plantillas/navbar_opciones.php';
if (ControlSesion::sesion_iniciada()) {
    
} else {
    Redireccion::redirigir(SERVIDOR);
}//redireccionamos gente indeseable
$id_visitas = $_REQUEST['id_visitas'];
$sql = "SELECT * FROM visitas WHERE id_visitas = '$id_visitas' ";
$resultado = mysqli_query($conexion, $sql);
$mostrar = $resultado->fetch_assoc();
?>
<div class="container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Modificar los datos de la visita
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" enctype="multipart/form-data" action="app/cambios?id_visitas=<?php echo $mostrar['id_visitas']; ?>">
                            <div id="collapseOne" class="">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <input type="text" required="required" value='<?php echo $mostrar['nom_visitas']; ?>' class="form-control" name="nom_visita">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="email" required="required" value='<?php echo $mostrar['mail_visita']; ?>' class="form-control" name="mail_visita">
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" required="required" value='<?php echo $mostrar['ide_oficial']; ?>' class="form-control" name="ide_oficial" placeholder="Identificacion oficial *">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-4">
                                                <input type="text" required="required" value='<?php echo $mostrar['per_visita']; ?>' class="form-control" id="per_visita" name="per_visita" placeholder="Persona a quien visitas *">
                                            </div>
                                            <div class="col-md-4">	
                                                <input type="text" required="required" value='<?php echo $mostrar['asunto']; ?>' class="form-control" name="asunto">
                                            </div>
                                            <div class="col-md-2">
                                                <label><strong class="text-danger" style="font-size: 20px"></strong> Hora de atencion:</label>
                                                <input type="time" class="form-control" value='<?php echo $mostrar['hor_atencion']; ?>' id="hor_atencion" name="hor_atencion">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-8">
                                                <input type="text" value='<?php echo $mostrar['observaciones']; ?>' class="form-control" id="observaciones" name="observaciones" placeholder="Observaciones">
                                            </div>
                                            <div class="col-md-2">
                                                <select required="required" class="form-control"  id="per_visita" name="tip_visita" >
                                                    <option value="" selected>Tipo de visita *</option>
                                                    <option value="1" >Proveedor</option>
                                                    <option value="2" >Visita</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select required="required" class="form-control"  id="num_gafete" name="num_gafete" >
                                                    <option value=""selected>No. Gafete *</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                            </div>
                                        </div>												
                                    </div>
                                    <div class="row">
                                        <br>
                                        <div class="form-group">
                                            <div class="col-md-3" ></div>
                                            <div class="col-md-2">
                                                <label><strong class="text-danger" style="font-size: 20px">*</strong> Visita </label>
                                                <img width="75" src="<?php echo $mostrar['fot_visita'] ?>"/>
                                                <br>
                                            </div>
                                            <div class="col-md-3">
                                                <label type="button" class="btn btn-danger">
                                                    <input required="required" id="fot_ide_visita" accept="image/x-png,image/gif,image/GIF,,image/pgn,image/PGN,image/bmp,image/BMP,image/jpeg,image/JPG,image/jpg,image/JPG" name='fot_ide_visita' type="file" style="display:none">
                                                    Subir foto/imagen del la credencial
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-default btn-primary btn-lg" name="cambios">Realizar cambios</button>
                                            </div>
                                            <div class="col-md-12">
                                                <h4><a href="<?php echo RUTA_REGISTRADAS ?>">Cancelar</a> </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once '../plantillas/z.php';
?>