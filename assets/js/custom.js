jQuery(document).ready( function ($) {

	

	      $('#contact-us').bind('click', function(e) {



                // Prevents the default action to be triggered. 

                e.preventDefault();



                // Triggering bPopup when click event is fired

                $('#contact').bPopup();



            });

	

$('#contact .name-box  #name').blur(function () {

  $this = $(this);

        if ( this.value != '' ) {

        jQuery('#contact .name-box').addClass('focused');

          $('.field:first-child input .msg').css({'opacity': 1});

        }

        else {

            jQuery('#contact .name-box').removeClass('focused');

          $('.field:first-child input .msg').css({'opacity': 0});

        }



});



$('#contact .email-box  #email').blur(function () {

  

        $this = $(this);

        if ( this.value != '' ) {

        jQuery('#contact .email-box').addClass('focused');

          $('.field:first-child input .msg').css({'opacity': 1});

        }

        else {

            jQuery('#contact .email-box').removeClass('focused');

          $('.field:first-child input .msg').css({'opacity': 0});

        }



});





$('#contact .msg-box  #msg').blur(function () {
$this = $(this);
 if ( this.value != '' ) {
        jQuery('#contact .msg-box').addClass('focused');

         $('.field:first-child input .msg').css({'opacity': 1 });
	     $(this).css( { 'height' : '150px '});

        }

        else {

            jQuery('#contact .msg-box').removeClass('focused');

          $('.field:first-child input .msg').css({'opacity': 0});

        }



});



$("#contact-form").validate({
	submitHandler: function(form) {
var formData =  'action=wqm_send_mail_to_admin&' + $("form").serialize();
jQuery.ajax({
type: 'POST',
url: wpqm_ajax.ajaxurl,
data: formData,
success: function(data){
$('.response .success').fadeIn('slow');
   //  $('#contact').bPopup();
//var bPopup = $('#contact').bPopup();
//bPopup.close();
setTimeout(function(){ $('#contact').bPopup().close(); } ,3500 );
 $("#contact-form")[0].reset();
},
    error: function(){
    //   alert('request failed');
    $('.response .error').fadeIn('slow');
    }

});
//});

	
	},

rules: {

				name: "required",

				msg: "required",

				email: {

				required: true,

					email: true

				}

		},

		name: "Please enter your Name",

		msg: "Please enter your Message",

		email: "Please enter a valid email address",

});
		
     	
	
	});

