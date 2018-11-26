<section id="about" class="page-section">
        <div class="container">            
			<div class="row">				
				<div class="col-lg-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<h2 class="section-heading">About Us</h2>
							<p>
							We Tritunggal Metalworks (PT Kreasi Cipta Tritunggal) is a company focused on the field of billboard construction. As for some of the products we produce in the form of billboard construction such as billboards / banners / Videotron, neon, letter sign, canopi, fence, BTS tower, the working ACP for interior and exterior. Tritunggal Metalworks itself has stood since 2004 until today. All the products we produce in our own workshop, supported by experts in the field of human resources, adequate equipment and quality control processes are trustworthy so that all the products we produce have reliable quality and competitive prices as well as affordable.
							</p>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
				<?php extract($jobs); ?>
				<h2 class="section-heading">Offered Position</h2><br>
					<div class="row-clearfix">
						<div class="row">
							<div class="col-lg-2">
								<p class="text-left">
									Title
								</p>
							</div>
							<div class="col-lg-10">
								<p class="text-left">
									<?php echo $judul; ?>
								</p>
								<hr class="black">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<p class="text-left">
									Start Date
								</p>
							</div>
							<div class="col-lg-10">
								<p class="text-left">
									<?php echo $tgl_post; ?>
								</p>
								<hr class="black">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<p class="text-left">
									End Date
								</p>
							</div>
							<div class="col-lg-10">
								<p class="text-left">
									<?php echo $tgl_end; ?>
								</p>
								<hr class="black">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<p class="text-left">
									Location
								</p>
							</div>
							<div class="col-lg-10">
								<p class="text-left">
									<?php echo $lokasi; ?>
								</p>
								<hr class="black">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<p class="text-left">
									Job Description
								</p>
							</div>
							<div class="col-lg-10">
								<div class="text-left">
									<?php echo $jobdesc; ?>
								</div>
								<hr class="black">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<p class="text-left">
									Information
								</p>
							</div>
							<div class="col-lg-10">
								<div class="text-left">
									<?php echo $info; ?>
								</div>
								<hr class="black">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-3">
								<p class="text-left">
									<a href="<?php echo base_url() ?>Home/career_list"> 
									<<< Back To Career
									</a>
								</p>
							</div>							
							<div class="col-lg-3 col-lg-offset-6">	
								<p class="text-right">
									<a href="<?php echo base_url() ?>Home/career_apply/<?php echo $id_job; ?>"> 
									Apply Career >>>
									</a>
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<p class="text-left">
									<strong>Share</strong>
								</p>
							</div>
							<div class="col-lg-4">
								<ul class="list-inline">
									<li>
									<a href="https://www.facebook.com/sharer.php?s=100&amp;p[url]=<?php echo current_url() ?>" target="_blank"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
									</li>
									<li>
									<a href="https://twitter.com/share?source=sharethiscom&text=<?php echo current_url() ?>" target="_blank"><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>							

			</div>
					
		</div>		
	</div>
    </section>