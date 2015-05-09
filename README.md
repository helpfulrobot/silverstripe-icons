silverstripe-icons
=======================================

Introduction
---------------------------------------
SilverStripe module which provide a `Icon` DataObject and a `Settings->Appearance->Icons` Menu for managing your website's Icons.

Maintainer Contact
---------------------------------------
-   Stephen Corwin - <stephenjcorwin@gmail.com>
   
Requirements
---------------------------------------
-   SilverStripe 3.1

Features
---------------------------------------
-   Create and maintain sitewide Icons

Installation
---------------------------------------
Installation can be done either by composer or by manually downloading a release.

####Via Composer:
`composer require stephenjcorwin/silverstripe-icons`

####Manually:
1.   Download the module from [the releases page](https://github.com/stephenjcorwin/silverstripe-icons/releases)
2.   Extract the file
3.   Make sure the folder after being extracted is name 'silverstripe-icons'
4.   Place this directory in your site's root directory

####Configuration:
-   After installation, make sure you rebuild your database through `dev/build`
-	You should see the a new Menu in the CMS for managing `Icons` available through the Menu `Settings->Appearance->Icons`

Uninstall
---------------------------------------
####Via Composer:
`composer remove stephenjcorwin/silverstripe-icons`

####Manually:
1.   Remove the `silverstripe-icons` directory in your site's root directory

####Configuration:
-   After uninstalling, make sure you rebuild your database through `dev/build`

Code Examples
---------------------------------------
####Defining a `has_one` relationship with `Icon`:

####`mysite/code/MyDataObject.php`
    <?php
    class MyDataObject extends DataObject {
        static $has_one = array (
            'MyIcon' => 'Icon',
        );
    
        public function getCMSFields() {
            $fields = parent::getCMSFields();
    
            /*
            *   MAIN TAB
            */
    
            $tab = 'Root.Main';
            
            //provides listbox field menu for selecting a predefined Icon
            $data = DataObject::get('Icon');
            $field = new ListboxField('MyIconID', 'My Icon');
    	    $field->setSource($data->map('ID', 'Name')->toArray());
    	    $field->setEmptyString('Select one');
    	    $fields->addFieldToTab($tab, $field);
    
            return $fields;
    	}
    }

####Using the Icon in your templates:

####`mysite/code/Page.php`
    <?php
    class Page extends SiteTree {
    	private static $has_one = array(
    		'MyIcon' => 'Icon'
		);

		public function getCMSFields() {
            $fields = parent::getCMSFields();
    
            /*
            *   MAIN TAB
            */
    
            $tab = 'Root.Main';
            
            //provides listbox field menu for selecting a predefined Icon
            $data = DataObject::get('Icon');
            $field = new ListboxField('MyIconID', 'My Icon');
    	    $field->setSource($data->map('ID', 'Name')->toArray());
    	    $field->setEmptyString('Select one');
    	    $fields->addFieldToTab($tab, $field);
    
            return $fields;
    	}
    }

    class Page_Controller extends ContentController {
    	public function init() {
			parent::init();
		}
    }

####`themes/themes/mytheme/templates/Page.ss`
    <!DOCTYPE html>
	<html lang="$ContentLocale">
	<head>
	</head>
		<body>
			<% if $MyIcon %>
				<% include Icon Data=$MyIcon %>
			<% end_if %>
			$Layout
		</body>
	</html>