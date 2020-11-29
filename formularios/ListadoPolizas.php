  <h3 class="panel-title">
  <strong>
  Polizas Registradas
  </strong>
  </h3>
  <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
  <br>
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Nombres</th>
        <th>Descripción</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php  
        $sql = $conn->prepare("SELECT * FROM polizas ORDER BY CreadoEl");
        if($sql->execute()){                                
          $g_result = $sql->get_result();
        }
        if($sql){
          while($row = $g_result->fetch_array()){
            echo "<tr>";
            echo "<td>".utf8_encode($row['Nombre'])."</td>";
            echo "<td>".utf8_encode($row['Descripcion'])."</td>";
            echo "<td>$ ".number_format(round($row['Precio']), 0, ",", ".")."</td>";
            echo "<td>
                <div class='row'>
                <div class='col-sm-4'>
                <form action='polizas.php' method='post' class='d-inline'>
                  <button type='submit' class='btn btn-warning' title='Editar'>
                    Editar
                  </button>
                  <input type='hidden' name='idpoliza' value='".$row['Id']."'>
                </form>
                </div>
                <div class='col-sm-4'>
                <form action='controladores/crud.php' method='post' onsubmit='return eliminar()' class='d-inline'>
                  <button type='submit' class='btn btn-danger' title='Eliminar'>
                    Eliminar
                  </button>
                  <input type='hidden' name='idpoliza' value='".$row['Id']."'>
                  <input type='hidden' name='accion' value='EliminarPoliza'>
                </form>
                </div>
                <div class='col-sm-4'>
                <form action='polizasclientes.php' method='post' class='d-inline'>
                  <button type='submit' class='btn btn-info' title='Asociar'>
                    Asociar Clientes
                  </button>
                  <input type='hidden' name='idpoliza' value='".$row['Id']."'>
                </form>
                </div>
                </div>
              </td>";
            echo "</tr>";
          }
        }
      ?>
    </tbody>
  </table>