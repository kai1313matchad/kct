  <body data-spy="scroll" data-target="#navbar-example">
    <!-- LOAD PAGE -->
    <div class="animationload">
      <div class="loader"></div>
    </div>
	
    <!-- BACK TO TOP SECTION -->
    <a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

	  <!-- HEADER -->
    <div class="header header-1">
    	<!-- TOP BAR -->
    	<div class="topbar d-none d-md-block">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-sm-6 col-md-6">
              <p class="mb-0">Number 1 in services</p>
            </div>
            <div class="col-sm-6 col-md-6">
              <div class="sosmed-icon d-inline-flex pull-right">
                <a href="https://www.facebook.com/Tritunggal-Metalworks-153338715169247/"><i class="fa fa-facebook"></i></a> 
                <a href="https://twitter.com/PT_KCT"><i class="fa fa-twitter"></i></a> 
                <a href="https://www.instagram.com/tritunggalmetalworks/"><i class="fa fa-instagram"></i></a>
              </div>
            </div>
          </div>
        </div>
		  </div>

		  <!-- NAVBAR SECTION -->
      <div class="navbar-main">
        <div class="container">
          <nav id="navbar-example" class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="<?= base_url();?>"><img src="<?= base_url()?>/assets/v1/images/kct-logo.svg" alt="" style="width: 200px; height: auto;" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url();?>Home/homeBaru">HOME</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">ABOUT US</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="about-company.html">OUR COMPANY</a>
                    <a class="dropdown-item" href="about-history.html">COMPANY HISTORY</a>
                    <a class="dropdown-item" href="about-team.html">OUR TEAM</a>
                    <a class="dropdown-item" href="<?= base_url();?>Home/partners">OUR PARTNERS</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">PROJECTS</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="project.html">GRID LAYOUT</a>
                    <a class="dropdown-item" href="project-detail.html">SINGLE PROJECT</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">NEWS</a>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="news.html">GRID BAR</a>
                    <a class="dropdown-item" href="news-single.html">SINGLE NEWS</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url()?>home/contact_us">CONTACT</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>