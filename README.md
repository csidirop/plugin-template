# Template Plugin for Omeka Classic

This is a barebones plugin for Omeka Classic that provides a simple example of a plugin structure. It includes a configuration page and an admin view, offering a starting point for developing custom plugins.

### Features

 - A configuration page to set options.
 - An admin view to display plugin-specific data or functionality.
 - Ready-to-extend structure for custom Omeka plugin development.

### Installation

Download or clone this repository into the plugins/ directory of your Omeka Classic installation:

`git clone https://github.com/csidirop/plugin-template.git plugins/Template`

### File Structure

```
template/
├── TemplatePlugin.php         # Main plugin class
├── views/                     # Views for the plugin
│   ├── admin/
│   │   ├── index.php          # Admin view template
│   │   ├── config-form.php    # Configuration form template
│   └── public/                # (Optional) Public-facing views
│       └── index.php          # Placeholder for public template
├── plugin.ini                 # Plugin metadata
```

## Development

This plugin is designed as a starting point for custom Omeka Classic plugin development. Developers can:

    Add more hooks to the TemplatePlugin class.
    Define additional routes for custom functionality.
    Extend the configuration form and admin views.

For more information on Omeka plugin development, see the [Omeka Classic Developer Documentation](https://omeka.readthedocs.io/en/latest/).

## License

This plugin is released under the MIT License. See the LICENSE file for details.