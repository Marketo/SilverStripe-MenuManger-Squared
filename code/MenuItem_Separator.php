<?php

/**
 * Class MenuItem
 */
class MenuItem_Separator extends MenuItem implements PermissionProvider
{
    /**
     * Title for this type of MenuItem to be displayed in the CMS
     * @var string
     * @config
     */
    private static $user_friendly_title = 'Separator';

    /**
     * Disabling image field
     * @var boolean
     * @config
     */
    private static $disable_image = true;

    /**
     * Disabling child fields
     * @var boolean
     * @config
     */
    private static $disable_hierarchy = true;

    /**
     * @return FieldList
     */
    public function getCMSFields()
    {
        $fields = new FieldList();

        $fields->push(
            new HeaderField('NothingToDo', 'There are no editable fields for separators.')
        );

        $this->extend('updateCMSFields', $fields);

        return $fields;
    }

    /**
     * Checks to see if a page has been chosen and if so sets Link to null
     * This means that used in conjunction with the __get method above
     * calling $menuItem->Link won't return the Link field of this MenuItem
     * but rather call the Link method on the associated Page
     */
    public function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->MenuTitle = '— Separator —';
        $this->Link = '';
        $this->IsNewWindow = 0;

        $this->PageID  = 0;
        $this->ImageID = 0;
    }

}
