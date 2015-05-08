<?php

// Set the module directory so we know where JS, etc lives.
define('ICONS_BASE', basename(dirname(__FILE__)));
SiteConfig::add_extension('Icons_SiteConfigExtension');
LeftAndMain::require_css(ICONS_BASE . '/fonts/font-awesome-4.3.0/css/font-awesome.css');
LeftAndMain::require_css(ICONS_BASE . '/css/cms/min.css');