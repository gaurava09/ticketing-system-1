<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Forgot Password | Tsubaki</title>
        
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
        <link href="<?php echo site_url(); ?>assets/dist-assets/css/themes/lite-purple.min.css" rel="stylesheet">
        <link href="<?php echo site_url(); ?>assets/css/style09.css" rel="stylesheet">


        <link href="<?php echo site_url(); ?>/assets/libs/ladda/ladda-themeless.min.css" rel="stylesheet" type="text/css" />
    </head>

<body>


<body>

<div class="sig_min registration_bg">

<div class="sig_col_right">
<div class="box_alg_center">    
    
<div class="p-4">
<div class="text-center mt-4 mb-4">
    <a href="<?php echo site_url('customer/login'); ?>">
    <img src="<?php echo base_url('assets/images/mahindra_tsubaki.png'); ?>" alt=""></a>
</div>
<div class="text-center">
<h1 class="mb-3 text-20"><strong>Forgot Password</strong></h1>
</div>



<?php echo form_open('customer/forgotpassword',array('id' => 'forgot_pass_form','autocomplete' => 'on') ); ?>

<div class="errors"></div>

<div class="form-group ">
    <label for="email">Email Id*</label>
    <input class="form-control form-control-rounded" id="email" type="email">
    <span class="error_email"></span>
</div>

 <div class="form-group mt-3">
    <div class="g-recaptcha" data-sitekey="<?php echo $RECAPTCHA_SITEKEY;?>"></div>
    <span class="gresp"></span>
</div>

<button class="ladda-button btn btn-rounded btn-primary btn-block mt-5" dir="ltr" data-style="slide-up" type="submit" id="forgot_pass">Submit </button>

</form>

<p class="success"></p>
</div>

</div>
<div class="clearfix"></div>
</div>
</div>    

<style type="text/css">
    .d-none{display: none;}
</style>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script src="<?php echo site_url(); ?>assets/dist-assets/js/plugins/jquery-3.3.1.min.js"></script>

<script src="<?php echo site_url(); ?>/assets/libs/ladda/spin.min.js"></script>
<script src="<?php echo site_url(); ?>/assets/libs/ladda/ladda.min.js"></script>

<script src="<?php echo site_url(); ?>/assets/custom.js"></script>

<script type="text/javascript">
    $('#forgot_pass').click(function(e){
        e.preventDefault();

        $token  = $('#forgot_pass_form [name=token]').val();
        $email = $('#email').val();
        $error = 0;

        if($email == ""){
            $('.error_email').html('Enter email id');
            $error = 1;
        }else if(!nilesh.validateEmail($email)){
            $('.error_email').html('Invalid email id');
             $error = 1;
        }else{
            $('.error_email').html('');
        }
        var g_resp = grecaptcha.getResponse();
        if(g_resp  == ""){
            $('.gresp').html('Invalid Captcha');
            $error = 1;
        }else{
            $('.gresp').html('');
        }

        if($error == 1){
            return false;
        }

        var postdata = {"email":$email,"token":$token,"captcha" : g_resp};

        $button = $(this);
        $button.addClass('process');
        var l = Ladda.create($(this)[0]);
        l.start();

        $('.errors').html('');
        $.ajax({
            type: 'post',
            url: $('#forgot_pass_form').attr('action'),
            data: postdata,

            success: function($res) {
                
                if($res.status == 1){
                   $('#email').val('');
                   $('#forgot_pass_form').hide();
                   $('.success').show().html('Password reset link is sent to your email id.');
                }
                else {
                    grecaptcha.reset();
                    $('.errors').html($res.message);
                }
  
                
                $button.removeClass('process');
                Ladda.stopAll();
            },
            error: function(error, textStatus, errorMessage) {
                $('.errors').html('Some error occured.');
                $button.removeClass('process');
                Ladda.stopAll();
            }             
        }); //end ajax
        
    });

</script>

</body>

</html>