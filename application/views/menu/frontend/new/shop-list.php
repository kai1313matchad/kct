    <!-- BANNER -->
    <div class="section banner-page" data-background="<?= base_url();?>assets/v1/images/1920x300/1920x300-belanja.jpg">
      <div class="content-wrap pos-relative">
        <div class="container">
          <div class="col-12 col-md-12">
            <div class="d-flex bd-highlight mb-2">
              <div class="title-page">Belanja</div>
            </div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb ">
                <li class="breadcrumb-item"><a href="<?= base_url();?>Home">Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Belanja</li>
              </ol>
            </nav>
          </div>
        </div>
        
      </div>
    </div>

    <!-- CONTENT -->
    <!--================Category Product Area =================-->
    <div id="class" class="">
      <div class="content-wrap">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3 mb-2">
              <div class="row">
                <div class="col-12">
                  <label><strong>Kategori</strong></label>
                  <select name="ctg" class="form-control ctg-param">
                    <option value="">Semua Kategori</option>
                    <?php foreach ($ctg as $ctg) { ?>
                      <option value="<?= $ctg->idCtg;?>" <?= ($ctgPicked == $ctg->idCtg)?'selected':'';?>><?= $ctg->ctgName; ?></option>
                    <?php }?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-9 mb-2">
              <div class="row">
                <?= $listdata; ?>
              </div>

              <div class="row mt-5">
                <div class="col-sm-12 col-md-12">
                  <nav aria-label="Page navigation">
                    <ul class="pagination">
                      <?= $pagination;?>
                      <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
                    </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	  </div> 
    <!--================End Category Product Area =================-->

    <!-- CTA -->
	  <?php include 'application/views/layout/frontend/cta-ind.php' ?>

    <!-- FOOTER SECTION -->
    <?php include 'application/views/layout/frontend/footer-new.php' ?>

    <?php include 'application/views/layout/frontend/jspack.php' ?>

    <script>
      $(function () {
        $('.ctg-param').on('change', function() {
          createUrl()
        })
      })

      function createUrl() {
        ctg = 'ctg='+$('[name="ctg"]').val()
        urls = '<?= base_url()?>shop/1?'+ctg
        window.location.href = urls
      }
    </script>

</body>
</html>