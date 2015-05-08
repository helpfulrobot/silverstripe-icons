silverstripe-icons
=======================================

Description
---------------------------------------
SilverStripe module which provides an [Icon] DataObject and a Settings->Appearance->Icons menu for managing your website's Icons.

Usage
---------------------------------------
```
<?php
class MyDataObject extends DataObject {
    static $has_one = array (
	    'MyIcon' => 'Icon'
	);

	public function getCMSFields() {
	    $fields = parent::getCMSFields();

        /*
        *   MAIN TAB
        */

	    $tab = 'Root.Main';
        
        //provides listbox field for selecting a predefined icons
	    $data = DataObject::get('Icon');
	    $field = new ListboxField('MyIconID', 'My Icon');
	    $field->setSource($data->map('ID', 'Name')->toArray());
	    $field->setEmptyString('Select one');
	    $fields->addFieldToTab($tab, $field);
        
        return $fields;
	}
}
```

Install
---------------------------------------
####Command Line:
```
composer require stephenjcorwin/silverstripe-icons
```

####Address Bar:
```
localhost/dev/build
```

Uninstall
---------------------------------------
####Command Line:
```
composer remove stephenjcorwin/silverstripe-icons
```

####Address Bar:
```
localhost/dev/build
```