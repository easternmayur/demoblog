<?php
/**
 * Bvb grid formatter abstract class
 */
class Partnerportal_Formatter_Abstract
{
    const ICON_PATH = '/images/partner';
    /**
     * Escapes input
     *
     * @param string $string
     * @return string
     */
    public function escape($string)
    {
        return htmlspecialchars($string);
    }

    /**
     * Outputs icon in formatters
     *
     * @param string $name filename in specific folder
     * @param string $title title of image
     * @param array $customAttributes attributes for image
     * @param string $class custom wrapper div class
     * @return string
     */
    public function icon($name, $title = '', $customAttributes = array(), $class = 'middle')
    {
        $attributes = '';

        foreach($customAttributes as $attributeKey => $attributeValue) {
            $attributes .= $attributeKey . '="' . $this->escape($attributeValue) . '" ';
        }

        return '<div class="' . $class . '"><img src="'
            . self::ICON_PATH
            . '/'
            . $this->escape($name)
            . '" border="0" title="' . $this->escape($title) . '" width="16" height="16" ' . $attributes . '/>'
            .'</div>';
    }
}