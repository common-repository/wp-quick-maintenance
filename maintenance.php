<?php  
$options = get_option('wp_quick_maintenance');
if(!empty($options )){

extract($options);

};

$title = !empty($title) ? $title :'Maintenance mode';

$description = get_bloginfo('name') . ' - ' . get_bloginfo('description');

$keywords = __('Maintenance Mode');

$meta_tag=array( 'index, follow','index, nofollow', 'noindex, follow', 'noindex, nofollow');

if(!empty($background)){

$bgimage=$background;

} else {

$bgimage= plugins_url('assets/img/main-bg-compressor.jpg',__FILE__);	

}



if(!empty($logo))

{

$logo_src=$logo;	

}

else

{

$logo_src= plugins_url('assets/img/WP-Quick-Maintenance-Logo.png',__FILE__);		

}





if(!empty($favicon))

{

$favicon_src=$favicon;	

}

else

{

$favicon_src= plugins_url('assets/img/favicon.png',__FILE__);		

}









?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="author" content="<?php echo 'Mudit Kumawat' ?>" />
<meta name="description" content="<?php echo esc_attr($description); ?>" />
<meta name="keywords" content="<?php echo esc_attr($keywords); ?>" />
<meta name="robots" content="<?php echo esc_attr($meta_tag[$robots_meta]); ?>" />
<meta name="viewport" content="width=device-width; maximum-scale=1; minimum-scale=1;" />
<title><?php echo $title ?></title>
<!-- Bootstrap -->
<link rel="shortcut icon" href="<?php echo $favicon_src; ?>">
<link href="<?php echo plugins_url('assets/css/bootstrap.css',__FILE__); ?>" rel="stylesheet">
<link href="<?php echo plugins_url('assets/css/font-awesome.css',__FILE__); ?>" rel="stylesheet">
<link href="<?php echo plugins_url('assets/css/bootstrap-theme.css',__FILE__); ?>" rel="stylesheet">
<link rel="stylesheet" href="<?php echo plugins_url('assets/css/animations.css',__FILE__); ?>">
<!-- siimple style -->
<link href="<?php echo plugins_url('assets/css/style.css',__FILE__); ?>" rel="stylesheet">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->
<style>
body, a, #wrapper .heading, #wrapper .subtitle, p.copyright {
color:<?php echo $text_color;
?>
}
body {
	background: url("<?php echo $bgimage; ?>") no-repeat center top fixed;
	background-size: cover;
	-webkit-background-size: cover;
	-moz-background-size: cover;
	-o-background-size: cover;
}
.social-circle i {
color:<?php echo $icon_color; ?>
}
<?php if(!empty($cloud)): ?> .cloud{display:none}<?php endif; ?>
</style>
</head>

<body>
<div class="cloud floating"> <img src="<?php echo plugins_url('assets/img/cloud.png',__FILE__); ?>" alt="WP Quick Maintenance"> </div>
<div class="cloud pos1 fliped floating"> <img src="<?php echo plugins_url('assets/img/cloud.png',__FILE__); ?>" alt="WP Quick Maintenance"> </div>
<div class="cloud pos2 floating"> <img src="<?php echo plugins_url('assets/img/cloud.png',__FILE__); ?>" alt="WP Quick Maintenance"> </div>
<div class="cloud pos3 fliped floating"> <img src="<?php echo plugins_url('assets/img/cloud.png',__FILE__); ?>" alt="WP Quick Maintenance"> </div>
<div id="wrapper">
   <div class="container">
      <div class="row">
         <div class="col-sm-12 col-md-12 col-lg-12"> <img src="<?php echo $logo_src; ?>" alt="WP Quick Maintenance Logo">
            <?php if(!empty($heading)): ?>
            <h1 class="heading"> <?php echo $heading; ?></h1>
            <?php endif; ?>
            <?php if(!empty($message)): ?>
            <h2 class="subtitle"> <?php echo $message; ?></h2>
            <?php endif; ?>
            <?php if(!empty($enable_contact)): ?>
            <button id="contact-us" class="btn btn-theme">Contact Us</button>
            <section id="contact"> <span class="button b-close"><span>X</span></span>
               <h3>Contact Me</h3>
               <form id="contact-form">
                  <div class="field name-box">
                     <input type="text" placeholder="Who Are You?" id="name"  name="name">
                     <label class="msg" for="name">Name</label>
                  </div>
                  <div class="field email-box">
                     <input type="text" placeholder="name@email.com" id="email"  name="email">
                     <label class="msg" for="email">Email</label>
                  </div>
                  <div class="field msg-box">
                     <textarea placeholder="Your message goes here..." rows="4" id="msg"  name="msg"></textarea>
                     <label class="msg" for="msg">Msg</label>
                  </div>
                  <input type="submit" value="Send" class="button" id="submit">
               </form>
               <div class="response"> <span class="error" style="display:none">Message Not Send Please try again.</span> <span class="success" style="display:none">Message Send Successfully.</span> </div>
            </section>
            <?php endif; ?>
         </div>
      </div>
      <?php if($social==1) : ?>
      <div class="row">
         <div class="col-sm-12 align-center">
            <ul class="social-network social-circle">
               <?php if(!empty($facebook)) : ?>
               <li><a href="<?php echo $facebook; ?>" class="icoFacebook" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
               <?php  endif;?>
               <?php if(!empty($twitter)) : ?>
               <li><a href="<?php echo $twitter; ?>" class="icoTwitter" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a></li>
               <?php  endif;?>
               <?php if(!empty($googleplus)) : ?>
               <li><a href="<?php echo $googleplus; ?>" class="icoGoogle" title="Google" target="_blank"><i class="fa fa-google-plus"></i></a></li>
               <?php  endif;?>
               <?php if(!empty($youtube)) : ?>
               <li><a href="<?php echo $youtube; ?>" class="icoYoutube" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
               <?php  endif;?>
               <?php if(!empty($instagram)) : ?>
               <li><a href="<?php echo $instagram; ?>" class="icoInstagram" title="instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
               <?php  endif;?>
               <?php if(!empty($linkedin)) : ?>
               <li><a href="<?php echo $linkedin; ?>" class="icoLinkedin" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a></li>
               <?php  endif;?>
               <?php if(!empty($yelp)) : ?>
               <li><a href="<?php echo $yelp; ?>" class="icoPinterest" title="pinterest" target="_blank"><i class="fa fa-pinterest"></i></a></li>
               <?php  endif;?>
            </ul>
         </div>
      </div>
      <?php endif; ?>
      <div class="row">
         <div class="col-lg-6 col-lg-offset-3">
            <p class="copyright">Copyright &copy; 2015 - <a href="<?php bloginfo('url') ?>"><?php echo $bloginfo = get_bloginfo( 'name' ); ?></a> </p>
         </div>
      </div>
   </div>
</div>
<?php wp_enqueue_script('jquery'); ?>
<script src="<?php echo includes_url(); ?>js/jquery/jquery.js"></script> 
<script type='text/javascript'>
            var wpqm_ajax = {"ajaxurl": "<?php echo admin_url('admin-ajax.php'); ?>"};
        </script> 
<script src="<?php echo plugins_url('assets/js/jquery.validate.js',__FILE__); ?>"></script> 
<script src="<?php echo plugins_url('assets/js/jquery.bpopup.min.js',__FILE__); ?>"></script> 
<script src="<?php echo plugins_url('assets/js/custom.js',__FILE__); ?>"></script>
</body>
</html>
