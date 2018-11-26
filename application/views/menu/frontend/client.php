<!-- Page Section -->
    <section id="about" class="page-section">
        <div class="container">
			<h1>Our Client</h1><br><br>
            <?php                
                $b=count($listdata);
                if($b<5)
                {
                    for($i=0;$i<$b;$i++)
                    {
                        if($b==1)
                        { ?>
                        <div class="row">
	                        <div class="col-lg-3 col-md-4 col-xs-6 center-block">
	                        	<img src="<?php echo base_url() ?>assets/uploads/clients/<?php echo $listdata[$i]->path ?>" class="img-responsive" alt="">
	                        </div>                        	
                        </div><br>
            <?php
                        }
                        elseif($i==0)
                        { ?>
                        <div class="row">
                        	<div class="col-lg-3 col-md-4 col-xs-6 center-block">
	                        	<img src="<?php echo base_url() ?>assets/uploads/clients/<?php echo $listdata[$i]->path ?>" class="img-responsive" alt="">
	                        </div> 
            <?php
                        }
                        elseif($i==$b-1)
                        { ?>
                        	<div class="col-lg-3 col-md-4 col-xs-6 center-block">
	                        	<img src="<?php echo base_url() ?>assets/uploads/clients/<?php echo $listdata[$i]->path ?>" class="img-responsive" alt="">
	                        </div> 
                        </div><br>
            <?php
                        }
                        else
                        { ?>                        
                        	<div class="col-lg-3 col-md-4 col-xs-6 center-block">
	                        	<img src="<?php echo base_url() ?>assets/uploads/clients/<?php echo $listdata[$i]->path ?>" class="img-responsive" alt="">
	                        </div> 
			<?php
                        }
                    }
                }
                elseif($b>4 and $b<9)
                {
                    for($i=0;$i<$b;$i++)
                    {
                        if($i==4 and $i==$b-1)
                        { ?>
                       	<div class="row">
                        	<div class="col-lg-3 col-md-4 col-xs-6 center-block">
	                        	<img src="<?php echo base_url() ?>assets/uploads/clients/<?php echo $listdata[$i]->path ?>" class="img-responsive" alt="">
	                        </div>
                        </div><br>
            <?php
                        }
                        elseif($i==0 or $i==4)
                        { ?>
						<div class="row">
                        	<div class="col-lg-3 col-md-4 col-xs-6 center-block">
	                        	<img src="<?php echo base_url() ?>assets/uploads/clients/<?php echo $listdata[$i]->path ?>" class="img-responsive" alt="">
	                        </div>
            <?php
                        }
                        elseif($i==$b-1)
                        { ?>                        
                        	<div class="col-lg-3 col-md-4 col-xs-6 center-block">
	                        	<img src="<?php echo base_url() ?>assets/uploads/clients/<?php echo $listdata[$i]->path ?>" class="img-responsive" alt="">
	                        </div>
                        </div><br>
            <?php
                        }
                        elseif($i==3)
                        { ?>
                        	<div class="col-lg-3 col-md-4 col-xs-6 center-block">
	                        	<img src="<?php echo base_url() ?>assets/uploads/clients/<?php echo $listdata[$i]->path ?>" class="img-responsive" alt="">
	                        </div>
                        </div><br>
            <?php
                        }
                        else
                        { ?>                        
                        	<div class="col-lg-3 col-md-4 col-xs-6 center-block">
	                        	<img src="<?php echo base_url() ?>assets/uploads/clients/<?php echo $listdata[$i]->path ?>" class="img-responsive" alt="">
	                        </div>
            <?php
                        }
                    }
                }
                elseif($b>8)
                {
                	for($i=0;$i<$b;$i++)
                    {
                        if($i==8 and $i==$b-1)
                        { ?>
                        <div class="row">
                        	<div class="col-lg-3 col-md-4 col-xs-6 center-block">
	                        	<img src="<?php echo base_url() ?>assets/uploads/clients/<?php echo $listdata[$i]->path ?>" class="img-responsive" alt="">
	                        </div>
                        </div>
           	<?php
                        }
                        elseif($i==0 or $i==4 or $i==8)
                        { ?>
                        <div class="row">
                        	<div class="col-lg-3 col-md-4 col-xs-6 center-block">
	                        	<img src="<?php echo base_url() ?>assets/uploads/clients/<?php echo $listdata[$i]->path ?>" class="img-responsive" alt="">
	                        </div>
            <?php
                        }
                        elseif($i==$b-1)
                        { ?>                        
                        	<div class="col-lg-3 col-md-4 col-xs-6 center-block">
	                        	<img src="<?php echo base_url() ?>assets/uploads/clients/<?php echo $listdata[$i]->path ?>" class="img-responsive" alt="">
	                        </div>
                        </div><br>
            <?php
                        }
                        elseif($i==3 or $i==7)
                        { ?>                        
                        	<div class="col-lg-3 col-md-4 col-xs-6 center-block">
	                        	<img src="<?php echo base_url() ?>assets/uploads/clients/<?php echo $listdata[$i]->path ?>" class="img-responsive" alt="">
	                        </div>
                        </div><br>
            <?php
                        }                    
                        else
                        { ?>                        
                        	<div class="col-lg-3 col-md-4 col-xs-6 center-block">
	                        	<img src="<?php echo base_url() ?>assets/uploads/clients/<?php echo $listdata[$i]->path ?>" class="img-responsive" alt="">
	                        </div>
            <?php
                        }
                    }
                }         
            ?>            			
		</div>
    </section>
    <section class="sect-footer">
        <img src="<?php echo base_url() ?>assets/img/9.png">
    </section>