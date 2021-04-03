<?php
/* contact form Short code start */

function con_form_shortcode() {
    //require(__DIR__ . '/wp-load.php');

    if(isset($_POST['submitted'])) {

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone_number = $_POST['phone_number'];
        $email = trim($_POST['email']);
        $description = trim($_POST['description']);
        if( $fname == "" || $lname == "" || $phone_number == "" || $email == "" || $description == "") {

            $error ='Please add all required fields.';
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Invalid email address.';
        }

        else {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $phone_number = $_POST['phone_number'];
            $email = trim($_POST['email']);
            $description = trim($_POST['description']);
            $emailTo = 'christophe@imaginelabs.me';
            $from = 'info@mydemoserver.site';

            $subject = 'Imagine Labs - Contact From';
            $body = "First Name:" .$fname." \n\n Last Name:". $lname ."\n\n Phone Number: ".$phone_number." \n\n Email: ".$email." \n\n Description: ".$description ;
            $headers = 'From: <'.$from.'>' . "\r\n" . 'Reply-To: ' . $email;
            $sent = wp_mail($emailTo, $subject, $body, $headers);

            if($sent){
                $emailSent = '<div class="form-success">Your request has been submitted successfully.</div>';
            }else{
                $emailSent = '<div class="form-error">There is a error for sending request.</div>';
            }


        }
    }
 ?>
  <div class="form-section contact-form" >
    <?php echo $emailSent; ?>
    <form action="<?php echo get_the_permalink(); ?>" id="contactForm" method="post">
    <?php if(isset($error)){echo '<div class="form-error">'.$error.'</div>';}?>

        <label for="fname">First Name:</label>
        <input type="text" name="fname" id="fname" class="text" placeholder="First Name" value="" /><?php if($nameError != '') { ?> <span class="error"> <?php echo $nameError ?></span><?php } ?>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" id="lname" class="text" placeholder="Last Name" value="" /><?php if($lastnameError != '') { ?> <span class="error"> <?php echo $lastnameError ?></span><?php } ?>
        <label for="phone_number">Phone Number :</label>
        <input type="text" name="phone_number" class="text" placeholder="Phone Number" id="phone_number" value="" /><?php if($phone_numberError != '') { ?> <span class="error"> <?php echo $phone_numberError ?></span><?php } ?>
        <label for="email">Email Address :</label>
        <input type="text" name="email" id="email" class="text" placeholder="Email Address" value="" /><?php if($emailError != '') { ?> <span class="error"> <?php echo $emailError ?></span><?php } ?>
        <label for="description">Description : </label>
        <textarea name="description" id="description"  class="text" placeholder="Description" rows="3" cols="20"></textarea><?php if($descriptionError != '') { ?> <span class="error"> <?php echo $descriptionError ?></span><?php } ?>
        <!-- <button type="submit">Send email</button> -->
        <input type="submit" name="submitted" id="submitted" value="Submit" />
    </form>
    </div>
<?php }
add_shortcode('con_form', 'con_form_shortcode');

/* contact form Short code End */

