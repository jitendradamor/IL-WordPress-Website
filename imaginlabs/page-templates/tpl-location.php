<?php
/*
** Template Name: Location Page
*/
session_start();
get_header();
?>

<div id="content">
	<div class="wrapper">
    	<div class="content-sec">

        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<h2 class="title"><?php the_title(); ?></h2>

				<?php
					if (isset($_SESSION['msg'])) {
						?>
						<div class="form-success"><?php echo $_SESSION['msg']; ?></div>
						<?php
						session_destroy ();
					}
  				?>

				  <?php
				  $handle = curl_init();
 
				  $url = "http://dataservice.accuweather.com/forecasts/v1/daily/5day/227342?apikey=tkmAzl3CUzAQdji83UDZ9zmV2VMFHKAG&metric=true";
				   
				  // Set the url
				  curl_setopt($handle, CURLOPT_URL, $url);
				  // Set the result output to be a string.
				  curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
				   
				  $output = curl_exec($handle);

				  $output = json_decode($output);
				   
				  curl_close($handle);
				   
				  echo "<pre>";
				  print_r($output);
				  echo "</pre>";
				  foreach($output->data as $mydata)
						{
							foreach($mydata->values as $values) {
								echo $values->value . "\n";
							}

						}   
				  ?>

            	<?php the_content(); ?>

            <?php endwhile; else: ?>

            	<div class="error"><?php _e('Not found.'); ?></div>

            <?php endif; ?>

        </div>
        <div class="clear"></div>
    </div>
</div><!-- EOF : content ID --> 
<?php get_footer(); ?>