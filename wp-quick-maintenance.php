<?php /* 
Plugin Name: WP Quick Maintenance
Plugin URI: http://www.help4cms.com/ 
Version: 0.1 
Author: Mudit Kumawat 
Author URI: http://www.help4cms.com/ 
Description: WP Quick Maintenance Plugin will help you easily enable maintenance mode on your site or  add a coming soon page for a new website.  
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
$options = get_option('wp_quick_maintenance');
if(!empty($options )){
extract($options);
};

add_action('wp_loaded', function() {
 global $pagenow, $enable;
if($enable==1):
    if( $pagenow !== 'wp-login.php' && ! is_user_logged_in() && !is_admin()) {
       header('HTTP/1.1 Service Unavailable', true, 503);
       header('Content-Type: text/html; charset=utf-8');
       if ( file_exists(plugin_dir_path( __FILE__ ).'/maintenance.php') ) {
          require_once( 'maintenance.php' );
       }
       die();
    }
	endif;
});



class wp_quick_maintenance_Admin {

    /**
     * Option key, and option page slug
     * @var string
     */
    private $key = 'wp_quick_maintenance';

    /**
     * Array of metaboxes/fields
     * @var array
     */
    protected $option_metabox = array();

    /**
     * Options Page title
     * @var string
     */
    protected $title = '';

    /**
     * Options Page hook
     * @var string
     */
    protected $options_page = '';

    /**
     * Constructor
     * @since 0.1.0
     */
    public function __construct() {
		
		
$menus = get_terms('nav_menu',array('hide_empty'=>false));
$menu = array();
foreach( $menus as $m ) {
$menu[$m->name] = $m->name;
	}
		
        // Set our title
        $this->title = __( 'WP Quick Maintenance', 'WP Quick Maintenance' );

        // Set our WP Quick Maintenance Admin Fields
        $this->fields = array(
		array(
    'name'    => 'Enable Maintenance Mode',
    'desc'    => 'Select here YES OR NO',
    'id'      => 'enable',
    'type'    => 'select',
    'options' => array(
        '1' => __( 'Yes', 'WPQuickMaintenance' ),
        '0'   => __( 'No', 'WPQuickMaintenance' ),

    ),
    'default' => '0',
),


		array(
    'name'    => 'Robots Meta Tag',
    'desc'    => 'The robots meta tag lets you utilize a granular, page-specific approach to controlling how an individual page should be indexed and served to users in search results.',
    'id'      => 'robots_meta',
    'type'    => 'select',
    'options' => array(
	 '1' => __( 'index, follow', 'WPQuickMaintenance' ),
      '2' => __( 'index, nofollow', 'WPQuickMaintenance' ),
      '3'   => __( 'noindex, follow', 'WPQuickMaintenance' ),
       '4'   => __( 'noindex, nofollow', 'WPQuickMaintenance' ),
    ),
    'default' => '1',
),


array(
    'name' => 'Logo >>',
    'desc' => '',
    'type' => 'title',
    'id' =>'logo_title'
),

array(
    'name' => 'Upload Logo',
    'desc' => '',
    'id' => 'logo',
    'type' => 'file',
    // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
),

array(
    'name' => 'Upload Favicon Icon',
    'desc' => '',
    'id' => 'favicon',
    'type' => 'file',
    // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
),

array(
    'name' => 'Content >>',
    'desc' => '',
    'type' => 'title',
    'id' =>'content'
),

array(
   'name' => 'Title (For HTML Tag)',
   'desc' => '',
   'id' => 'title',
   'type' => 'text_medium',
   		'default' =>'Maintenance'
   
),

array(
    'name' => 'Heading',
    'desc' => '',
     'id' => 'heading',
    'type' => 'text_medium',
		'default' =>'Maintenance'
),

array(
    'name' => 'Message',
    'desc' => '',
    'id' => 'message',
    'type' => 'wysiwyg',
    'options' => array(),
	'default' =>'<p>We are currently doing some <br /> enhancement to our site. Stay tuned!</p>'
),

array(
    'name' => 'Design >>',
    'desc' => '',
    'type' => 'title',
    'id' =>'design_title'
),

array(
    'name' => 'Text Color',
    'id'   => 'text_color',
    'type' => 'colorpicker',
    'default'  => '#ffffff',
   
),

array(
    'name' => 'Social Icon Color',
    'id'   => 'icon_color',
    'type' => 'colorpicker',
    'default'  => '#ffffff',
   
),

array(
    'name' => 'Background Image',
    'desc' => '',
    'id' => 'background',
    'type' => 'file',
    // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
),


array(
    'name'    => 'Hide Cloud ?',
    'desc'    => 'Select here YES OR NO For Hide Colud',
    'id'      => 'cloud',
    'type'    => 'select',
    'options' => array(
        '1' => __( 'Yes', 'WPQuickMaintenance' ),
        '0'   => __( 'No', 'WPQuickMaintenance' ),

    ),
    'default' => '0',
),

array(
    'name' => 'Social Media >>',
    'desc' => '',
    'type' => 'title',
    'id' =>'social_title'
),

		array(
    'name'    => 'Show Social Media ?',
    'desc'    => 'Select here YES OR NO',
    'id'      => 'social',
    'type'    => 'select',
    'options' => array(
        '1' => __( 'Yes', 'WPQuickMaintenance' ),
        '0'   => __( 'No', 'WPQuickMaintenance' ),

    ),
    'default' => '0',
),

array(
    'name' => 'Facebook',
    'desc' => 'Add Here Facebook URL',
    'default' => '',
    'id' => 'facebook',
    'type' => 'text_medium'
),


array(
    'name' => 'Twitter',
    'desc' => 'Add Here Twitter URL',
    'default' => '',
    'id' => 'twitter',
    'type' => 'text_medium'
),


array(
    'name' => 'Google+',
    'desc' => 'Add Here google+ URL',
    'default' => '',
    'id' => 'googleplus',
    'type' => 'text_medium'
),

array(
    'name' => 'Youtube',
    'desc' => 'Add Here Youtube URL',
    'default' => '',
    'id' => 'youtube',
    'type' => 'text_medium'
),

array(
    'name' => 'Instagram',
    'desc' => 'Add Here Instagram URL',
    'default' => '',
    'id' => 'instagram',
    'type' => 'text_medium'
),

array(
    'name' => 'Linkedin',
    'desc' => 'Add Here Linkedin URL',
    'default' => '',
    'id' => 'linkedin',
    'type' => 'text_medium'
),

array(
    'name' => 'Pinterest',
    'desc' => 'Add Here Pinterest URL',
    'default' => '',
    'id' => 'pinterest',
    'type' => 'text_medium'
),

array(
    'name' => 'Contact >>',
    'desc' => '',
    'type' => 'title',
    'id' =>'contact_title'
),

array(
    'name'    => 'Show Contact Form ?',
    'desc'    => 'Select here YES OR NO',
    'id'      => 'enable_contact',
    'type'    => 'select',
    'options' => array(
        '1' => __( 'Yes', 'WPQuickMaintenance' ),
        '0'   => __( 'No', 'WPQuickMaintenance' ),

    ),
    'default' => '0',
),
	
array(
    'name' => 'Email address',
    'desc' => 'Add Here email Address For Get email From Contact Form',
    'default' => '',
    'id' => 'email',
    'type' => 'text_medium'
),		
		
		);
    }

    /**
     * Initiate our hooks
     * @since 0.1.0
     */
    public function hooks() {
        add_action( 'admin_init', array( $this, 'init' ) );
        add_action( 'admin_menu', array( $this, 'add_options_page' ) );
    }

    /**
     * Register our setting to WP
     * @since  0.1.0
     */
    public function init() {
        register_setting( $this->key, $this->key );
    }

    /**
     * Add menu options page
     * @since 0.1.0
     */
    public function add_options_page() {
        $this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' )  ,'dashicons-nametag');
    }


    public function admin_page_display() {
        ?>

<div class="wrap wp_quick_maintenance_page <?php echo $this->key; ?>">
  <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
  <?php cmb_metabox_form( $this->option_metabox(), $this->key ); ?>
</div>
<?php
    }


    public function option_metabox() {
        return array(
            'id'         => 'option_metabox',
            'show_on'    => array( 'key' => 'options-page', 'value' => array( $this->key, ), ),
            'show_names' => true,
            'fields'     => $this->fields,
        );
    }

 
    public function __get( $field ) {

// Allowed fields to retrieve
        if ( in_array( $field, array( 'key', 'fields', 'title', 'options_page' ), true ) ) {
            return $this->{$field};
        }
        if ( 'option_metabox' === $field ) {
            return $this->option_metabox();
        }

        throw new Exception( 'Invalid property: ' . $field );
    }

}

