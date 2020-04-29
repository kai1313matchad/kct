    <!-- BANNER -->
    <div class="section banner-page" data-background="<?= base_url();?>assets/v1/images/1920x300/1920x300-1.jpg">
      <div class="content-wrap pos-relative">
        <div class="container">
          <div class="col-12 col-md-12">
            <div class="d-flex bd-highlight mb-2">
              <div class="title-page">Artikel</div>
            </div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="<?= base_url();?>Home">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Artikel</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <!-- CONTENT -->
    <div id="class" class="">
      <div class="content-wrap">
        <div class="container">
          <div class="row">
            <?php foreach ($listdata as $dt) { ?>
              <div class="col-sm-12 col-md-12 col-lg-4">
                <div class="rs-news-1 mb-5">
                  <div class="media">
                    <a href="<?= base_url();?>news-details/<?= $dt->url;?>">
                      <img src="<?= base_url();?>assets/uploads/news/<?= $dt->path;?>" alt="" class="img-fluid">
                    </a>
                  </div>
                  <div class="body">
                    <div class="title"><a href="<?= base_url();?>news-details/<?= $dt->url;?>"><?= $dt->judul;?></a></div>
                    <div class="meta-date"><?= $dt->tanggal;?></div>
                    <?= $dt->kutipan;?>
                  </div>
                </div>
              </div>              
            <?php } ?>
          </div>
          <div class="row mt-5">
            <div class="col-sm-12 col-md-12">
              <nav aria-label="Page navigation">
                <?= $pagination;?>
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