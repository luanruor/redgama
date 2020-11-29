  <h3 class="panel-title">
  <strong>
  Clientes Registrados
  </strong>
  </h3>
  <input class="form-control" id="myInput" type="text" placeholder="Buscar...">
  <br>
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Documento</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php  
        $sql = $conn->prepare("SELECT * FROM clientes ORDER BY Nombres, Apellidos");
        if($sql->execute()){                                
          $g_result = $sql->get_result();
        }
        if($sql){
          while($row = $g_result->fetch_array()){
            echo "<tr>";
            echo "<td>".utf8_encode($row['Nombres'])."</td>";
            echo "<td>".utf8_encode($row['Apellidos'])."</td>";
            echo "<td>".utf8_encode($row['Documento'])."</td>";
            echo "<td>
                <div class='row'>
                <div class='col-sm-6'>
                <form action='clientes.php' method='post' class='d-inline'>
                  <button type='submit' class='btn btn-warning' title='Editar'>
                    Editar
                  </button>
                  <input type='hidden' name='idcliente' value='".$row['Id']."'>
                </form>
                </div>
                <div class='col-sm-6'>
                <form action='controladores/crud.php' method='post' onsubmit='return eliminar()' class='d-inline'>
                  <button type='submit' class='btn btn-danger' title='Eliminar'>
                    Eliminar
                  </button>
                  <input type='hidden' name='idcliente' value='".$row['Id']."'>
                  <input type='hidden' name='accion' value='EliminarCliente'>
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