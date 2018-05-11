<link href="<?php echo  base_url('/assets/toggle/bootstrap-toggle.min.css') ?>" rel="stylesheet">
<script src="<?php echo  base_url('/assets/toggle/bootstrap-toggle.min.js') ?>"></script>

<div style="margin-top:45px;">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="<?php echo base_url("/ticket/") ; ?>">Armas</a></li>
		<li class="breadcrumb-item active">Nuevo ticket</li>
	</ol>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-7">
			<div class="panel panel-green">
				<div class="panel-heading">
					<h4 class="panel-title">Agregar Nuevo ticket</h4>
				</div><!-- /.panel-heading -->
        <div class="panel-body">
          <?php echo validation_errors(); ?>
        	<form role="form" action=<?php echo base_url('/ticket/insert/') ; ?> method="post" id="form" enctype="multipart/form-data">

						<div class="form-group">
							<label>Titulo</label>
							<input class="form-control" name="title">
						</div>

						<div class="form-group">
							<label>Descripcion</label>
							<textarea class="form-control" name="descrip" rows="5"></textarea>
						</div>

						<button type="submit" class="btn btn-default">Insertar</button>
						<!--<button type="reset" class="btn btn-default">Reset</button>-->
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div> <!--Row-->
</div>


<script>

      var formLogin = document.getElementById('form');
      var comboclase = document.getElementById('clase');

      comboclase.addEventListener('change',function(e){

        var formData = new FormData(formLogin);
        var parametro = $("#clase").val();
        var request = new XMLHttpRequest();
        request.open('post','<?php echo base_url("armas/ajax") ?>/'+parametro  );
        request.addEventListener('load', function(e){
          console.log(e.target.status);

          if(e.target.status == 200){
            var texto = e.target.responseText;
            var resultado = null;

            try{
              resultado = JSON.parse(texto);
            }
            catch(error){
              console.log('El servidor no me devolvio algo JSON');
              console.log(error);
              console.log('Servidor: ' + texto);
              return;
            }


           $("#marca").empty();

           console.log(resultado);
           for(var k in resultado) {

            var valormarca = resultado[k]["marca_arma"];
            var idmarca = resultado[k]["id"];

           $("#marca").append("<option value='"+idmarca+"'>"+valormarca+"</option>");

           }


          }
          else
          {
              alert('Error: ' + e.target.status);
          }
        });
        request.send(formData);
        e.preventDefault();
      });


</script>

<script>

      var formLogin = document.getElementById('form');
      var comboclase = document.getElementById('clase');

      comboclase.addEventListener('change',function(e){

        var formData = new FormData(formLogin);
        var parametro = $("#clase").val();
        var request = new XMLHttpRequest();
        request.open('post','<?php echo base_url("armas/ajax_modelo_arma") ?>/'+parametro  );
        request.addEventListener('load', function(e){
          console.log(e.target.status);

          if(e.target.status == 200){
            var texto = e.target.responseText;
            var resultado2 = null;

            try{
              resultado2 = JSON.parse(texto);
            }
            catch(error){
              console.log('El servidor no me devolvio algo JSON');
              console.log(error);
              console.log('Servidor: ' + texto);
              return;
            }


           $("#modelo").empty();

           console.log(resultado2);
           for(var j in resultado2) {

            var valormodelo = resultado2[j]["modelo_arma"];
            var idmodelo = resultado2[j]["id"];

           $("#modelo").append("<option value='"+idmodelo+"'>"+valormodelo+"</option>");

           }


          }
          else
          {
              alert('Error: ' + e.target.status);
          }
        });
        request.send(formData);
        e.preventDefault();
      });


</script>

<script>

      var formLogin = document.getElementById('form');
      var comboclase = document.getElementById('clase');

      comboclase.addEventListener('change',function(e){

        var formData = new FormData(formLogin);
        var parametro = $("#clase").val();
        var request = new XMLHttpRequest();
        request.open('post','<?php echo base_url("armas/ajax_calibre_arma") ?>/'+parametro  );
        request.addEventListener('load', function(e){
          console.log(e.target.status);

          if(e.target.status == 200){
            var texto = e.target.responseText;
            var resultado3 = null;

            try{
              resultado3 = JSON.parse(texto);
            }
            catch(error){
              console.log('El servidor no me devolvio algo JSON');
              console.log(error);
              console.log('Servidor: ' + texto);
              return;
            }


           $("#calibre").empty();

           console.log(resultado3);
           for(var i in resultado3) {

            var valorcalibre = resultado3[i]["calibre_arma"];
            var idcalibre = resultado3[i]["id"];

           $("#calibre").append("<option value='"+idcalibre+"'>"+valorcalibre+"</option>");

           }


          }
          else
          {
              alert('Error: ' + e.target.status);
          }
        });
        request.send(formData);
        e.preventDefault();
      });


</script>
<script type="text/javascript">
$("#piSalvo").datepicker({
	dateFormat:"yy-mm-dd"
});
</script>
<script type="text/javascript">
	$("#clase").change(function(){
		clase = $(this).val();
		if(clase =="20"){
			carga = $('#capacidad_carga').children();
			console.log(carga);
			for(i=0; i<carga.length;i++){
				console.log(carga[i].value);
				if(carga[i].value == "6"){
					carga[i].selected = true;
				}
			}
		}
	});
</script>

<script>
	$(function() {
	 $('#propioT').change(function() {
		console.log('Toggle: ' + $(this).prop('checked'));
		$('#propio').val($(this).prop('checked')?1:0);
	 })
	})
	$(function() {
		if ($('#propio').val() == 1) {
			 $('#propioT').prop('checked', true).change()
		}else {
			$('#propioT').prop('checked', false).change()
		}
	})
</script>
