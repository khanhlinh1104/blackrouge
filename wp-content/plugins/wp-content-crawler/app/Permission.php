<?php
/**
 * Created by PhpStorm.
 * User: turgutsaricam
 * Date: 03/11/2019
 * Time: 20:08
 *
 * @since 1.9.0
 */

namespace WPCCrawler;


class Permission {

    // TODO: Write UI tests for the permissions

    const CAP_MANAGE_WPCC               = 'manage_content_crawler';

    const CAP_UPDATE_SITE_SETTINGS      = 'update_wpcc_site_settings';

    const CAP_VIEW_TOOLS                = 'view_wpcc_tools';

    const CAP_VIEW_GENERAL_SETTINGS     = 'view_wpcc_general_settings';
    const CAP_UPDATE_GENERAL_SETTINGS   = 'update_wpcc_general_settings';

    const CAP_VIEW_DASHBOARD            = 'view_wpcc_dashboard';

    const CAP_VIEW_TESTER               = 'view_wpcc_tester';

    /** @var string[] */
    private static $capabilityKeys = null;

    /*
     *
     */

    /**
     * @return bool True if the current user can manage the plugin
     * @since 1.9.0
     */
    public static function canManagePlugin() {
        return static::can(static::CAP_MANAGE_WPCC);
    }

    /**
     * @return bool True if the current user can update site settings
     * @since 1.9.0
     */
    public static function canUpdateSiteSettings() {
        return static::can(static::CAP_UPDATE_SITE_SETTINGS);
    }

    /**
     * @return bool True if the current user can view tools
     * @since 1.9.0
     */
    public static function canViewTools() {
        return static::can(static::CAP_VIEW_TOOLS);
    }

    /**
     * @return bool True if the current user can view general settings
     * @since 1.9.0
     */
    public static function canViewGeneralSettings() {
        return static::can(static::CAP_VIEW_GENERAL_SETTINGS);
    }

    /**
     * @return bool True if the current user can update general settings
     * @since 1.9.0
     */
    public static function canUpdateGeneralSettings() {
        return static::can(static::CAP_UPDATE_GENERAL_SETTINGS);
    }

    /**
     * @return bool True if the current user can view dashboard
     * @since 1.9.0
     */
    public static function canViewDashboard() {
        return static::can(static::CAP_VIEW_DASHBOARD);
    }

    /**
     * @return bool True if the current user can view tester
     * @since 1.9.0
     */
    public static function canViewTester() {
        return static::can(static::CAP_VIEW_TESTER);
    }

    /*
     *
     */

    /**
     * Check if the current user has a capability
     *
     * @param string $capability One of the constants of this class, whose name starts with "CAP_"
     * @return bool True if current user has the specified capability. Otherwise, false.
     * @since 1.9.0
     */
    public static function can(string $capability) {
        // If this is not a plugin capability, let WordPress handle it directly.
        if (!static::isPluginCapability($capability)) {
            return current_user_can($capability);
        }

        // If this user can manage options or the plugin completely, return true
        if (current_user_can('manage_options')) {
            return true;
        }

        return current_user_can($capability);
    }

    /**
     * Displays a message indicating that the user is not allowed to perform this action. Then, exits.
     *
     * @since 1.9.0
     */
    public static function displayNotAllowedMessageAndExit() {
        $message = _wpcc("You are not allowed to do this.");

        // Use WP's function to terminate the script
        wp_die($message);

        // If it was not successful, terminate via exit
        exit($message);
    }

    /**
     * Check if a capability belongs to the plugin
     *
     * @param string $capability Key of a capability
     * @return bool True if the given capability belongs to the plugin. Otherwise, false.
     * @since 1.9.0
     */
    public static function isPluginCapability(string $capability) {
        return in_array($capability, static::getCapabilityKeys());
    }

    /**
     * Get all capability keys defined for the plugin
     *
     * @return string[] Keys of the capabilities defined for the plugin
     * @since 1.9.0
     */
    public static function getCapabilityKeys() {
        if (static::$capabilityKeys === null) {
            static::$capabilityKeys = [
                static::CAP_MANAGE_WPCC,
                static::CAP_UPDATE_SITE_SETTINGS,
                static::CAP_VIEW_TOOLS,
                static::CAP_VIEW_GENERAL_SETTINGS,
                static::CAP_UPDATE_GENERAL_SETTINGS,
                static::CAP_VIEW_DASHBOARD,
                static::CAP_VIEW_TESTER,
            ];
        }

        return static::$capabilityKeys;
    }

    /**
     * Registers capabilities and roles. This should be called only once because roles and their capabilities are kept
     * in the database. Calling this when the plugin is activated is suggested by WordPress.
     *
     * @see https://codex.wordpress.org/Function_Reference/add_cap
     * @see https://codex.wordpress.org/Function_Reference/add_role
     * @since 1.9.0
     */
    public static function registerCapabilitiesAndRoles() {
        // Register all capabilities to the administrator role
        $admin = get_role('administrator');
        foreach(static::getCapabilityKeys() as $capability) {
            $admin->add_cap($capability, true);
        }

        // Create Demo role if this is the demo
        if(Environment::isDemo()) {
            $demo = get_role('demo');
            if (!$demo) {
                $demo = add_role('demo', 'Demo');
            }

            $demoCaps = [
                // WP Content Crawler capabilities
                static::CAP_MANAGE_WPCC             => true,
                static::CAP_UPDATE_SITE_SETTINGS    => true,
                static::CAP_VIEW_TOOLS              => true,
                static::CAP_VIEW_GENERAL_SETTINGS   => true,
                static::CAP_UPDATE_GENERAL_SETTINGS => false,
                static::CAP_VIEW_DASHBOARD          => true,
                static::CAP_VIEW_TESTER             => true,
            ];

            foreach($demoCaps as $cap => $allowed) {
                $demo->add_cap($cap, $allowed);
            }
        }
    }
}