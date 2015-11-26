<?php
/**
 * Bvb grid format price field
 */
class Partnerportal_Formatter_Price
    extends Partnerportal_Formatter_Abstract
    implements Bvb_Grid_Formatter_FormatterInterface
{

    /**
     * Constructor.
     *
     * @param array $options
     */
    public function __construct($options = array())
    {
    }

    /**
     * Formats a given value
     *
     * @param $value
     * @return string
     */
    public function format($value)
    { 
        $currencySign = '€';
        if ($value > 0  && $value !== 'null') { 
            $value = sprintf("%s %s", $currencySign, number_format($value, 2, ',', '.')); 
        } else {
            $value = null;
        }
        
        return $value;
    }
}