<div class="modal fade" id="miModal">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Ingreso</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="usuario" placeholder="Usuario" autofocus required tabindex="1">
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" placeholder="Clave" name="clave" required tabindex="2">
                    </div>
                    <br>
                    <div class="input-group">
                        <input type="submit" class="btn btn-info pull-right" value="Entrar" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>