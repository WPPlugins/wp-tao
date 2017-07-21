<?php

/**
 * WP TAO Settings API data
 *
 * @package     WPTAO/Admin
 * @category    Admin
 */
if ( !class_exists( 'WTBP_WPTAO_Core_Settings' ) ) {

	class WTBP_WPTAO_Core_Settings {
		/*
		 * @var string
		 * Unique settings slug
		 */

		private $setting_slug = WTBP_WPTAO_SETTINGS_SLUG;

		/*
		 * @var object
		 * Settings API object
		 */
		public $settings_api;

		/**
		 * WTBP_WPTAO_Core_Settings Constructor.
		 */
		public function __construct() {
			global $wptao_settings;

			// Set global variable with settings
			$settings = get_option( $this->setting_slug );
			if ( !isset( $settings ) || empty( $settings ) ) {
				$wptao_settings = array();
			} else {
				$wptao_settings = $settings;
			}

			$this->settings_api = new WTBP_WPTAO_Settings_API( $this->setting_slug );

			add_action( 'admin_init', array( $this, 'settings_init' ) );
		}

		/*
		 * Set sections and fields
		 */

		public function settings_init() {

			//Set the settings
			$this->settings_api->set_sections( $this->settings_sections() );
			$this->settings_api->set_fields( $this->settings_fields() );

			//Initialize settings
			$this->settings_api->settings_init();
		}

		/*
		 * Set settings sections
		 * 
		 * @return array settings sections
		 */

		public function settings_sections() {
			$sections = array(
				array(
					'id'	 => 'wptao_general',
					'title'	 => __( 'General', WTBP_WPTAO_DOMAIN )
				),
				array(
					'id'	 => 'wptao_maintenance',
					'title'	 => __( 'Maintenance', WTBP_WPTAO_DOMAIN )
				),
				array(
					'id'	 => 'wptao_extensions',
					'title'	 => __( 'Extensions', WTBP_WPTAO_DOMAIN )
				),
			);
			return apply_filters( 'wptao_settings_sections', $sections );
		}

		/**
		 * Create settings fields
		 *
		 * @return array settings fields
		 */
		function settings_fields() {
			$settings_fields = array(
				'wptao_general'		 => apply_filters( 'wptao_general_settings', array(
					array(
						'name'		 => 'currency',
						'label'		 => __( 'Currency', WTBP_WPTAO_DOMAIN ),
						'desc'		 => __( 'Select the currency you use for sale.', WTBP_WPTAO_DOMAIN ),
						'type'		 => 'select',
						'default'	 => 'EUR',
						'options'	 => WTBP_WPTAO_Helpers::get_currencies()
					),
					array(
						'name'		 => 'notice_email',
						'label'		 => __( 'Notice email', WTBP_WPTAO_DOMAIN ),
						'desc'		 => __( 'Set the email for notifications from WP Tao.', WTBP_WPTAO_DOMAIN ),
						'type'		 => 'text',
						'default'	 => ''
					),
					array(
						'name'		 => 'excluded_roles',
						'label'		 => __( 'Do not track users with specific roles', WTBP_WPTAO_DOMAIN ),
						'type'		 => 'multicheck',
						'default'	 => '',
						'options'	 => WTBP_WPTAO_Helpers::get_users_roles()
					),
					array(
						'name'		 => 'uninstall_wipe',
						'label'		 => __( 'Wipe data when uninstalling', WTBP_WPTAO_DOMAIN ),
						'desc'		 => __( 'Checking this option will delete all events and users when uninstalling the plugin via Installed plugins &#8594; WP Tao &#8594; Delete', WTBP_WPTAO_DOMAIN ),
						'type'		 => 'checkbox',
						'default'	 => ''
					),
					array(
						'name'		 => 'exclude_blacklist',
						'label'		 => __( 'Exclude blacklist', WTBP_WPTAO_DOMAIN ),
						'desc'		 => __( 'Check this box if you would like to exclude blacklisted users from the user list', WTBP_WPTAO_DOMAIN ),
						'type'		 => 'checkbox',
						'default'	 => ''
					)
				) ),
				'wptao_maintenance'	 => apply_filters( 'wptao_maintenance_settings', array(
					array(
						'name'	 => 'db_header',
						'label'	 => __( '<h2>Database</h2>', WTBP_WPTAO_DOMAIN ),
						'type'	 => 'html'
					),
					array(
						'name'	 => 'db_size',
						'label'	 => __( 'WP Tao database size', WTBP_WPTAO_DOMAIN ),
						'desc'	 => WTBP_WPTAO_Helpers::get_db_size( 'formatted' ),
						'type'	 => 'html'
					),
					array(
						'name'		 => 'db_limited_events',
						'label'		 => __( 'Events with limited storage time', WTBP_WPTAO_DOMAIN ),
						'desc'		 => __( 'Select which events will have <b>limited</b> storage time. Unselected items will be stored for unlimited time.', WTBP_WPTAO_DOMAIN ),
						'type'		 => 'multicheck',
						'options'	 => WTBP_WPTAO_Helpers::get_event_action_options()
					),
					array(
						'name'		 => 'db_storage_time',
						'label'		 => __( 'Storage time for selected events', WTBP_WPTAO_DOMAIN ),
						'desc'		 => __( 'How long keep selected events in the database?', WTBP_WPTAO_DOMAIN ),
						'type'		 => 'select',
						'default'	 => '90',
						'options'	 => WTBP_WPTAO_Helpers::get_storage_time_options()
					)
				) )
			);


			return apply_filters( 'wptao_settings', $settings_fields );
		}

		/**
		 * Handles output of the settings
		 */
		public static function output() {

			$settings = TAO()->settings->settings_api;

			include_once WTBP_WPTAO_DIR . 'includes/admin/views/html-admin-settings.php';
		}

	}

}