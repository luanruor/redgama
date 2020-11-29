<?php  
if(isset($_POST['idcliente'])){
    $idcliente=$_POST['idcliente'];
    $cliente=$conn->prepare("SELECT * FROM clientes WHERE id='$_POST[idcliente]'") or die(mysqli_error());
    if($cliente->execute()){
        $a_result=$cliente->get_result();
    }
    while($row = $a_result->fetch_array()){
        $nombresc=$row['Nombres'];
        $apellidosc=$row['Apellidos'];
        $tipodocumentoc=$row['TipoDocumento'];
        $documentoc=$row['Documento'];
        $direccionc=$row['Direccion'];
        $correoc=$row['Correo'];
        $celularc=$row['Celular'];
        $celularalternoc=$row['CelularAlterno'];
    }
}
?>
<div class="panel panel-info" name="Formulario" id="Formulario">
    <div class="panel-heading">
        <h3 class="panel-title">
            <strong>
                Registro Clientes
            </strong>
        </h3>
    </div>
    <div class="panel-body panel-info">
        <label class="font-weight-bold">
            DATOS B&Aacute;SICOS
        </label>
        <form action="controladores/crud.php" method="POST" onsubmit="return checkSubmit();">
            <?php  
                if (isset($idcliente)) {
                    echo "<input type='hidden' name='idcliente' value=".$idcliente.">";
                }
            ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombres <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" name="Nombres" required autofocus maxlength="50" value="<?php
                                if(isset($nombresc)){
                                echo utf8_encode($nombresc);
                            }?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Apellidos <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" name="Apellidos" required maxlength="50" value="<?php
                                if(isset($apellidosc)){
                                echo utf8_encode($apellidosc);
                            }?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Tipo identificaci&oacute;n <b class="text-danger">*</b></label>
                    <select class="form-control" name="TipoDocumento" required>
                        <?php
                            $sql = $conn->prepare("SELECT * FROM tipodocumento");
                            if($sql->execute()){                                
                                $g_result = $sql->get_result();
                            }
                            while($row = $g_result->fetch_array()){
                        ?><option class="form-control" value=<?php echo $row['Id']; 
                        if (isset($tipodocumentoc)) {
                            if ($row['Id']==$tipodocumentoc) {
                                echo ' selected';
                            }
                        }
                                    ?>> <?php echo utf8_encode($row['Nombre'])?></option>
                            <?php
                                    }   
                                    ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>N&uacute;mero de identificaci&oacute;n <b class="text-danger">*</b></label>
                    <input type="number" class="form-control" name="NumeroDocumento" required min="1000" max="99999999999" maxlength="11" value="<?php
                                if(isset($documentoc)){
                                echo utf8_encode($documentoc);
                            }?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Celular <b class="text-danger">*</b></label>
                    <input type="number" class="form-control" name="Celular" required min="3000000000" max="3519999999" maxlength="10" value="<?php
                                if(isset($celularc)){
                                echo utf8_encode($celularc);
                            }?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Celular Alterno</label>
                    <input type="number" class="form-control" name="CelularAlterno" min="3000000000" max="3519999999" maxlength="10" value="<?php
                                if(isset($celularalternoc)){
                                echo utf8_encode($celularalternoc);
                            }?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Correo Electrónico <b class="text-danger">*</b></label>
                    <input type="email" class="form-control" name="Correo" required maxlength="50" value="<?php
                                if(isset($correoc)){
                                echo utf8_encode($correoc);
                            }?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Dirección <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" name="Direccion" required maxlength="100" value="<?php
                                if(isset($direccionc)){
                                echo utf8_encode($direccionc);
                            }?>">
                </div>
                <input type="hidden" name="accion" value="<?php echo isset($idcliente)?"ActualizarCliente": "RegistrarCliente";?>">
                <div class="form-group col-md-12">
                    <input type="submit" id="accion" name="accion" class="btn btn-info" value="<?php echo isset($idcliente)?'Actualizar Cliente':'Registrar Cliente'; ?>">
                </div>
                <a href="" class="btn btn-warning">Nuevo</a>
            </div>
        </form>
    </div>
</div>