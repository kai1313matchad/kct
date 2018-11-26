<!-- Intro Section -->
    <div class="padtop">
        
    </div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
        <ol class="carousel-indicators">
        <?php
        for ($i=0; $i<count($banner); $i++)
            {
                if($i<1)
                {
                    echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>';
                }            
                else
                {
                    echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
                }
            }
        ?>
        </ol>
		<!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <?php
        for ($i=0; $i<count($banner); $i++)
        { 
            if($i<1) 
            { ?>                        
                <div class="item active">
                    <img src="<?php echo base_url().'assets/uploads/banner/'.$banner[$i]->path_banner ?>" class="img-responsive" alt="" >
                    <!-- <img src="<?php echo base_url().'assets/uploads/banner/'.$banner[$i]->path_banner ?>" style="width: 1350px; max-height: 540px;" alt="" > -->
                </div>                   
            <?php    
            }
            else 
            { ?>
                <div class="item">
                    <img src="<?php echo base_url().'assets/uploads/banner/'.$banner[$i]->path_banner ?>" class="img-responsive" alt="" >
                    <!-- <img src="<?php echo base_url().'assets/uploads/banner/'.$banner[$i]->path_banner ?>" style="width: 1350px; max-height: 540px;" alt="" > -->
                </div> 
            <?php    
            }
        }   ?>
        </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>    
    <!-- About Section -->
    <section id="about" class="about-section" >
    <div class="container">
            <div class="row" >
                <div class="col-lg-12">
                    <h1>History Tritunggal Metalworks</h1><br>
                    <p class="text-justify">
                        We Tritunggal Metalworks (PT Kreasi Cipta Tritunggal) is a company focused on the field of billboard construction. As for some of the products we produce in the form of billboard construction such as billboards / banners / Videotron, neon, letter sign, canopi, fence, BTS tower, the working ACP for interior and exterior. Tritunggal Metalworks itself has stood since 2004 until today. All the products we produce in our own workshop, supported by experts in the field of human resources, adequate equipment and quality control processes are trustworthy so that all the products we produce have reliable quality and competitive prices as well as affordable.
                    </p><br>
					<a href="<?php echo base_url() ?>Home/history" button class="btn btn-primary btn-xl">
                        Next History Company
                    </a>
                </div>
            </div>
        </div>
    </section>
    <br>
	<section class="text-center"><br><br>
		<div class="container">
            <div class="row">
                <div class="col-lg-4 ctg_border">
                    <h4><strong>Billboard</strong></h4>
                    <a href="<?php echo base_url() ?>Home/products_billboard">
                        <div class="ctg_img">
                            <img src="<?php echo base_url() ?>assets/uploads/products/<?php echo $billboard['path'] ?>" class="img-rounded img-responsive">
                        </div>                        
                    </a>
                </div>
                <div class="col-lg-4 ctg_border">
                    <h4><strong>Canopy</strong></h4>
                    <a href="<?php echo base_url() ?>Home/products_canopy">
                        <div class="ctg_img">
                            <img src="<?php echo base_url() ?>assets/uploads/products/<?php echo $canopy['path'] ?>" class="img-rounded img-responsive" >
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 ctg_border">
                    <h4><strong>Exterior-Fascia</strong></h4>
                    <a href="<?php echo base_url() ?>Home/products_ex_fascia">
                        <div class="ctg_img">
                            <img src="<?php echo base_url() ?>assets/uploads/products/<?php echo $exfascia['path'] ?>" class="img-rounded img-responsive">
                        </div>
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4 ctg_border">
                    <h4><strong>Interior-Fascia</strong></h4>
                    <a href="<?php echo base_url() ?>Home/products_in_fascia">
                        <div class="ctg_img">
                            <img src="<?php echo base_url() ?>assets/uploads/products/<?php echo $infascia['path'] ?>" class="img-rounded img-responsive" >
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 ctg_border">
                    <h4><strong>Letter Sign</strong></h4>
                    <a href="<?php echo base_url() ?>Home/products_letter">
                        <div class="ctg_img">
                            <img src="<?php echo base_url() ?>assets/uploads/products/<?php echo $letter['path'] ?>" class="img-rounded img-responsive" >
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 ctg_border">
                    <h4><strong>Mural</strong></h4>
                    <a href="<?php echo base_url() ?>Home/products_mural">
                        <div class="ctg_img">
                            <img src="<?php echo base_url() ?>assets/uploads/products/<?php echo $mural['path'] ?>" class="img-rounded img-responsive" >
                        </div>
                    </a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-4 ctg_border">
                    <h4><strong>Neonbox</strong></h4>
                    <a href="<?php echo base_url() ?>Home/products_neon">
                        <div class="ctg_img">
                            <img src="<?php echo base_url() ?>assets/uploads/products/<?php echo $neonbox['path'] ?>" class="img-rounded img-responsive" >
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 ctg_border">
                    <h4><strong>Pylon</strong></h4>
                    <a href="<?php echo base_url() ?>Home/products_pylon">
                        <div class="ctg_img">
                            <img src="<?php echo base_url() ?>assets/uploads/products/<?php echo $pylon['path'] ?>" class="img-rounded img-responsive" >
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 ctg_border">
                    <h4><strong>Tower BTS</strong></h4>
                    <a href="<?php echo base_url() ?>Home/products_bts_tower">
                        <div class="ctg_img">
                            <img src="<?php echo base_url() ?>assets/uploads/products/<?php echo $bts['path'] ?>" class="img-rounded img-responsive" >
                        </div>
                    </a>
                </div>
            </div>
            <br><br>
        </div>	
	</section>