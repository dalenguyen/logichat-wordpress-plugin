<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://logichat.io
 * @since      1.0.0
 *
 * @package    Logichat
 * @subpackage Logichat/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Logichat
 * @subpackage Logichat/admin
 * @author     Dale Nguyen <dale@dalenguyen.me>
 */
class Logichat_Admin
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

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
     * @param      string    $plugin_name       The name of this plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    /**
     * Register the settings page for the admin area.
     *
     * @since    1.0.0
     */
    public function register_settings_page()
    {
        // Create our settings page as a submenu page.
        add_submenu_page(
            'tools.php',                            // parent slug
            __('Logichat', 'logichat'),             // page title
            __('Logichat', 'logichat'),             // menu title
            'manage_options',                       // capability
            'logichat',                             // menu_slug
            array($this, 'display_settings_page')   // callable function
        );
    }

    /**
     * Display the settings page content for the page we have created.
     *
     * @since    1.0.0
     */
    public function display_settings_page()
    {
        require_once plugin_dir_path(dirname(__FILE__)) . 'admin/partials/logichat-admin-display.php';
    }

    /**
     * Register the settings for our settings page.
     *
     * @since    1.0.0
     */
    public function register_settings()
    {

        // Here we are going to register our setting.
        register_setting(
            $this->plugin_name . '-settings',
            $this->plugin_name . '-settings',
            array($this, 'sandbox_register_setting')
        );

        // Here we are going to add a section for our setting.
        add_settings_section(
            $this->plugin_name . '-settings-section',
            __('Logichat - AI Knowledge Chat ✨', 'logichat'),
            array($this, 'sandbox_add_settings_section'),
            $this->plugin_name . '-settings'
        );

        // Here we are going to add fields to our section.
        add_settings_field(
            'app-id',
            __('Logichat App Id', 'logichat'),
            array($this, 'sandbox_add_settings_field_input_text'),
            $this->plugin_name . '-settings',
            $this->plugin_name . '-settings-section',
            array(
                'label_for' => 'app-id',
            )
        );
    }

    /**
     * Sandbox our settings.
     *
     * @since    1.0.0
     */
    public function sandbox_register_setting($input)
    {

        $new_input = array();

        if (isset($input)) {
            // Loop trough each input and sanitize the value if the input id isn't post-types
            foreach ($input as $key => $value) {
                if ($key == 'post-types') {
                    $new_input[$key] = $value;
                } else {
                    $new_input[$key] = sanitize_text_field($value);
                }
            }
        }

        return $new_input;
    }

    /**
     * Sandbox our section for the settings.
     *
     * @since    1.0.0
     */
    public function sandbox_add_settings_section()
    {

        print 'Please visit <a href="https://logichat.io" target="_blank">Logichat</a> website to create you app and get the APP_ID.';
    }


    /**
     * Sandbox our inputs with text
     *
     * @since    1.0.0
     */
    public function sandbox_add_settings_field_input_text($args)
    {

        $field_id = esc_attr($args['label_for']);

        $options = get_option($this->plugin_name . '-settings');
        $option = '';

        if (!empty($options[$field_id])) {
            $option = $options[$field_id];
        }


?>
        <input 
            type="text" 
            name="<?php echo esc_attr($this->plugin_name . '-settings[' . $field_id . ']'); ?>" 
            id="<?php echo esc_attr($this->plugin_name . '-settings[' . $field_id . ']'); ?>" 
            value="<?php echo esc_attr($option); ?>" 
            class="regular-text" 
            placeholder="Enter your APP_ID" />
<?php

    }
}
