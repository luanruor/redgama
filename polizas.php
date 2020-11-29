<?php 
include 'head.php';
include 'controladores/session.php';
include 'menu.php';
?>
    
<div class="panel panel-info">
	<table>
		<tr>
			<td width="40%" valign="top">
				<?php
			        include 'formularios/RegistroPolizas.php';
			        include 'formularios/TerminosCondiciones.php';
			    ?>
			</td>
			<td width="5%"></td>
			<td valign="top">
				<?php
			        include 'formularios/ListadoPolizas.php';
			    ?>
			</td>
		</tr>
	</table>
	
</div>
<?php 
include 'footer.php';
?>	