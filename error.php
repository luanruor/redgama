<table>
	<tr>
		<td>
			<img src='../imagenes/Advertencia.gif'>
		</td>

		<td>
			<h3><b>Fall&oacute;!</b></h3><br>
		    Le informamos, que a ocurrido un Error.<br>
		    <b><i>Cualquier duda, por favor comun&iacute;quese con el Administrador.</i></b>
		    <br><br><b>
		    Será redireccionado en <b id="number">5</b> segundo(s).
		    </b><br><br>
			<p>
				<a href='../index.php' class='btn btn-info'>
					Regresar a la pagina principal
				</a>
			</p>
		</td>
	</tr>
</table>
<script type="text/javascript">
	var n = 5;
var l = document.getElementById("number");
window.setInterval(function(){
  l.innerHTML = n;
  n--;
},1000);
</script>