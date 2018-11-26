<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation -->
    <nav class="navbar navbar-default nav-bg navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="<?php echo base_url() ?>Home">
                    <img src="<?php echo base_url() ?>assets/img/kct.png" >
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="page-scroll dropdown-toggle" data-toggle="dropdown">
                        <div class="nav-text">About Us <span class="caret"></span></div>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="<?php echo base_url() ?>Home/history">
                                    History
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>Home/vision_mission">
                                    Vision And Mission
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>Home/partners">
                                    Partners
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>Home/managements">
                                    Management Team
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="page-scroll dropdown-toggle" data-toggle="dropdown">
                        <div class="nav-text">Products <span class="caret"></span></div>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="<?php echo base_url() ?>Home/products_billboard">
                                    Billboard
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>Home/products_canopy">
                                    Canopy
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>Home/products_ex_fascia">
                                    Exterior-Fascia
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>Home/products_in_fascia">
                                    Interior-Fascia
                                </a>
                            </li>                            
                            <li>
                                <a href="<?php echo base_url() ?>Home/products_letter">
                                    Letter Sign
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>Home/products_mural">
                                    Mural
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>Home/products_neon">
                                    Neon Box
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>Home/products_pylon">
                                    Pylon
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>Home/products_bts_tower">
                                    Tower BTS
                                </a>
                            </li>    
                        </ul>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url() ?>Home/contact_us"><div class="nav-text">Contact Us</div></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url() ?>Home/our_client"><div class="nav-text">Client</div></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url() ?>Home/news_list"><div class="nav-text">News</div></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo base_url() ?>Home/career_list"><div class="nav-text">Career</div></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>