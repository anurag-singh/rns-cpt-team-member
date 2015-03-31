<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    RNS_CPT_Contact
 * @subpackage RNS_CPT_Contact/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    RNS_CPT_Contact
 * @subpackage RNS_CPT_Contact/admin
 */
class RNS_CPT_Contact_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $rns_cpt_contact    The ID of this plugin.
	 */
	private $rns_cpt_contact;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $rns_cpt_contact       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $rns_cpt_contact, $version ) {

		$this->rns_cpt_contact = $rns_cpt_contact;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in RNS_CPT_Contact_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The RNS_CPT_Contact_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->rns_cpt_contact, plugin_dir_url( __FILE__ ) . 'css/rns-cpt-contact-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in RNS_CPT_Contact_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The RNS_CPT_Contact_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->rns_cpt_contact, plugin_dir_url( __FILE__ ) . 'js/rns-cpt-contact-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
   * Register custom post type 'rns_cpt_contact'
   *
   * @since    1.0.0
   */
	public function create_rns_cpt_contact() {
    register_post_type( 'team_member',
        array(
            'labels' => array(
                'name' => __( 'Team Members', $this->rns_cpt_contact ),
                'singular_name' => __( 'Team Member', $this->rns_cpt_contact ),
                'menu_name' => __( 'Team Members', $this->rns_cpt_contact ),
                'name_admin_bar' => __( 'Team Members', $this->rns_cpt_contact ),
                'add_new' => __( 'Add New', $this->rns_cpt_contact ),
                'add_new_item' => __( 'Add New Team Member', $this->rns_cpt_contact ),
                'edit_item' => __( 'Edit Team Member', $this->rns_cpt_contact ),
                'new_item' => __( 'New Team Member', $this->rns_cpt_contact ),
                'view_item' => __( 'View Team Member', $this->rns_cpt_contact ),
                'search_item' => __( 'Search Team Members', $this->rns_cpt_contact ),
                'not_found' => __( 'No products found', $this->rns_cpt_contact ),
                'not_found_in_trash' => __( 'No products found in trash', $this->rns_cpt_contact ),
                'all_items' => __( 'All Team Members', $this->rns_cpt_contact ),
            ),
            
            // Frontend
		        'has_archive'        => false,
		        'public'             => false,
		        'publicly_queryable' => false,
		         
		        // Admin
		        'capability_type' => 'post',
		        'menu_icon'     => 'dashicons-groups',
		        'menu_position' => 10,
		        'query_var'     => true,
		        'show_in_menu'  => true,
		        'show_ui'       => true,
		        'supports'    => array('thumbnail')
		        //'supports'        => false
		        //'supports'    => array( 'title', 'editor', 'custom-fields', 'thumbnail')
        )
    );
	}

	/**
	 * Add meta box for CPT 'rns_cpt_contact'
	 *
	 * @since    1.0.0
	 */
	public function create_meta_box_for_rns_cpt_contact() { 
    $screens =  array('rns_cpt_contact');

	    foreach ($screens as $screen) {
	      add_meta_box( 
	        'meta_box_container', 
	        __("Team Member's Details", $this->rns_cpt_contact ), 
	        array( $this, 'render_metabox_data_for_rns_cpt_contact' ), 
	        $screen, 
	        'advanced', 
	        'core' 
	      );
	    }
  	}


	/**
	 * Save meta box data
	 *
	 * @since    1.0.0
	 *
	 * function called on save_post hook to sanitize and save the data
	 */ 
	public function render_metabox_data_for_rns_cpt_contact( $post ){
		wp_nonce_field( basename( __FILE__ ), 'prfx_nonce' );    
	    $member_designation = get_post_meta( $post->ID );
	    $member_intro = get_post_meta( $post->ID );
	    $member_fb_profile = get_post_meta( $post->ID );
	    $member_tw_profile = get_post_meta( $post->ID );
	    $member_gplus_profile = get_post_meta( $post->ID );
    
    include_once( 'partials/rns-cpt-contact-admin-display.php' );
	}

	/**
	 * Display meta box for CPT 'rns_cpt_contact'
	 *
	 * @since    1.0.0
	 */
	public function save_metabox_data_for_rns_cpt_contact( $post_id ) {
		// Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'prfx_nonce' ] ) && wp_verify_nonce( $_POST[ 'prfx_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';
 
    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }

    if( isset( $_POST[ 'member_desig' ] ) ) {
        update_post_meta( $post_id, 'rns_member_designation', sanitize_text_field( $_POST[ 'member_desig' ] ) );
    }

    if( isset( $_POST[ 'member_intro' ] ) ) {
        update_post_meta( $post_id, 'rns_member_intro', sanitize_text_field( $_POST[ 'member_intro' ] ) );
    }

    if( isset( $_POST[ 'fb' ] ) ) {
        update_post_meta( $post_id, 'rns_member_fb_profile', sanitize_text_field( $_POST[ 'fb' ] ) );
    }

    if( isset( $_POST[ 'tw' ] ) ) {
        update_post_meta( $post_id, 'rns_member_tw_profile', sanitize_text_field( $_POST[ 'tw' ] ) );
    }

    if( isset( $_POST[ 'gplus' ] ) ) {
        update_post_meta( $post_id, 'rns_member_gplus_profile', sanitize_text_field( $_POST[ 'gplus' ] ) );
    }

 	}

 	function my_remove_post_type_support()
	{ 
	  remove_post_type_support('page', 'comments');
	}

}
