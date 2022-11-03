<?php
/**
 * Created by PhpStorm.
 * User: turgutsaricam
 * Date: 28/03/16
 * Time: 21:30
 */

namespace WPCCrawler;

use WP_Post;
use WPCCrawler\PostDetail\WooCommerce\WooCommerceFactory;
use WPCCrawler\PostDetail\PostDetailsService;

class WPCCrawler {

    /*
     *  INITIALIZE EVERYTHING
     */

    /**
     * @var WPCCrawler
     */
    private static $instance = null;

    /** @var bool True if a general test, such as post or category test, is in progress */
    private static $doingGeneralTest = false;

    /** @var bool True if a unit test, such as a CSS selector test, is in progress */
    private static $doingUnitTest = false;

    /**
     * @var bool True if a PHPUnit test is in progress, i.e. a unit test of the plugin, not the unit tests run by
     *      clicking a test button in the UI.
     */
    private static $doingPhpUnitTest = false;

    /**
     * @return WPCCrawler
     * @since 1.9.0
     */
    public static function getInstance() {
        if (static::$instance === null) {
            static::$instance = new WPCCrawler();
        }

        return static::$instance;
    }

    /**
     * This is a singleton.
     */
    private function __construct() {
        Environment::init();

        $this->defineLanguageTranslations();

        RequirementValidator::getInstance()->validateAll();
        $this->registerCapabilitiesAndRolesOnActivation();

        // Initialize the factory
        Factory::getInstance();

        $this->setDirectoryPermissionsOnActivation();
        $this->addActionLinks();
        $this->handlePostDeletesAndUpdates();
        $this->registerPostDetailFactories();
    }

    /**
     * Set whether the script is being run for a test or not. You can get the test status from {@link WPCCrawler::isDoingGeneralTest}.
     *
     * @param bool $doingGeneralTest True if doing test. Otherwise, false.
     */
    public static function setDoingGeneralTest(bool $doingGeneralTest) {
        static::$doingGeneralTest = $doingGeneralTest;
    }

    /**
     * @return bool True if the script is run to conduct a general test. False otherwise.
     */
    public static function isDoingGeneralTest(): bool {
        return static::$doingGeneralTest;
    }

    /**
     * @param bool $doingUnitTest See {@link $doingUnitTest}
     * @since 1.11.0
     */
    public static function setDoingUnitTest(bool $doingUnitTest) {
        static::$doingUnitTest = $doingUnitTest;
    }

    /**
     * @return bool See {@link $doingUnitTest}
     * @since 1.11.0
     */
    public static function isDoingUnitTest(): bool {
        return static::$doingUnitTest;
    }

    /**
     * @param bool $doingPhpUnitTest See {@link doingPhpUnitTest}
     * @since 1.11.0
     */
    public static function setDoingPhpUnitTest(bool $doingPhpUnitTest) {
        static::$doingPhpUnitTest = $doingPhpUnitTest;
    }

    /**
     * @return bool See {@link doingPhpUnitTest}
     * @since 1.11.0
     */
    public static function isDoingPhpUnitTest(): bool {
        return self::$doingPhpUnitTest;
    }

    /*
     * PRIVATE METHODS
     */

    /**
     * Register the text domain of the plugin and the directory storing the translation files
     *
     * @since 1.9.0
     */
    private function defineLanguageTranslations(): void {
        // Set the folder including translation files, and handle translations
        add_action('plugins_loaded', function () {
            load_plugin_textdomain(Environment::appDomain(), false, Environment::pluginFileName() . "/app/lang/");
        });
    }

    /**
     * Registers user capabilities and roles when the plugin is activated
     *
     * @since 1.9.0
     */
    private function registerCapabilitiesAndRolesOnActivation() {
        register_activation_hook(Utils::getPluginFilePath(), function () {
            Permission::registerCapabilitiesAndRoles();
        });
    }

    /**
     * Set permissions of the directories when the plugin is activated
     *
     * @since 1.9.0
     */
    private function setDirectoryPermissionsOnActivation(): void {
        // Set chmod of storage dir when the plugin is activated
        register_activation_hook(Utils::getPluginFilePath(), function () {
            $storagePath    = Factory::assetManager()->appPath(Environment::relativeStorageDir());
            $cachePath      = Factory::assetManager()->appPath(Environment::relativeCacheDir());

            chmod($storagePath, 0755);
            chmod($cachePath,   0755);
        });
    }

    /**
     * Adds action links for easy navigation
     *
     * @since 1.9.0
     */
    private function addActionLinks(): void {
        // Add plugin action links for easy navigation
        add_filter(sprintf('plugin_action_links_%s', plugin_basename(Utils::getPluginFilePath())), function ($links) {
            $newLinks = [
                sprintf('<a href="%s">%s</a>', Factory::generalSettingsController()->getFullPageUrl(), _wpcc("General Settings")),
                sprintf('<a href="%s" target="_blank">%s</a>', Environment::getDocumentationUrl(), _wpcc('Documentation')),
            ];

            return array_merge($links, $newLinks);
        });
    }

    /**
     * Registers actions to listen to post deletions and updates.
     *
     * @since 1.9.0
     */
    private function handlePostDeletesAndUpdates(): void {
        add_action('admin_init', function () {

            // Listen to post deletes
            add_action('delete_post', function ($postId) {
                // Set a post's URL deleted, if it is one of posts saved by the plugin.
                Factory::databaseService()->setUrlDeleted($postId);
            });

            // Listen to post updates
            add_action('post_updated', function ($postId, $postAfter, $postBefore) {
                /** @var WP_Post $postAfter */
                /** @var WP_Post $postBefore */

                // Update corresponding URL's "saved_at" when the post's "post_date" is changed
                if ($postAfter && $postBefore && $postAfter->post_date != $postBefore->post_date) {
                    Factory::databaseService()->updateUrlPostSavedAtByPostId($postId, $postAfter->post_date);
                }

            }, 10, 3);

        });
    }

    /**
     * Registers post detail factories
     */
    private function registerPostDetailFactories() {
        add_action('plugins_loaded', function() {
            // Register built-in factories
            PostDetailsService::getInstance()->registerFactoryByName([
                WooCommerceFactory::class
            ]);

            // Register the custom post detail factories when the plugins are loaded
            PostDetailsService::getInstance()->registerCustomFactories();
        }, 1);
    }

}
