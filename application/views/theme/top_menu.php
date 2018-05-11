<style>
.navbar-static-top{
background-color: #352e50;
}

.navbar-top-links>li>a{

    color:white;
}
.nav>li>a:hover{

    color:#352e50;
}

.sidebar-nav a{
     color:#352e50;
}

</style>
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

</div>
<!-- /.navbar-header -->
<ul class="nav navbar-top-links navbar-right">
    <!-- /.dropdown -->
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i><?php echo $this->session->nomemp ?></a>
            </li>
	    <li class="divider"></li>
            <li><a href="#"><i class="fa fa-gear fa-fw"></i>Cambiar Clave</a>
            </li>
            <li class="divider"></li>
            <li><a href="<?php echo base_url("/logout")?>"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesion</a>
            </li>
        </ul>
        <!-- /.dropdown-user -->
    </li>
    <!-- /.dropdown -->
</ul>
