<?php
class Icon_ContentControllerExtension extends Extension
{
    /**
   * Imports the generated Style Sheet
   */

  public function onAfterInit()
  {
      Requirements::css(ICONS_FONTAWESOME_CSS_PATH);
  }
}
