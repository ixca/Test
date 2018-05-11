<link href="<?php echo  base_url('/assets/toggle/bootstrap-toggle.min.css') ?>" rel="stylesheet">
<script src="<?php echo  base_url('/assets/toggle/bootstrap-toggle.min.js') ?>"></script>

<div style="margin-top:45px;">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="<?php echo base_url("/Ticket/") ; ?>">Ticket</a></li>
    <li class="breadcrumb-item active">Modificar</li>
  </ol>
  <div class="row">
    <div class="col-md-1"></div>
		<div class="col-md-7">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="panel-title">Modificar Ticket</h4>
				</div><!-- /.panel-heading -->
				<div class="panel-body">
					<?php echo validation_errors(); ?>
					<form role="form" action=<?php echo base_url('/Ticket/update/'.$this->uri->segment(3)) ; ?> method="post" id="form" enctype="multipart/form-data">
						<?php $value=  $datos_ticket ?>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label>Titulo</label>
									<input disabled = 'true' class="form-control" value="<?php echo $value['title']; ?>">
								</div>
							</div>
						</div>
						<div class="form-group">
              <label>Descripcion</label>
              <textarea  disabled = 'true' class="form-control" rows="5"><?php echo $value['descrip']; ?></textarea>
            </div>

            <div class="form-group">
              <label>Observaciones</label>
              <textarea class="form-control" name ='comment' rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-default">Modificar</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-4"></div>
  </div> <!--Row-->
</div>
