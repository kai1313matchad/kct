    <!-- BANNER -->
    <div id="home" class="banner">
    	<div class="owl-carousel owl-theme full-screen">
				<?php foreach ($banners as $banner) { ?>
					<div class="item">
						<img src="<?= base_url()?>assets/uploads/banner/<?= $banner->path_banner; ?>" alt="Slider">
						<div class="container d-flex align-items-center h-right">
							<div class="wrap-caption">
							</div>   
						</div>
					</div>
				<?php }?>
    		<!-- Item 1 -->
	    	<!-- <div class="item">
	        <img src="<?= base_url()?>assets/v1/images/1920x900/1920x900-1.jpg" alt="Slider">
	        <div class="container d-flex align-items-center h-right">
	          <div class="wrap-caption">
		          <h1 class="caption-heading text-white">TRITUNGGAL <span>Metalworks</span></h1>
		          <p class="uk18 text-white">Tim kami bekerja secara professional untuk menambah produktifitas dan efektifitas biaya.</p>
		          <a href="#" class="btn btn-primary text-white">Get Started</a> 
		          <a href="#" class="btn btn-secondary">Learn More</a>
		        </div>   
	        </div>
	    	</div>  -->
    	</div>
	    <div class="custom-nav owl-nav"></div>
    </div>

		<!-- SERVICES -->
	  <div class="section">
		  <div class="content-wrap">
			  <div class="container">
				  <div class="row">
					  <div class="col-sm-12 col-md-12">
						  <h2 class="section-heading text-primary no-after mb-5">LAYANAN KAMI</h2>
						  <p class="subheading">Kami menerapkan standar yang tinggi untuk solusi bisnis anda.</p>
					  </div>
				  </div>
				  <div class="row mt-5">
					  <!-- Item 1 -->
					  <div class="col-sm-12 col-md-12 col-lg-4">
						  <div class="feature-box-7 shadow">
							  <div class="media-box">
								  <a href="<?= base_url();?>projects/1"><img src="<?= base_url()?>assets/v1/images/600x500/600x500-billboard.jpg" alt="" class="img-fluid"></a>
							  </div>
							  <div class="body">
								  <div class="info-box">
									  <div class="text">
										  <div class="title">Billboard</div>
										  <p></p>
										  <a class="text-href" href="<?= base_url();?>projects/1" title="Detail">Detail</a>
									  </div>
								  </div>
							  </div>
						  </div>
					  </div>
					  <!-- Item 2 -->
					  <div class="col-sm-12 col-md-12 col-lg-4">
						  <div class="feature-box-7 shadow">
							  <div class="media-box">
								  <a href="<?= base_url();?>projects/1"><img src="<?= base_url()?>assets/v1/images/600x500/600x500-canopy-2.jpg" alt="" class="img-fluid"></a>
							  </div>
							  <div class="body">
								  <div class="info-box">
									  <div class="text">
										  <div class="title">Canopy</div>
										  <p></p>
										  <a class="text-href" href="<?= base_url();?>projects/1" title=" Detail">Detail</a>
									  </div>
								  </div>
							  </div>
						  </div>
					  </div>
					  <!-- Item 3 -->
					  <div class="col-sm-12 col-md-12 col-lg-4">
						  <div class="feature-box-7 shadow">
							  <div class="media-box">
								  <a href="<?= base_url();?>projects/1"><img src="<?= base_url()?>assets/v1/images/600x500/600x500-letter-2.jpg" alt="" class="img-fluid"></a>
							  </div>
							  <div class="body">
								  <div class="info-box">
									  <div class="text">
										  <div class="title">Letter Sign</div>
										  <p></p>
										  <a class="text-href" href="<?= base_url();?>projects/1" title="Detail">Detail</a>
									  </div>
								  </div>
							  </div>
						  </div>
					  </div>
					  <!-- Item 4 -->
					  <div class="col-sm-12 col-md-12 col-lg-4">
						  <div class="feature-box-7 shadow">
							  <div class="media-box">
								  <a href="<?= base_url();?>projects/1"><img src="<?= base_url()?>assets/v1/images/600x500/600x500-fascia-2.jpg" alt="" class="img-fluid"></a>
							  </div>
							  <div class="body">
								  <div class="info-box">
									  <div class="text">
										  <div class="title">Fascia Billboard</div>
										  <p></p>
										  <a class="text-href" href="<?= base_url();?>projects/1" title="Detail">Detail</a>
									  </div>
								  </div>
							  </div>
						  </div>
					  </div>
					  <!-- Item 5 -->
					  <div class="col-sm-12 col-md-12 col-lg-4">
						  <div class="feature-box-7 shadow">
							  <div class="media-box">
								  <a href="<?= base_url();?>projects/1"><img src="<?= base_url()?>assets/v1/images/600x500/600x500-signage-2.jpg" alt="" class="img-fluid"></a>
							  </div>
							  <div class="body">
								  <div class="info-box">
									  <div class="text">
										  <div class="title">Signage</div>
										  <p></p>
										  <a class="text-href" href="<?= base_url();?>projects/1" title="Detail">Detail</a>
									  </div>
								  </div>
							  </div>
						  </div>
					  </div>
					  <!-- Item 6 -->
					  <div class="col-sm-12 col-md-12 col-lg-4">
						  <div class="feature-box-7 shadow">
							  <div class="media-box">
								  <a href="<?= base_url();?>projects/1"><img src="<?= base_url()?>assets/v1/images/600x500/600x500-container.jpg" alt="" class="img-fluid"></a>
							  </div>
							  <div class="body">
								  <div class="info-box">
									  <div class="text">
										  <div class="title">Container</div>
									  	<p></p>
										  <a class="text-href" href="<?= base_url();?>projects/1" title="Detail">Detail</a>
									  </div>
								  </div>
							  </div>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>

    <!-- ABOUT -->
		<!-- <div class="section">
			<div class="content-wrap py-0">
				<div class="container">
					<div class="row align-items-end">
						<div class="col-12 col-md-4">
							<img src="<?= base_url()?>assets/v1/images/500x880/500x880-1.png" class="img-fluid" alt="">
						</div>
						<div class="col-12 col-md-7 offset-md-1">
							<div class="jumbo-heading text-primary">Reliable Engineering Takes Many Forms</div>
							<p class="mt-3 uk21">Our Combined Experience</p>
							<p>We Tritunggal Metalworks (PT Kreasi Cipta Tritunggal) is a company focused on the field of billboard construction. As for some of the products we produce in the form of billboard construction such as billboards / banners / Videotron, neon, letter sign, canopi, fence, BTS tower, the working ACP for interior and exterior. Tritunggal Metalworks itself has stood since 2004 until today.</p>
							<a href="#" class="btn btn-secondary mt-3">Get a Quote &nbsp; <i class="fa fa-paper-plane-o"></i></a>
							<div class="spacer-content"></div>
						</div>
					</div>
				</div>
			</div>
		</div> -->

	  <!-- FACT -->
	  <div class="section bgi-cover-center bg-overlay-primary" data-background="<?= base_url()?>assets/v1/images/1920x900/1920x900-4.jpg">
		  <div class="content-wrap">
			  <div class="container">
				  <div class="row">
					  <!-- <div class="col-sm-3 col-md-3">
						  <div class="box-stat">
							  <div class="icon">
								  <div class="fa fa-users"></div>
							  </div>
							  <h2 class="counter">1000+</h2>
							  <p>Passionate Employee</p>
						  </div>
					  </div>
					  <div class="col-sm-3 col-md-3">
						  <div class="box-stat">
							  <div class="icon">
								  <div class="fa fa-users"></div>
							  </div>
							  <h2 class="counter">16+</h2>
							  <p>Offices Worldwide</p>
						  </div>
						</div> -->
						<div class="col-sm-3 col-md-3"></div>
					  <div class="col-sm-3 col-md-3">
						  <div class="box-stat">
							  <div class="icon">
								  <div class="fa fa-building-o"></div>
							  </div>
							  <h2 class="counter">10+</h2>
							  <p>Years Experience</p>
						  </div>
					  </div>
					  <div class="col-sm-3 col-md-3">
						  <div class="box-stat">
							  <div class="icon">
								  <div class="fa fa-briefcase"></div>
							  </div>
							  <h2 class="counter">100+</h2>
							  <p>PROJECTS</p>
						  </div>
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>	
	
	  <!-- OUR ARTICLES -->
	  <div class="section">
		  <div class="content-wrap pb-0">
			  <div class="container">
				  <div class="row">
					  <div class="col-sm-12 col-md-12">
						  <h2 class="section-heading text-primary mb-5">ARTIKEL TERBARU</h2>
						  <!-- <p class="subheading">Kami menerapkan standar yang tinggi untuk solusi bisnis anda.</p> -->
				  	</div>
				  </div>
				  <div class="row mt-4">
						<?php foreach ($latestNews as $dt) { ?>
							<div class="col-sm-12 col-md-12 col-lg-4">
								<div class="rs-news-1 mb-1">
									<div class="media">
										<a href="<?= base_url();?>news-details/<?= $dt["url"];?>">
											<img src="<?= base_url()?>assets/uploads/news/<?= $dt['path'];?>" alt="" class="img-fluid">
										</a>
									</div>
									<div class="body">
										<div class="title"><a href="<?= base_url();?>news-details/<?= $dt["url"];?>"><?= $dt["judul"];?></a></div>
										<div class="meta-date"><?= $dt["tanggal"];?></div>
										<p><?= $dt["kutipan"]?></p>
									</div>
								</div>
							</div>
						<?php }?>
            <!-- Item 1 -->
            <!-- <div class="col-sm-12 col-md-12 col-lg-4">
              <div class="rs-news-1 mb-1">
                <div class="media">
                  <a href="news-single.html">
                    <img src="<?= base_url()?>assets/v1/images/600x500/600x500-1.jpg" alt="" class="img-fluid">
                  </a>
                </div>
                <div class="body">
                  <div class="title"><a href="news-single.html">Occusamus et iusto odio</a></div>
                  <div class="meta-date">May 12, 2019</div>
                  <p>Dignissimos ccusamus et iusto odio ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores....</p>
                </div>
              </div>
            </div> -->
            <!-- Item 2 -->
            <!-- <div class="col-sm-12 col-md-12 col-lg-4">
              <div class="rs-news-1 mb-1">
                <div class="media">
                  <a href="news-single.html">
                    <img src="<?= base_url()?>assets/v1/images/600x500/600x500-2.jpg" alt="" class="img-fluid">
                  </a>
                </div>
                <div class="body">
                  <div class="title"><a href="news-single.html">Deleniti atque corrupti</a></div>
                  <div class="meta-date">May 12, 2019</div>
                  <p>Dignissimos ccusamus et iusto odio ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores....</p>
                </div>
              </div>
            </div> -->
            <!-- Item 3 -->
            <!-- <div class="col-sm-12 col-md-12 col-lg-4">
              <div class="rs-news-1 mb-1">
                <div class="media">
                  <a href="news-single.html">
                    <img src="<?= base_url()?>assets/v1/images/600x500/600x500-3.jpg" alt="" class="img-fluid">
                  </a>
                </div>
                <div class="body">
                  <div class="title"><a href="news-single.html">Voluptatum deleniti atque</a></div>
                  <div class="meta-date">May 12, 2019</div>
                  <p>Dignissimos ccusamus et iusto odio ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores....</p>
                </div>
              </div>
            </div> -->
				  </div>
			  </div>
		  </div>
	  </div>

	  <!-- OUR PARTNERS -->
	  <?php include 'application/views/layout/frontend/partners.php' ?>

	  <!-- CTA -->
	  <?php include 'application/views/layout/frontend/cta-ind.php' ?>

	  <!-- FOOTER SECTION -->
	  <?php include 'application/views/layout/frontend/footer-new.php' ?>

		<?php include 'application/views/layout/frontend/jspack.php' ?>

</body>
</html>