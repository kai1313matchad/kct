    <!-- BANNER -->
    <div class="section banner-page" data-background="<?= base_url();?>assets/v1/images/1920x300/1920x300-belanja.jpg">
      <div class="content-wrap pos-relative">
        <div class="container">
          <div class="col-12 col-md-12">
            <div class="d-flex bd-highlight mb-2">
              <div class="title-page"><?= ucfirst($goods["itemName"]);?></div>
            </div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="<?= base_url();?>Home">Beranda</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url();?>shop/1">Belanja</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= ucfirst($goods["itemName"]);?></li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <!-- CONTENT -->
    <div class="section product-details">
      <div class="content-wrap">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-8">
              <div class="single-page">
                <div id="owl-product" class="owl-carousel owl-theme">
                  <?php foreach ($pics as $pic) { ?>
                    <div class="item">
                      <img src="<?= base_url();?>assets/uploads/goods/<?= $pic->imgPath; ?>" alt="product-image" class="img-responsive img-fluid">
                    </div>
                  <?php } ?>
                </div>
                <img src="<?= base_url();?>assets/uploads/goods/" alt="" class="img-fluid"> 
                <h3 class="text-primary my-4"><?= ucfirst($goods["itemName"]);?></h3>
                <blockquote><?= ucfirst($goods["itemDesc"]);?></blockquote>
              </div>
            </div>
            <div class="col-sm-12 col-md-4">
              <div class="widget info-detail">
                <div class="widget-title">
                  Detail Produk
                </div>
                <dl>
                  <dt>Kategori</dt>
                  <dd><?= ucfirst($ctg["ctgName"]);?></dd>
                </dl>
              </div>
              <div class="widget download">
                <a href="https://wa.me/6282230560661?text=Hi, TritunggalMetalworks! Saya ingin pesan produk <?= ucfirst($goods["itemName"]); ?>" class="btn btn-success btn-block btn-sidebar"><span class="fa  fa-shopping-cart"></span> Pesan Sekarang</a>
              </div>
              <div class="widget contact-info-sidebar">
                <div class="widget-title">
                  Kontak Kami
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
                    <div class="info-text">diana@tritunggalmetalworks.com</div>
                  </li>
                  <li>
                    <div class="info-icon">
                      <span class="fa fa-clock-o"></span>
                    </div>
                    <div class="info-text">Senin - Sabtu 08:00 - 17:00</div>
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

    <script>
      $(function () {
        $("#owl-product").owlCarousel({
          items : 1, 
          itemsDesktop : false,
          itemsDesktopSmall : false,
          itemsTablet: true,
          itemsMobile : true,
          lazyLoad : true,
          loop: true,
          autoplay:true,
          autoplayTimeout:3000,
        })
      })
    </script>

</body>
</html>