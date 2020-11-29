<?php  
if(isset($_POST['idpoliza'])){
    $idpoliza=$_POST['idpoliza'];
    $poliza=$conn->prepare("SELECT * FROM polizas WHERE id='$idpoliza'") or die(mysqli_error());
    if($poliza->execute()){
        $a_result=$poliza->get_result();
    }
    while($row = $a_result->fetch_array()){
        $nombrep=$row['Nombre'];
        $descripcionp=$row['Descripcion'];
        $tipocubrimientop=$row['TipoCubrimiento'];
        $porcentajecubrimientop=$row['PorcentajeCubrimiento'];
        $iniciovigenciap=$row['InicioVigencia'];
        $periodocoberturap=$row['PeriodoCobertura'];
        $preciop=$row['Precio'];
        $tiporiesgop=$row['TipoRiesgo'];
    }
}
?>
<div class="panel panel-info" name="Formulario" id="Formulario">
    <div class="panel-heading">
        <h3 class="panel-title">
            <strong>
                Registro Póliza
            </strong>
        </h3>
    </div>
    <div class="panel-body panel-info">
        <form action="controladores/crud.php" method="POST" onsubmit="return checkSubmit();">
            <?php  
                if (isset($idpoliza)) {
                    echo "<input type='hidden' name='idpoliza' value=".$idpoliza.">";
                }
            ?>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre <b class="text-danger">*</b></label>
                    <input type="text" class="form-control" name="Nombre" required autofocus maxlength="50" placeholder="Nombre" value="<?php
                                if(isset($nombrep)){
                                echo utf8_encode($nombrep);
                            }?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Descripción <b class="text-danger">*</b></label>
                    <textarea class="form-control" name="Descripcion" required maxlength="500" placeholder="Descripción Póliza"><?php
                                if(isset($descripcionp)){
                                echo utf8_encode($descripcionp);
                            }?></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label>Tipo Cubrimiento <b class="text-danger">*</b></label>
                    <select class="form-control" name="TipoCubrimiento" required>
                        <?php
                            $sql = $conn->prepare("SELECT * FROM tipocumbrimiento");
                            if($sql->execute()){                                
                                $g_result = $sql->get_result();
                            }
                            while($row = $g_result->fetch_array()){
                        ?><option class="form-control" value = <?php echo $row['Id']; 
                        if (isset($tipocubrimientop)) {
                            if ($row['Id']==$tipocubrimientop) {
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
                    <label>Porcentaje Cubrimiento <b class="text-danger">*</b></label>
                    <div class="input-group mb-3">
                        <input type="number" id="porcentajecubrimiento" name="porcentajecubrimiento" class="form-control" required placeholder="% cubrimiento" min="1" maxlength="3" value="<?php
                                if(isset($porcentajecubrimientop)){
                                echo utf8_encode($porcentajecubrimientop);
                            }?>" max="<?php
                                if(isset($tiporiesgop) AND $tiporiesgop==4){
                                echo 50;
                            }else{echo 100;}?>">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">%</span>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Inicio Vigencia <b class="text-danger">*</b></label>
                    <input type="date" name="iniciovigencia" class="form-control" required min="<?php $hoy = getdate(); echo $hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'];?>" value="<?php
                                if(isset($iniciovigenciap)){
                                echo utf8_encode($iniciovigenciap);
                            }?>" <?php
                                if(isset($iniciovigenciap)){
                                echo 'disabled';
                            }?>>
                </div>
                <div class="form-group col-md-6">
                    <label>Periodo Cobertura <b class="text-danger">*</b></label>
                    <input type="number" name="periodocobertura" class="form-control" required placeholder="Periodo Cobertura (meses)" min="1" maxlength="2" value="<?php
                                if(isset($periodocoberturap)){
                                echo utf8_encode($periodocoberturap);
                            }?>">
                </div>
                <div class="form-group col-md-6">
                    <label>Precio <b class="text-danger">*</b></label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">$</span>
                        </div>
                        <input type="number" name="precio" class="form-control" required placeholder="Precio" min="1" value="<?php
                                if(isset($preciop)){
                                echo utf8_encode($preciop);
                            }?>">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label>Tipo Riesgo <b class="text-danger">*</b></label>
                    <select class="form-control" name="TipoRiesgo" id="TipoRiesgo" required onchange="cambioriesgo();">
                        <?php
                            $sql = $conn->prepare("SELECT * FROM tiposriesgo");
                            if($sql->execute()){                                
                                $g_result = $sql->get_result();
                            }
                            while($row = $g_result->fetch_array()){
                        ?><option class="form-control" value = <?php echo $row['Id']; 
                        if (isset($tiporiesgop)) {
                            if ($row['Id']==$tiporiesgop) {
                                echo ' selected';
                            }
                        }
                                    ?>> <?php echo utf8_encode($row['Nombre'])?></option>
                            <?php
                                    }   
                                    ?>
                    </select>
                </div>
                <input type="hidden" name="accion" value="<?php echo isset($idpoliza)?"ActualizarPoliza": "RegistrarPoliza";?>">
                <div class="form-group col-md-12">
                    <input type="submit" id="accion" name="accion" class="btn btn-info" value="<?php echo isset($idpoliza)?'Actualizar Poliza':'Registrar Poliza'; ?>">
                </div>
                <a href="" class="btn btn-warning">Nuevo</a>
            </div>
        </form>
    </div>
</div>