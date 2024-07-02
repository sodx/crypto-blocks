<?php
/**
 * Crypto News Settings Class
 *
 * @package CryptoBlocks
 */

namespace CB;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

/**
 * Container names for the plugin.
 */
const CONTAINER_NAMES = [
    'SETTINGS' => 'Crypto News Settings',
];

/**
 * Fields for the plugin.
 */
const FIELDS = [
    'OPENAI_API_KEY' => 'crypto_news_openai_api_key',
    'NEWS_API_KEY'   => 'crypto_news_the_news_api_key',
    'RUN_PARSER'     => 'crypto_news_run_parser',
];

/**
 * Settings
 */
class Settings {
    /**
     * Creates a settings page for plugin.
     *
     * @return void
     */
    private static function create_settings_page() {
        $fields = [
            Field::make( 'text', FIELDS['OPENAI_API_KEY'], 'OpenAI API Key' )
                ->set_attribute( 'placeholder', 'Enter your OpenAI API Key' )
                ->set_help_text( 'This is the API key for OpenAI.' )
                ->set_required( true ),
            Field::make( 'text', FIELDS['NEWS_API_KEY'], 'The news API Key' )
                ->set_attribute( 'placeholder', 'Enter your The News API Key' )
                ->set_help_text( 'This is the API key for The News Api.' )
                ->set_required( true ),
            Field::make( 'html', FIELDS['RUN_PARSER'], 'Run Parser' )
                ->set_html( self::get_parsing_form_markup() ),
        ];

        Container::make( 'theme_options', CONTAINER_NAMES['SETTINGS'] )
            ->set_page_menu_title( 'Crypto News Settings' )
            ->set_page_file( 'crypto_news_settings' )
            ->add_fields( $fields );
    }

    /**
     * Configure settings for this plugin.
     *
     * @return void
     */
    public static function register_plugin_options() {
        self::create_settings_page();
    }

    /**
     * Gets the OpenAI API Key.
     *
     * @return string
     */
    public static function get_openai_api_key(): string {
        return carbon_get_theme_option( FIELDS['OPENAI_API_KEY'] );
    }

    /**
     * Gets the Crypto Panic API Key.
     *
     * @return string
     */
    public static function get_crypto_panic_api_key(): string {
        return carbon_get_theme_option( FIELDS['CRYPTO_PANIC_API_KEY'] );
    }

    /**
     * @return string The form markup.
     */
    public static function get_parsing_form_markup(): string {
        ob_start();
        ?>
            <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
                <input type="hidden" name="action" value="run_crypto_news_parser">
                <?php // phpcs:ignore ?>
                <?php echo wp_nonce_field( 'run_crypto_news_parser_action', '_wpnonce', true, false ); ?>
                <button type="submit" class="button button-primary">Run Parser</button>
            </form>
        <?php
        return ob_get_clean();
    }
}

