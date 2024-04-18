# MantisBT-NavbarButtons

Overview
--------
Adds custom buttons to MantisBT navbar.


How to install
--------------

1. Copy NavbarButtons folder into plugins folder.
2. Open Mantis with browser.
3. Log in as administrator.
4. Go to Manage -> Manage Plugins.
5. Find NavbarButtons in the list.
6. Click Install.


Configuration
--------------

Add in config/config_inc.php:
```
$g_plugin_NavbarButtons_buttons =array(
    array(
        'any_project_level_threshold' => DEVELOPER,
        'url'       => 'https://github.com/mantisbt',
        'title'     => 'GitHub',
        'icon'      => 'fa-code-fork',
        'label'     => 'GitHub'
    )
);
```


Supported Versions
------------------

- MantisBT 2.14 and higher - supported
