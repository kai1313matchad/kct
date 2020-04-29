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
            <div class="col-sm-12 col-md-12 col-lg-8">
              <div class="single-news">
                <div class="media-box">
                  <a href="page-news-single.html">
                    <img src="<?= base_url();?>assets/uploads/news/<?= $newsDt['path'];?>" alt="" class="img-fluid">
                  </a>
                </div>
                <h2 class="title"><?= $newsDt["judul"];?></h2>
                <div class="meta mb-4">
                  <div class="meta-date d-inline"><i class="fa fa-clock-o"></i> <?= $newsDt["tanggal"];?></div> <div class="meta-author d-inline">Posting oleh Admin</div>
                </div>
                <?= $newsDt["isi"];?>
              </div>
              <!-- end single blog -->
              <!-- <div class="author-box">
                <div class="media">
                  <img src="images/dummy-img-400x400.jpg" alt="" class="img-fluid">
                </div>
                <div class="body">
                  <h4 class="media-heading"><span>Author :</span>John Doel</h4>
                  We are also create and designing template for categories Graphic template and Game asset. in March 2019, we have won big contest Envato most wanted for categories game assets.
                </div>
                <div class="clearfix"></div>
              </div> -->
              <!-- end author box -->
              <!-- <div class="comments-box">
                <h4 class="title-heading">Comments <span>(3)</span></h4>
                <div class="media comment">
                  <img class="mr-3" alt="64x64" src="<?= base_url();?>assets/v1/images/dummy-img-400x400.jpg">
                  <div class="media-body">
                    <h5 class="media-heading mt-0 mb-1">Susi Doel<small class="date">March 24, 2019</small></h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  </div>
                </div>
                <div class="media reply-comment">
                  <img class="mr-3" alt="64x64" src="<?= base_url();?>assets/v1/images/dummy-img-400x400.jpg">
                  <div class="media-body">
                    <h5 class="media-heading mt-0 mb-1">Susi Doel<small class="date">March 24, 2019</small></h5> 
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  </div>
                </div>
                <div class="media comment">
                  <img class="mr-3" alt="64x64" src="<?= base_url();?>assets/v1/images/dummy-img-400x400.jpg">
                  <div class="media-body">
                    <h5 class="media-heading mt-0 mb-1">Susi Doel<small class="date">March 24, 2019</small></h5> 
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                  </div>
                </div>
              </div> -->
              <!-- end comment -->
              <!-- <div class="leave-comment-box">
                <h4 class="title-heading">Leave Comments</h4>
                <form action="#" class="form-comment">
                  <div class="row">
                    <div class="col-xs-12 col-md-6">
                      <div class="form-group">
                        <input type="text" id="name" name="name" value="" class="inputtext form-control" placeholder="Enter Name">
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-6">
                      <div class="form-group">
                        <input type="text" id="name" name="name" value="" class="inputtext form-control" placeholder="Enter Email">
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-12">
                      <div class="form-group">
                        <input type="text" id="name" name="name" value="" class="inputtext form-control" placeholder="Enter Website">
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-12">
                      <div class="form-group">
                        <textarea id="message" name="message" class="inputtext form-control" rows="6" placeholder="Enter Your Message..."></textarea>
                      </div>
                    </div>
                    <div class="col-xs-12 col-md-12">
                      <div class="form-group">
                        <button id="send" type="submit" class="btn btn-primary">Post Comment</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div> -->
            </div>
            <div class="col-sm-12 col-md-12 col-lg-4">
              <!-- <div class="widget categories">
                <ul class="category-nav">
                  <li class="active"><a href="#" title="Landscape Design">Voluptate Velit</a></li>
                  <li><a href="#" title="Planting & Removal">Fugiat Pariatur</a></li>
                  <li><a href="#" title="Garden Care">Excepteur Sint</a></li>
                  <li><a href="#" title="Irrigation & Drainage">Exercitation</a></li>
                  <li><a href="#" title="Stone and Hardscaping">Minim Veniam</a></li>
                  <li><a href="#" title="Rubbish Removal">Nulla Pariatur</a></li>
                </ul>
              </div> -->
              <div class="widget widget-text">
                <div class="widget-title">
                  Posting Terbaru
                </div>
                <?php 
                  foreach ($latestNews as $lt) { 
                    $newTgl = explode("-", $lt["tanggal"]);
                    switch ($newTgl[1]) {
                      case '01':
                        $newBln = "Jan";
                        break;
                      case '02':
                        $newBln = "Feb";
                        break;
                      case '03':
                        $newBln = "Mar";
                        break;
                      case '04':
                        $newBln = "Apr";
                        break;
                      case '05':
                        $newBln = "Mei";
                        break;
                      case '06':
                        $newBln = "Jun";
                        break;
                      case '07':
                        $newBln = "Jul";
                        break;
                      case '08':
                        $newBln = "Agu";
                        break;
                      case '09':
                        $newBln = "Sep";
                        break;
                      case '10':
                        $newBln = "Okt";
                        break;
                      case '11':
                        $newBln = "Nov";
                        break;
                      default:
                        $newBln = "Des";
                        break;
                    }
                ?>
                  <div class="latest-post-item">
                    <div class="meta-date"><span><?= $newTgl[2];?></span><?= $newBln;?></div>
                    <div class="title"><a href="page-news-single.html"><?= $lt["judul"];?></a></div>
                    <p class="meta-author">Posting oleh Admin</p>
                  </div>
                <?php } ?>
                <!-- <div class="latest-post-item">
                  <div class="meta-date"><span>30</span>May</div>
                  <div class="title"><a href="page-news-single.html">Deserunt mollit anim id est laborum</a></div>
                  <p class="meta-author">Posted by Rome Doel</p>
                </div>
                <div class="latest-post-item">
                  <div class="meta-date"><span>02</span>Des</div>
                  <div class="title"><a href="page-news-single.html">Occaecat cupidatat non proident</a></div>
                  <p class="meta-author">Posted by Rome Doel</p>
                </div>
                <div class="latest-post-item">
                  <div class="meta-date"><span>14</span>Feb</div>
                  <div class="title"><a href="page-news-single.html">Duis aute irure dolor in reprehenderit in voluptate velit</a></div>
                  <p class="meta-author">Posted by Rome Doel</p>
                </div> -->
              </div>
              <div class="widget widget-text">
                <div class="widget-title">
                  Kontak Kami
                </div>
                <div class="row mb-3">
                  <div class="col-4">Alamat </div>
                  <div class="col-8">Raya Taman No.15, Sidoarjo 61257. Indonesia</div>
                </div>
                <div class="row mb-3">
                  <div class="col-4">Telepon  </div>
                  <div class="col-8">(031) 7870870</div>
                </div>
                <!-- <div class="row mb-3">
                  <div class="col-4">Fax :</div>
                  <div class="col-8">(123) 65412309</div>
                </div> -->
                <div class="row mb-3">
                  <div class="col-4">Email </div>
                  <div class="col-8">admin@tritunggalmetalworks.com</div>
                </div>
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