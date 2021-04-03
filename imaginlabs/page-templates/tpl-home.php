<?php
/*
** Template Name: Home Page
*/
session_start();
get_header();
?> 
<div id="content">
	<div class="wrapper">
    	<div class="content-sec">

        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<h2 class="title"><?php the_title(); ?></h2>
				<?php if (isset($_SESSION['msg'])) { ?>
						<div class="form-success"><?php echo $_SESSION['msg']; ?></div>
						<?php session_destroy ();
					}   
					/* This code is still pending to be developed */
					//echo do_shortcode('[accu_weather]'); 
					?>
					<div class="dailyforecasts">
						<?php 
							$dailydata = $output["DailyForecasts"];
							$threedaysdata = array_slice($dailydata, 0, 3);
							foreach($threedaysdata as $key => $value) { 
								$img_icon = $value['Day']['Icon']; 
								$phrase = $value['Day']['IconPhrase']; 
								$precipitationtype = $value['Day']['PrecipitationType']; 
								$precipitationintensity = $value['Day']['PrecipitationIntensity']; 

								$min_temp = $value['Temperature']['Minimum']['Value']; 
								$max_temp = $value['Temperature']['Maximum']['Value']; 
								$tempunit = $value['Temperature']['Maximum']['Unit'];
								?>
								<div class="daily-weather">
									<div class="temperature">								
										<img alt="<?php echo $phrase; ?>" src="https://www.accuweather.com/images/weathericons/<?php echo $img_icon;  ?>.svg"> 
										<span class="temp"><?php  echo $min_temp .' &#8451; - '. $max_temp .' &#8451; '; ?></span>
									</div>
									<div class="temp-detail"><span class="phrase"><?php echo $phrase; ?></span><div class="date"> <?php echo $date = date('jS F Y', strtotime($value['Date'])); ?> </div></div>  
								</div>   
						<?php } ?>
					</div> 

            	<?php endwhile; else: ?>
				<div class="error"><?php _e('Not found.'); ?></div>
            <?php endif; ?> 
        </div>
        <div class="clear"></div>
    </div>
</div><!-- EOF : content ID -->  
<?php get_footer(); ?>