<?php
/**
 * Bvb grid translate vehicle status field
 */
class Partnerportal_Formatter_VehicleStatus
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
     * Translate a given vehicle status
     *
     * @param $vehicleStatus
     * @return string $vehicleStatus
     */
    public function format($vehicleStatus)
    {
        $translate = Zend_Registry::get('Zend_Translate');
        return $translate->translate($vehicleStatus);
    }
}
