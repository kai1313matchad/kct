<!-- Page Section -->
    <section id="about" class="page-contact">
        <div class="container">
            <div class="row">
                <h1>Contact Us</h1><br>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Head Office</h2>
                        <hr class="black">
                        <p>
                        Raya Taman Street No.15<br>
                        Sidoarjo - East Java, 61257<br>
                        Phone : (62-31) 7870870<br>
                        Fax : (62-31) 7870870<br>
                        Email : admin@tritunggalmetalworks.com
                        </p>
                    </div>
                    <div class="col-lg-6">
                        <h2>Branch Office</h2>
                        <hr class="black">
                        <p>
                        Mesjid Street No.255<br>
                        Kampung Melayu Besar, Tebet<br>
                        South Jakarta <br>
                        Phone : (62-21) 8291734<br>
                        Fax : (62-21) 8291734<br>
                        Email : admin@tritunggalmetalworks.com
                        </p>
                    </div>
                </div><br>
            </div>                    
			<div class="row">
				<div class="col-lg-12">
					<div class="maps-bd">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.0366029777015!2d112.70359301419529!3d-7.349786594696141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e352d1168605%3A0x643496011ecbd3de!2sJl.+Raya+Taman+No.15%2C+Kedungturi%2C+Taman%2C+Kabupaten+Sidoarjo%2C+Jawa+Timur+61257%2C+Indonesia!5e0!3m2!1sen!2sid!4v1489054767516" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
		
        <div class="row">
            <div class="col-lg-4 col-lg-offset-2"><br>
                <form class="form-email" action="<?php echo base_url() ?>Home/contactus_send" method="post" enctype="multipart/form-data">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="name" type="text" class="form-control" name="name" placeholder="Full name">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <input id="email" type="text" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                        <input id="company" type="text" class="form-control" name="company" placeholder="Company Name">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-home"></i></span>
                        <input id="address" type="text" class="form-control" name="address" placeholder="Address">
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone-square"></i></span>
                        <input id="phone" type="text" class="form-control" name="phone" placeholder="Phone / Mobile">
					</div>
                    <div class= "form-email-msg">
                        <div class="form-group" "text-left">
                            <label for="comment" class="text-left" >Message :</label>
                            <textarea class="form-control" rows="5" name="msg" id="comment"></textarea>
                        </div>
                        <div class="email text-center" action="mailer.php" method="post">
                            <button type="submit" class="btn btn-primary btn-md">Send</button>
                        </div>
                    </div><br>
				</form>				
			</div>
			<div class="col-lg-4" "text-right"><br>
				<img src="<?php echo base_url() ?>assets/img/kontruksi.jpg" class="img-responsive" alt="">
			</div>                       
		</div> 
    </section>
    <section class="sect-footer">
        <img src="<?php echo base_url() ?>assets/img/9.png">
    </section>