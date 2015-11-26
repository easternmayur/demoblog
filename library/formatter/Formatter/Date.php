<?php
/**
 * Bvb grid format date field
 */
class Partnerportal_Formatter_Date
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
        if ($value > 0  && $value !== 'null') { 
            $value = date("d-m-Y", strtotime($value));
        } else {
            $value = null;
        }
        
        return $value;
    }
}