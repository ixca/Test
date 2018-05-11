<?php   // $this->output->enable_profiler(TRUE); ?>
<!DOCTYPE html>
<html lang="es">
<?php $this->load->view("theme/head")?>
<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php $this->load->view("theme/top_menu");?>
            <!-- /.navbar-top-links -->
            <?php $this->load->view("theme/left_menu");?>
        </nav>
        <?php $this->load->view("theme/theme_scripts");?>
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                      <?php if(isset($main_content)):?>
                        <?php $this->load->view($main_content);?>
                      <?php endif?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
</body>
</html>
