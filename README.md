Gtk - Gui Toolkit Bindings for php
================================================

Gtk written in pure php using FFI_.

**Development Status:**
WARNING: API is unstable
WARNING: Lots of things are not implemented/supported.

See the 'examples' directory for working examples.
Anything else will probably not work.

**Code:** https://github.com/ghostjat/gtk

**License:** LGPL 2.1+

**Requirements:**

- php_ 7.4+
- FFI_

.. _ffi: https://www.php.net/manual/en/class.ffi
.. _php: http://www.php.net/

INSTALL
-------
composer require ghostjat/gtk

Usage
-----

```require dirname(__DIR__).'/vendor/autoload.php';

use gtk\core;
use gtk\window;
use gtk\webView;

$window = new window();
$window->set_title('php-webkit');
$window->set_default_size(400, 240);
$webview = new webView();
$window->add($webview);
$webview->loadURL('https://github.com/ghostjat/gtk');
$window->show_all();
$window->connect('destroy', function(){
    core::main_quit();
});
core::main();
```

Search paths
~~~~~~~~~~~~

TODO

Documentation
-------------
TODO
