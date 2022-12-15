#!/usr/local/bin/php
<?php
require dirname(__DIR__).'/vendor/autoload.php';

use gtk\core;
use gtk\webView;
use gtk\widget\notebook;
use gtk\widget\window;
use gtk\widget\label;
use gtk\widget\scrollWindow;
use gtk\sourceView\view;
use gtk\sourceView\buffer;
use gtk\sourceView\languageManager;
use gtk\sourceView\completionWords;


$scrollWindow = new scrollWindow();
$scrollWindow->set_policy();
$lm = new languageManager();
$lang = $lm->get_language('php');
$buffer = new buffer($lang);
$buffer->set_highlight_matching_brackets();
$view = new view($buffer);
$view->set_auto_indent();
$view->set_highlight_current_line();
$view->set_show_line_numbers();
$view->set_show_right_margin();
$view->set_smart_backspace();
$view->set_indent_on_tab();
$completion = $view->get_completion($view);
$words = new completionWords('Current buffer');
$words->register($buffer);
$words->add_provider($completion);
$scrollWindow->add($view);

$webview = new webView();
$webview->loadURL('https://www.tradingview.com/chart');
$notebook = new notebook();
$notebook->append_page($scrollWindow,new label('Editor'));
$notebook->append_page($webview,new label('charts'));
$window = new window();
$window->set_title('php-gtk');
$window->set_default_size();
$window->add($notebook);
$window->show_all();
$window->connect('delete-event', function(){
    core::main_quit();
});
core::main();