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
                <li class="breadcrumb-item"><a href="<?= base_url();?>Home">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Project</li>
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
          <!-- <div class="row">
            <div class="col-sm-12 col-md-12">
              <nav class="navfilter">
                <ul class="portfolio_filter">
                  <li><a href="#" class="active" data-filter="*">All</a></li>
                  <li><a href="#" data-filter=".billboard">Billboard</a></li>
                  <li><a href="#" data-filter=".canopy">Canopy</a></li>
                  <li><a href="#" data-filter=".letter">Letter Sign</a></li>
                  <li><a href="#" data-filter=".fascia">Fascia</a></li>
                  <li><a href="#" data-filter=".signage">Signage</a></li>
                  <li><a href="#" data-filter=".container">Container</a></li>
                </ul>
              </nav>
            </div>
          </div> -->
          <div class="row gutter-5 grid-v1">
            <div class="grid-sizer-v1"></div>
            <div class="gutter-sizer-v1"></div>
            <?php foreach ($listdata as $dt) { ?>
              <div class="col-sm-6 col-md-4 grid-item-v1 eco manufacturing gas">
                <div class="box-image-5 shadow">
                  <a href="<?= base_url();?>project-details/<?= $dt->url;?>" title="Industrial Complex">
                    <div class="media">
                      <img src="<?= base_url();?>assets/uploads/products/<?= $dt->path;?>" alt="" class="img-fluid">
                    </div>
                    <div class="body">
                      <div class="content">
                        <h4 class="title"><?= $dt->nama;?></h4>
                        <span class="category"><?= $dt->kategori;?></span>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            <?php }?>
            <!-- <div class="col-sm-6 col-md-4 grid-item-v1 eco manufacturing gas">
              <div class="box-image-5 shadow">
                <a href="project-detail.html" title="Industrial Complex">
                  <div class="media">
                    <img src="<?= base_url();?>assets/v1/images/600x500/600x500-1.jpg" alt="" class="img-fluid">
                  </div>
                  <div class="body">
                    <div class="content">
                      <h4 class="title">INDUSTRIAL COMPLEX</h4>
                      <span class="category">Commodoenim</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 grid-item-v1 manufacturing gas">
              <div class="box-image-5 shadow">
                <a href="project-detail.html" title="Industrial Complex">
                  <div class="media">
                    <img src="<?= base_url();?>assets/v1/images/600x500/600x500-2.jpg" alt="" class="img-fluid">
                  </div>
                  <div class="body">
                    <div class="content">
                      <h4 class="title">The Gas Company</h4>
                      <span class="category">Commodoenim</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 grid-item-v1 industry factory">
              <div class="box-image-5 shadow">
                <a href="project-detail.html" title="Industrial Complex">
                  <div class="media">
                    <img src="<?= base_url();?>assets/v1/images/600x500/600x500-3.jpg" alt="" class="img-fluid">
                  </div>
                  <div class="body">
                    <div class="content">
                      <h4 class="title">Warehouse Industry</h4>
                      <span class="category">Commodoenim</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 grid-item-v1 industry factory">
              <div class="box-image-5 shadow">
                <a href="project-detail.html" title="Industrial Complex">
                  <div class="media">
                    <img src="<?= base_url();?>assets/v1/images/600x500/600x500-billboard.jpg" alt="" class="img-fluid">
                  </div>
                  <div class="body">
                    <div class="content">
                      <h4 class="title">Iron Industry</h4>
                      <span class="category">Commodoenim</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 grid-item-v1 industry oil">
              <div class="box-image-5 shadow">
                <a href="project-detail.html" title="Industrial Complex">
                  <div class="media">
                    <img src="<?= base_url();?>assets/v1/images/600x500/600x500-canopy.jpg" alt="" class="img-fluid">
                  </div>
                  <div class="body">
                    <div class="content">
                      <h4 class="title">Gear Manufacturing</h4>
                      <span class="category">Commodoenim</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 grid-item-v1 eco">
              <div class="box-image-5 shadow">
                <a href="project-detail.html" title="Industrial Complex">
                  <div class="media">
                    <img src="<?= base_url();?>assets/v1/images/600x500/600x500-letter.jpg" alt="" class="img-fluid">
                  </div>
                  <div class="body">
                    <div class="content">
                      <h4 class="title">Oil Pipeline Industry</h4>
                      <span class="category">Commodoenim</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 grid-item-v1 eco gas">
              <div class="box-image-5 shadow">
                <a href="project-detail.html" title="Industrial Complex">
                  <div class="media">
                    <img src="<?= base_url();?>assets/v1/images/600x500/600x500-fascia.jpg" alt="" class="img-fluid">
                  </div>
                  <div class="body">
                    <div class="content">
                      <h4 class="title">Oil Pipeline Industry</h4>
                      <span class="category">Commodoenim</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 grid-item-v1 eco">
              <div class="box-image-5 shadow">
                <a href="project-detail.html" title="Industrial Complex">
                  <div class="media">
                    <img src="<?= base_url();?>assets/v1/images/600x500/600x500-signage.jpg" alt="" class="img-fluid">
                  </div>
                  <div class="body">
                    <div class="content">
                      <h4 class="title">Oil Pipeline Industry</h4>
                      <span class="category">Commodoenim</span>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 grid-item-v1 oil">
              <div class="box-image-5 shadow">
                <a href="project-detail.html" title="Industrial Complex">
                  <div class="media">
                    <img src="<?= base_url();?>assets/v1/images/600x500/600x500-container.jpg" alt="" class="img-fluid">
                  </div>
                  <div class="body">
                    <div class="content">
                      <h4 class="title">Oil Pipeline Industry</h4>
                      <span class="category">Commodoenim</span>
                    </div>
                  </div>
                </a>
              </div>
            </div> -->
          </div>
          <div class="row mt-5">
            <div class="col-sm-12 col-md-12">
              <nav aria-label="Page navigation">
                <?= $pagination; ?>
              </nav>
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