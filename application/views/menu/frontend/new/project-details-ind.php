    <!-- BANNER -->
    <div class="section banner-page" data-background="<?= base_url();?>assets/v1/images/1920x300/1920x300-1.jpg">
      <div class="content-wrap pos-relative">
        <div class="container">
          <div class="col-12 col-md-12">
            <div class="d-flex bd-highlight mb-2">
              <div class="title-page">Project</div>
            </div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="<?= base_url();?>Home">Home</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>projects/1">Projects</a></li>
                <li class="breadcrumb-item active" aria-current="page">Single Project</li>
              </ol>
            </nav>
          </div>
        </div>
        
      </div>
    </div>

    <!-- CONTENT -->
    <div class="section">
      <div class="content-wrap">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-8">
              <div class="single-page">
                <img src="<?= base_url();?>assets/uploads/products/<?= $projectDt['path'];?>" alt="" class="img-fluid"> 
                <h3 class="text-primary my-4"><?= $projectDt["nama"];?></h3>
                <blockquote><?= $projectDt["caption"];?></blockquote>
              </div>
            </div>
            <div class="col-sm-12 col-md-4">
              <div class="widget info-detail">
                <div class="widget-title">
                  Project Details
                </div>
                <dl>
                  <dt>Client:</dt>
                  <dd><?= $projectDt["klien"];?></dd>
                  <dt>Location:</dt>
                  <dd><?= $projectDt["lokasi"];?></dd>
                  <dt>Completed:</dt>
                  <dd><?= $projectDt["tanggal"];?></dd>
                </dl>
              </div>
              <div class="widget download">
                <a href="#" class="btn btn-secondary btn-block btn-sidebar"><span class="fa  fa-file-pdf-o"></span> Company Brochure</a>
              </div>
              <div class="widget contact-info-sidebar">
                <div class="widget-title">
                  Contact Info
                </div>
                <ul class="list-info">
                  <li>
                    <div class="info-icon">
                      <span class="fa fa-map-marker"></span>
                    </div>
                    <div class="info-text">Raya Taman No.15, Sidoarjo 61257. Indonesia</div> </li>
                  <li>
                    <div class="info-icon">
                      <span class="fa fa-phone"></span>
                    </div>
                    <div class="info-text">(031) 7870870</div>
                  </li>
                  <li>
                    <div class="info-icon">
                      <span class="fa fa-envelope"></span>
                    </div>
                    <div class="info-text">admin@tritunggalmetalworks.com</div>
                  </li>
                  <li>
                    <div class="info-icon">
                      <span class="fa fa-clock-o"></span>
                    </div>
                    <div class="info-text">Mon - Sat 08:00 - 17:00</div>
                  </li>
                </ul>
              </div> 

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- CTA -->
    <?php include 'application/views/layout/frontend/cta-ind.php' ?>

    <!-- FOOTER SECTION -->
	  <?php include 'application/views/layout/frontend/footer-new.php' ?>

    <?php include 'application/views/layout/frontend/jspack.php' ?>

</body>
</html>