<div style="margin-top:45px; margin-bottom:10px;">
    <a class="btn btn-success" href="<?php echo base_url('/ticket/form_insert/') ; ?>">Nuevo</a>
</div>
<?php
      //flash messages
      if($this->session->flashdata('flash_message')){
        if($this->session->flashdata('flash_message') == 'updated')
        {
          echo '<div class="alert alert-dismissable alert-success">';
            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
            echo '<strong>Bien hecho!</strong> ticket actualizada con éxito.';
          echo '</div>';
        }else{
          echo '<div class="alert alert-dismissable alert-danger">';
            echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
             echo '<strong>Atención!</strong> cambie algunas cosas y vuelva a enviar.';
          echo '</div>';
        }
      }
      ?>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				tickets
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Titulo</th>
								<th>estado</th>
								<th>Creacion</th>
								<th>Atencion</th>
								<th> --- </th>
							</thead>
							<tbody>
								<?php foreach($tickets as $value) { ?>
									<tr class="odd gradeX">
										<th><?php echo $value['title'] ?></th>
											<?php if($value["sta"] == 0 ){echo "<td style='color:red;'>PENDIENTE</td>";}  else{echo "<td style='color:green'>ATENDIDO</td>";} ?>
											<td><?php echo $value['created_date']; ?> </td>
											<td><?php echo $value['updated_date']; ?> </td>
											<td>
											<?php if ($this->session->rol == 1 && $value["sta"] == 0): ?>
													<a class="btn btn-primary" href="<?php echo base_url("/ticket/form/".$value["id"]) ; ?>" >Atender</a>
											<?php endif; ?>
											<?php if ($value["sta"] == 1): ?>
													<a class="btn btn-success" href="#" onclick=" return reporte(<?php echo $value["id"] ?>)">Reporte</a>
											<?php endif; ?>
											</td>
									</tr>
								<?php }?>
						</tbody>
					</table>
				</div>

			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>


<div class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Modal title</h2>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Titulo</label>
							<input disabled = 'true' id="title" class="form-control" value="">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Fecha y hora de creacion</label>
							<input disabled = 'true' id="created_date" class="form-control" value="">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Fecha y hora de atencion</label>
							<input disabled = 'true' id="updated_date" class="form-control" value="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label>Descripcion</label>
					<textarea  disabled = 'true' id="descrip" class="form-control" rows="5"></textarea>
				</div>

				<div class="form-group">
					<label>Observaciones</label>
					<textarea disabled = 'true' class="form-control" id ='comment' rows="5"></textarea>
				</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>



	<script type="text/javascript">
		$('#dataTables-example').DataTable({});
		function validar(e)
		{
			var r = confirm("Esta seguro de eliminar el registro");
			if (r == false){
				e.preventDefault();
			}
		}
	</script>

<script>
	function reporte(my_id){
		console.log("my_id" + my_id);
		$.post("<?php echo base_url('/ticket/report/') ; ?>", {id: my_id}, function(result){
			$(".modal").modal("show");
			my_json = JSON.parse(result);
			$(".modal-title").html(my_json.title);
			$.each(my_json,function(kk,vv){
				$("#"+kk).val(vv);
			});
		});
	}
</script>
