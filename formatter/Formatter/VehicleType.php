<?php
/**
 * Bvb grid translate vehicle type field
 */
class Partnerportal_Formatter_VehicleType
    extends Partnerportal_Formatter_Abstract
    implements Bvb_Grid_Formatter_FormatterInterface
{

    /**
     * Constructor.
     *
     * Empty constructor. It is enforced by FormatterInterface but we do not have anything to implement.
     * 
     * @param array $options
     */
    public function __construct($options = array())
    {
    }

    /**
     * Translate a given vehicle type
     *
     * @param $vehicleType
     * @return string $vehicleType
     */
    public function format($vehicleType)
    {
       $translate = Zend_Registry::get('Zend_Translate');
       return $translate->translate($vehicleType);
    }
}
