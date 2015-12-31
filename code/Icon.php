<?php
class Icon extends DataObject
{
    /**
   * FIELDS
   */

  private static $db = array(
    'Name' => 'Text',
    'FontAwesomeClass' => 'Text',
    'FontAwesomeAnimation' => 'Text'
  );

    private static $default_sort='Name ASC';

    private static $default_records = array(
    /* SOCIAL MEDIA */
    array(
      'Name' => 'Facebook',
      'FontAwesomeClass' => 'fa-facebook'
    ),
    array(
      'Name' => 'Twitter',
      'FontAwesomeClass' => 'fa-twitter'
    ),
    array(
      'Name' => 'YouTube',
      'FontAwesomeClass' => 'fa-youtube'
    ),
    array(
      'Name' => 'LinkedIn',
      'FontAwesomeClass' => 'fa-linkedin'
    ),
    /* ARROWS */
    array(
      'Name' => 'Chevron Up',
      'FontAwesomeClass' => 'fa-chevron-up'
    ),
    array(
      'Name' => 'Chevron Down',
      'FontAwesomeClass' => 'fa-chevron-down'
    ),
    array(
      'Name' => 'Chevron Left',
      'FontAwesomeClass' => 'fa-chevron-left'
    ),
    array(
      'Name' => 'Chevron Right',
      'FontAwesomeClass' => 'fa-chevron-right'
    ),
    array(
      'Name' => 'Long Arrow Up',
      'FontAwesomeClass' => 'fa-long-arrow-up'
    ),
    array(
      'Name' => 'Long Arrow Down',
      'FontAwesomeClass' => 'fa-long-arrow-down'
    ),
    array(
      'Name' => 'Long Arrow Left',
      'FontAwesomeClass' => 'fa-long-arrow-left'
    ),
    array(
      'Name' => 'Long Arrow Right',
      'FontAwesomeClass' => 'fa-long-arrow-right'
    ),
    /* SPINNERS */
    array(
      'Name' => 'Spinner Default',
      'FontAwesomeClass' => 'fa-spinner',
      'FontAwesomeAnimation' => 'fa-spin'
    ),
    array(
      'Name' => 'Spinner Refresh',
      'FontAwesomeClass' => 'fa-refresh',
      'FontAwesomeAnimation' => 'fa-spin'
    ),
    /* NAVIGATION */
    array(
      'Name' => 'Menu',
      'FontAwesomeClass' => 'fa-navicon'
    ),
  );

    private static $summary_fields = array(
    'Name' => 'Name',
    'FontAwesomeClass' => 'Class',
    'FontAwesomeAnimation' => 'Animation',
    'CMSPreview' => 'Preview',
  );

  /**
   * CMS FIELDS
   */

  public function getCMSFields()
  {
      $fields = parent::getCMSFields();
    
    /**
     * MAIN TAB
     */

    $tab = 'Root.Main';

      $field = new TextField('Name');
      $fields->addFieldToTab($tab, $field);

      $html = ViewableData::renderWith('Icon_CMS_Instructions');
      $field = new LiteralField('Reference', $html);
      $fields->addFieldToTab($tab, $field);

      $field = new TextField('FontAwesomeClass');
      $field->setDescription('This class is used for the icon');
      $fields->addFieldToTab($tab, $field);

      $field = new TextField('FontAwesomeAnimation');
      $field->setDescription('This class is used for animating the icon');
      $fields->addFieldToTab($tab, $field);

      $html = ViewableData::renderWith('Icon_CMS_Preview');
      $field = new LiteralField('Reference', $html);
      $fields->addFieldToTab($tab, $field);
    
      return $fields;
  }

    public function getCMSPreview()
    {
        $html = ViewableData::renderWith('Icon_CMS_Preview');
        $obj = HTMLText::create();
        $obj->setValue($html);
        return $obj;
    }
}
