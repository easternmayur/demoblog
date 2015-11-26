<?php
/**
 * Bvb grid format transport field
 */
class Partnerportal_Formatter_Transport
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
        if (is_string($value) && $value !== 'null') {
            $value = (int)$value;
        } else if ($value === 'null' ) {
            $value = null;
        }

        $t = Zend_Registry::get('Zend_Translate');

        $properties = array(
            'data-id' => '{{id}}',
            'class' => 'transport-status',
            'data-value' => $value,
            'data-amount' => '',
            'onMouseover' => 'showTransportStatusPopup({{id}})',
            'onMouseout' => 'hideTransportStatusPopup()'
        );
        switch(true) {
            case ($value === 0):
                return $this->icon('action_3.png',
                    $t->translate(''),
                    $properties
                );
            case ($value === 1):
                return $this->icon('basIcon.png',
                    $t->translate(''),
                    $properties
                );
            case ($value === 2):
                return $this->icon('lorryGo.png',
                    $t->translate(''),
                    $properties
                );            
        }
        return $value;
    }
}