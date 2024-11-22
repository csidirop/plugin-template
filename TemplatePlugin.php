<?php

class TemplatePlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_hooks = [
        'install',
        'uninstall',
        'config',
        'config_form',
        'define_routes'
    ];

    /**
     * Install the plugin.
     */
    public function hookInstall(): void
    {
        set_option('template_option', 'Default Value');
    }

    /**
     * Uninstall the plugin.
     */
    public function hookUninstall(): void
    {
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

    /**
     * Define custom routes.
     */
    public function hookDefineRoutes($args): void
    {
        $router = $args['router'];
        $router->addRoute(
            'template_admin',
            new Zend_Controller_Router_Route(
                'template/index',
                [
                    'module'     => 'default',
                    'controller' => 'template',
                    'action'     => 'index',
                ]
            )
        );
    }
}
