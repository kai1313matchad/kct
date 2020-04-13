    <!-- BANNER -->
	  <div class="section banner-page" data-background="<?= base_url();?>assets/v1/images/1920x300/1920x300-1.jpg">
		  <div class="content-wrap pos-relative">
			  <div class="container">
				  <div class="col-12 col-md-12">
					  <div class="d-flex bd-highlight mb-2">
						  <div class="title-page">Contact</div>
					  </div>
					  <nav aria-label="breadcrumb">
					    <ol class="breadcrumb ">
					      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
					      <li class="breadcrumb-item active" aria-current="page">Contact</li>
					    </ol>
					  </nav>
				  </div>
			  </div>
		  </div>
	  </div>

    <!-- CONTENT -->
	  <div id="contact" class="section">
		  <div class="content-wrap">
			  <div class="container">
				  <div class="row">
					  <div class="col-sm-12 col-md-12">
						  <div class="mapouter">
							  <div class="gmap_canvas maps">
								  <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=bukakreasi&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
							  </div>
						  </div>
					  </div>
				  </div>
				  <div class="row mt-5">
					  <div class="col-sm-12 col-md-12 col-lg-4">
						  <h4 class="text-black mt-0">Contact Details</h4>
						  <!-- Item 1 -->
						  <div class="rs-icon-info-2">
							  <div class="info-icon">
								  <i class="fa fa-map-marker"></i>
							  </div>
							  <div class="body-text">
								  <h5>Address</h5>
								  <p>Raya Taman No.15, Sidoarjo 61257. Indonesia</p>
							  </div>
						  </div>
						  <!-- Item 2 -->
						  <div class="rs-icon-info-2">
							  <div class="info-icon">
								  <i class="fa fa-phone"></i>
							  </div>
							  <div class="body-text">
								  <h5>Phone</h5>
								  <p>(031) 7870870</p>
							  </div>
						  </div>
						  <!-- Item 3 -->
						  <div class="rs-icon-info-2">
							  <div class="info-icon">
								  <i class="fa fa-envelope"></i>
							  </div>
							  <div class="body-text">
								  <h5>Email</h5>
								  <p>admin@tritunggalmetalworks.com</p>
							  </div>
						  </div>
					  </div>
					  <div class="col-sm-12 col-md-12 col-lg-7 offset-lg-1">
						  <h4 class="text-black mt-0">Send a Message here</h4>
						  <form action="#" class="form-contact" id="contactForm">
							  <div class="row">
								  <div class="col-sm-6 col-md-6">
									  <div class="form-group">
										  <input type="text" class="form-control" id="p_name" placeholder="Enter Name" required="">
										  <div class="help-block with-errors"></div>
									  </div>
								  </div>
							  	<div class="col-sm-6 col-md-6">
									  <div class="form-group">
										  <input type="email" class="form-control" id="p_email" placeholder="Enter Email" required="">
										  <div class="help-block with-errors"></div>
								  	</div>
								  </div>
								  <div class="col-sm-6 col-md-6">
									  <div class="form-group">
										  <input type="text" class="form-control" id="p_subject" placeholder="Subject">
										  <div class="help-block with-errors"></div>
									  </div>
								  </div>
								  <div class="col-sm-6 col-md-6">
									  <div class="form-group">
										  <input type="text" class="form-control" id="p_phone" placeholder="Enter Phone Number">
										  <div class="help-block with-errors"></div>
									  </div>
								  </div>
							  </div>
							  <div class="form-group">
								  <textarea id="p_message" class="form-control" rows="6" placeholder="Enter Your Message"></textarea>
								  <div class="help-block with-errors"></div>
							  </div>
							  <div class="form-group">
								  <div class="text-left">
									  <div id="success"></div>
									  <button type="submit" class="btn btn-primary">SEND MESSAGE</button>
								  </div>
							  </div>
						  </form>
					  </div>
				  </div>
			  </div>
		  </div>
	  </div>

    <!-- CTA -->
    <?php include 'application/views/layout/frontend/cta.php' ?>

    <!-- FOOTER SECTION -->
	  <?php include 'application/views/layout/frontend/footer-new.php' ?>

    <?php include 'application/views/layout/frontend/jspack.php' ?>

</body>
</html>