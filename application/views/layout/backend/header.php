<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>Administrator/dashboard">
                    TRITUNGGAL METALWORKS
                </a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a href="<?php echo base_url() ?>Administrator/dashboard">
                                <i class="fa fa-user fa-fw"></i> <?php echo ucfirst($this->session->userdata('user_kct')); ?>
                            </a>                            
                        </li>                        
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo base_url() ?>Administrator/logout">
                                <i class="fa fa-sign-out fa-fw"></i> Logout
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">                        
                        <li>
                            <a class="active" href="<?php echo base_url() ?>Administrator/dashboard">
                                <i class="fa fa-dashboard fa-fw"></i> Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-image fa-fw"></i> Web Banner<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() ?>Administrator/web_banner">Data Banner</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>Administrator/add_web_banner">Tambah Banner</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-suitcase fa-fw"></i> Products<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() ?>Administrator/products_list">Data Product</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>Administrator/add_products">Tambah Product</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-newspaper-o fa-fw"></i> News<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() ?>Administrator/news_list">Data Artikel</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>Administrator/add_news">Tambah Artikel</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-list-alt fa-fw"></i> Jobs<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() ?>Administrator/jobs_list">Data Lowongan</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>Administrator/add_jobs">Tambah Lowongan</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-handshake-o fa-fw"></i> Clients<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url() ?>Administrator/clients_list">Data Client</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url() ?>Administrator/add_clients">Tambah Client</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>Administrator/applicant_list">
                                <i class="fa fa-vcard-o fa-fw"></i> Applicant List
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url() ?>Administrator/account_data">
                                <i class="fa fa-user-circle fa-fw"></i> Account Data
                            </a>
                        </li>                        
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>