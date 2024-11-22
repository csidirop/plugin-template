<?php

class TemplatePlugin extends Omeka_Plugin_AbstractPlugin
{
    /**
     * @var array Hooks for the plugin.
     * 
     * An array of hooks that this plugin will listen to. Each hook is a string
     * representing an event in Omeka's plugin architecture.
     */
    protected $_hooks = [
        'install',
        'uninstall',
        'config',
        'config_form',
        // 'define_routes'
    ];

    /**
     *  Hooks in the proccess of installing the plugin.
     *  Here we can set options or create db tables or more.
     */
    public function hookInstall(): void
    {
        // Add some options:
        set_option('template_option', 'Default Value');

        try {
            // Create a custom database table:
            $sql = "
                CREATE TABLE IF NOT EXISTS `{$this->_db->Template}` (
                    `id` INT AUTO_INCREMENT PRIMARY KEY,
                    `name` VARCHAR(255) NOT NULL,
                    `description` TEXT NULL,
                    `added` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
            ";
            $this->_db->query($sql);
        } catch(Exception $e) {
            throw $e;
        }
    }

    /**
     *  Hooks in the proccess of uninstalling the plugin.
     *  Here we can undo what we initialized in hookInstall()
     */
    public function hookUninstall(): void
    {
        // Drop the custom database table:
        try {
            $sql = "DROP TABLE IF EXISTS `{$this->_db->Template}`;";
            $this->_db->query($sql);
        } catch(Exception $e) {
            throw $e;
        }

        // Delete the plugin option:
        delete_option('template_option');
    }

    /**
     * Display the configuration form.
     */
    public function hookConfigForm(): void
    {
        include 'views/admin/config-form.php';
    }

    /**
     * Process the configuration form submission.
     */
    public function hookConfig($args): void
    {
        $option = trim($args['post']['template_option']);
        set_option('template_option', $option);
    }


    // /**
    //  * Define custom routes.
    //  */
    // public function hookDefineRoutes($args): void
    // {
    //     $router = $args['router'];
    //     $router->addRoute(
    //         'template_admin',
    //         new Zend_Controller_Router_Route(
    //             'template/index',
    //             [
    //                 'module' => 'default',
    //                 'controller' => 'template',
    //                 'action' => 'index',
    //             ]
    //         )
    //     );
    // }


    /*
        Some commonly used hooks:
            hookAdminCollectionsShow
            hookAdminFooter
            hookAdminHead
            hookAdminItemsBatchEditForm
            hookAdminItemsBrowseSimpleEach
            hookAdminItemsSearch
            hookAdminItemsShow
            hookAdminItemsShowSidebar
            hookAfterDeleteItem
            hookAfterSaveItem
            hookBeforeSaveItem
            hookCollectionsBrowseSql
            hookConfig
            hookConfigForm
            hookDefineAcl
            hookDefineRoutes
            hookHtmlPurifierFormSubmission
            hookInitialize
            hookInstall
            hookItemsBatchEditCustom
            hookItemsBrowseSql
            hookNeatlinePublicStatic
            hookPublicCollectionsBrowse
            hookPublicFacets
            hookPublicFooter
            hookPublicHead
            hookPublicItemsBrowse
            hookPublicItemsShow
            hookUninstall
            hookUpgrade
        For the complete list visit: https://omeka.readthedocs.io/en/latest/Reference/hooks/
    */
}
