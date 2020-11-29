<script
    src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous">
</script>

<script type = "text/javascript">
	document.oncontextmenu = function(){return false}//deshabilitando el click derecho

	function eliminar(){
		var r = confirm("¿Desea eliminar este Registro?");
		if (r == true) {
			return true;
		}else{
			return false;
		}
	}

	function checkSubmit() {
		document.getElementById("accion").value = "Enviando...";
		document.getElementById("accion").disabled = true;
		return true;
	}

	function cambioriesgo() {
		var x = $("#TipoRiesgo").val();
		if (x=='4') {
			document.getElementById("porcentajecubrimiento").max=50;
		}else{
			document.getElementById("porcentajecubrimiento").max=100;
		}
		
	}

	$(document).ready(function(){

		$("#myInput").on("keyup", function() {
		    var value = $(this).val().toLowerCase();
		    $("#myTable tr").filter(function() {
		      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		    });
		  });
		$("#myInput2").on("keyup", function() {
		    var value = $(this).val().toLowerCase();
		    $("#myTable2 tr").filter(function() {
		      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		    });
		  });	
	})


</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
