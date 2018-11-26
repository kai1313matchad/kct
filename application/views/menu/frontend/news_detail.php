<!-- Page Section -->
    <section id="news" class="news">
        <div class="container">
        	<?php extract($news)?>
            <div class="row-clearfix">
				<div class="col-lg-8">
					<img class="img-responsive sr-icons" src="<?php echo base_url() ?>assets/uploads/news/<?php echo $path; ?>">		
				</div>
				<div class="col-lg-4">
					<p>
						<?php echo $isi; ?>
					</p>
					<p><strong>Share : </strong></p>
					<div class="row">
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
    </section>
    <br>