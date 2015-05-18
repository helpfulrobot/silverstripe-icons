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