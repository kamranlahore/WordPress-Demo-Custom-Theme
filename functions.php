<?php
 
if ( ! function_exists( 'nonnalina_setup' ) ) :
function nonnalina_setup() {
 

    add_theme_support( 'title-tag' );

    add_theme_support( 'post-thumbnails' );
    // Woocommerce
    add_theme_support( 'woocommerce' );

 
    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'nonnalina' ),
        'secondary' => __('Secondary Menu', 'nonnalina' )
    ) );
 
}
endif; // 
add_action( 'after_setup_theme', 'nonnalina_setup' );

// Define Widgets 
function nonnalina_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Widget Area', 'nonnalina' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
         'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'nonnalina_widgets_init' );

// Translate Text 
function translate_text($fr, $en){
    if(pll_current_language() == 'fr'){
        return $fr;
    }else{
        return $en;
    }

}
/*Poly Lang Functions*/
//Add new string stranslation
    //My Account - Login Page
    
    // pll_register_string('MyAccount_login', 'Login', 'true');
    // pll_register_string('MyAccount_Register', 'Register', 'true');
    // pll_register_string('MyAccount_Username_email_address', 'Username or email address', 'true');
    // pll_register_string('MyAccount_Password', 'Password', 'true');
    // pll_register_string('MyAccount_Remember', 'Remember me', 'true');
    // pll_register_string('MyAccount_Lost_your_password', 'Lost your password', 'true');
    // pll_register_string('MyAccount_Username', 'Username', 'true');
    // pll_register_string('MyAccount_email_address', 'Email address', 'true');
    // pll_register_string('MyAccount_password_sent', 'A password will be sent to your email address.', 'true');
    /*
    //For Print
    pll_e('Login', 'MyAccount_login')
    pll_e('Register', 'MyAccount_Register')
    pll_e('Username or email address', 'MyAccount_Username_email_address')
    pll_e('Password', 'MyAccount_Password')
    pll_e('Remember me', 'MyAccount_Remember')
    pll_e('Login', 'MyAccount_Lost_your_password')
    pll_e('Lost your password', 'MyAccount_Lost_your_password')
    pll_e('Username', 'MyAccount_Username')
    pll_e('Email address', 'MyAccount_email_address')
    pll_e('A password will be sent to your email address.', 'MyAccount_password_sent')
    */

    
    // Cart page
    //  pll_register_string('Cart_Sub_Total', 'Login', 'true');


// WooCommerce Functions
// Remove Breadcrumbs
add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}
// Remove the additional information tab
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    //unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['reviews'] ); 			// Remove the reviews tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}

//Remove Related products from the detail page
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

//Remove Product Category from the product detail page under price
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

//Single Page - Single Variation price moved after add to cart button 
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
add_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 20 );

//Single page - Add Quantity Label
add_action( 'woocommerce_before_add_to_cart_button', 'echo_qty_front_add_cart' );
function echo_qty_front_add_cart() {
echo '<div class="qty">Quantité: </div>';
}


//After logged in redirect to Order password_get_infofunction ts_redirect_login( $redirect, $user ) {
function vit_login_redirect( ) {
    $order_page = get_permalink(translate_text(24, 16)).'orders/';
    return $order_page;
}
 
add_filter( 'woocommerce_login_redirect', 'vit_login_redirect' );

//Redirect after Logout 
add_action('wp_logout','logout_redirect');

function logout_redirect(){

    wp_redirect( home_url() );
    
    exit;

}


//Remove Dashboard link from my account
function vit_my_account_menu_items( $items ) {
    unset($items['dashboard']);
    return $items;
}
add_filter( 'woocommerce_account_menu_items', 'vit_my_account_menu_items' );

// Remove Choose an Option wordwrap

add_filter( 'woocommerce_dropdown_variation_attribute_options_args', 'wc_remove_options_text');
function wc_remove_options_text( $args ){
    $args['show_option_none'] = translate_text('Choisir','Choose');
    return $args;
}

//Remove reset variation button/link
add_filter('woocommerce_reset_variations_link', '__return_empty_string');

// Change Add to Cart button textdomain
add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text');
 
function woo_custom_cart_button_text() {
return __(translate_text('Acheter', 'Buy'), 'woocommerce');
}

// Add confirm password field into the Registratio page
// Add the code below to your theme's functions.php file to add a confirm password field on the register form under My Accounts.
add_filter('woocommerce_registration_errors', 'registration_errors_validation', 10,3);
function registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
	global $woocommerce;
	extract( $_POST );
	if ( strcmp( $password, $password2 ) !== 0 ) {
		return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );
	}
	return $reg_errors;
}

add_action( 'woocommerce_register_form', 'wc_register_form_password_repeat' );
function wc_register_form_password_repeat() {
	?>
	<p class="form-row form-row-wide">
		<label for="reg_password2"><?php _e( translate_text('Répéter le mot de passe', 'Password Repeat'), 'woocommerce' ); ?> <span class="required">*</span></label>
		<input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
	</p>
	<?php
}

add_action( 'woocommerce_register_form_start', 'woocom_extra_register_fields' );

function woocom_extra_register_fields() {?>

    <p class="form-row form-row-wide">
    
    <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label><input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" /></p>
    
    <p class="form-row form-row-wide">
    
    <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label><input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" /></p>
    
    <?php
    
    }
    

    add_action('woocommerce_register_post', 'woocom_validate_extra_register_fields', 10, 3);
    function woocom_validate_extra_register_fields( $username, $email, $validation_errors )
    {
    
    if (isset($_POST['billing_first_name']) && empty($_POST['billing_first_name']) ) {
    
    $validation_errors->add('billing_first_name_error', __('First Name is required!', 'woocommerce'));
    
    }
    
    if (isset($_POST['billing_last_name']) && empty($_POST['billing_last_name']) ) {
    
    $validation_errors->add('billing_last_name_error', __('Last Name is required!', 'woocommerce'));
    
    }
    
    return $validation_errors;
    
    }
    


//Body Class for Page Slug
function add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

