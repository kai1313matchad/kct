    <div class="footer">
		  <div class="spacer-50"></div>
		  <div class="content-wrap">
			  <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="footer-item">
                <img src="<?= base_url()?>/assets/v1/images/kct-logo-light.svg" alt="logo bottom" class="logo-bottom">
                <div class="spacer-30"></div>
                <p><strong>Tritunggal Metalworks</strong> adalah perusahaan yang bergerak di bidang konstruksi khususnya konstruksi reklame.</p>
                <div class="sosmed-icon d-inline-flex">
                  <a href="https://www.facebook.com/Tritunggal-Metalworks-153338715169247/"><i class="fa fa-facebook"></i></a> 
                  <a href="https://twitter.com/PT_KCT"><i class="fa fa-twitter"></i></a> 
                  <a href="https://www.instagram.com/tritunggalmetalworks/"><i class="fa fa-instagram"></i></a> 
                  <a href="#"><i class="fa fa-linkedin"></i></a> 
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="footer-item">
                <div class="footer-title">
                  Artikel Terbaru
                </div>
                <ul class="recent-post">
                  <?php foreach ($recentNews as $rc) { ?>
                    <li><a href="<?= base_url();?>news-details/<?= $rc['url']?>" title=""><?= $rc["judul"];?></a><span class="date"><i class="fa fa-clock-o"></i> <?= $rc["tanggal"];?></span></li>
                  <?php }?>
                  <!-- <li><a href="#" title="">The Best in dolor sit amet consectetur adipisicing elit sed</a>
                  <span class="date"><i class="fa fa-clock-o"></i> June 16, 2017</span></li>
                  <li><a href="#" title="">The Best in dolor sit amet consectetur adipisicing elit sed</a>
                  <span class="date"><i class="fa fa-clock-o"></i> June 16, 2017</span></li> -->
                </ul>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="footer-item">
                <div class="footer-title">
                  Tentang Kami
                </div>
                <ul class="list">
                  <li><a href="<?= base_url();?>about-company" title="About Us">Perusahaan</a></li>
                  <li><a href="<?= base_url();?>about-history" title="Corporate Profile">Sejarah</a></li>
                  <li><a href="<?= base_url();?>about-team" title="Our Team">Tim Kami</a></li>
                  <li><a href="<?= base_url();?>projects" title="Portfolio">Portofolio</a></li>
                  <li><a href="<?= base_url();?>contact" title="Our Office">Kantor Kami</a></li>
                </ul>								
              </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
              <div class="footer-item">
                <div class="footer-title">
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
		  <div class="fcopy">
			  <div class="container">
				  <div class="row">
					  <div class="col-sm-12 col-md-12 col-lg-12">
						  <p class="mt-3 text-center">Copyright 2020 © <span class="text-secondary">Tritunggal Metalworks</span>. Powered by <span class="text-secondary">Rometheme.</span></p> 
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>