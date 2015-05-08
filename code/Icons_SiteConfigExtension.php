<?php
class Icons_SiteConfigExtension extends DataExtension {
  /**
    FIELDS
  **/

  static $db = array (
  );

  public static $default_sort='';

  static $summary_fields = array (
  );

  /**
    CMS FIELDS
  **/
    
  public function updateCMSFields(FieldList $fields) {    
    /*
      APPEARANCE TAB
    */

    $tab = 'Root.Appearance.Icons';
    
    $conf=GridFieldConfig_RelationEditor::create(10);
    $conf->removeComponentsByType('GridFieldPaginator');
    $conf->removeComponentsByType('GridFieldPageCount');
    $data = DataObject::get('Icon');
    $field = new GridField('Icon', 'Icons', $data, $conf);
    $fields->addFieldToTab($tab, $field);
  }
}