// Get it started
$wp_quick_maintenance_Admin = new wp_quick_maintenance_Admin();
$wp_quick_maintenance_Admin->hooks();


function wp_quick_maintenance_get_option( $key = '' ) {
    global $wp_quick_maintenance_Admin;
    return cmb_get_option( $wp_quick_maintenance_Admin->key, $key );
}




// Initialize the metabox class
add_action( 'init', 'wp_quick_maintenance_meta_boxes', 9999 );
function wp_quick_maintenance_meta_boxes() {
    if ( !class_exists( 'cmb_Meta_Box' ) ) {
        require_once( 'metabox/init.php' );
    }
}



//wp_localize_script( 'wpqm_ajax_url', 'wpqm_ajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php')));
function wqm_send_mail_to_admin(){
global $email;
$name=sanitize_text_field($_POST['name']);
$user_email=sanitize_text_field($_POST['email']);
$msg=sanitize_text_field($_POST['msg']);


$to = !empty($email) ? stripslashes($email) : get_option('admin_email');
$subject = "Mail From WP Quick Maintenance (".get_bloginfo( 'name').") ";
$message = '<html><body>';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . $name . "</td></tr>";
			$message .= "<tr><td><strong>Email:</strong> </td><td>" . $user_email . "</td></tr>";
			$message .= "<tr><td><strong>Message:</strong> </td><td>" . $msg . "</td></tr>";
			$message .= "</table>";
			$message .= "</body></html>";
			

// Always set content-type when sending HTML email
$headers[] = 'From: '.$name.' <'.$user_email.'>';
$headers[]= "MIME-Version: 1.0" . "\r\n";
$headers[]= "Content-type:text/html;charset=UTF-8" . "\r\n";
@wp_mail($to,$subject,$message,$headers);
die();
return true;
}
add_action('wp_ajax_wqm_send_mail_to_admin', 'wqm_send_mail_to_admin');
add_action('wp_ajax_nopriv_wqm_send_mail_to_admin', 'wqm_send_mail_to_admin');

