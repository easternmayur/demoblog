<?php
/**
 * Bvb grid format payment status
 */
class Partnerportal_Formatter_Payment
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

        $translate = Zend_Registry::get('Zend_Translate');

        $properties = array(
            'data-id' => '{{id}}',
            'data-value' => $value,
            'data-amount' => '',
        );
        switch(true) {
            case ($value === Partnerportal_Service_Finance::FINANCE_PAYMENT_STATUS_INCOMPLETE):
                $properties['class'] = 'payment-status payment-status-incomplete';
                return $this->icon(
                    'action_0.png',
                    NULL,
                    $properties
                );
            case ($value === Partnerportal_Service_Finance::FINANCE_PAYMENT_STATUS_IN_PROGRESS):
                $properties['class'] = 'payment-status payment-status-progress';
                return $this->icon(
                    'action_1.png',
                    NULL,
                    $properties
                );
            case ($value === Partnerportal_Service_Finance::FINANCE_PAYMENT_STATUS_COMPLETE):
                $properties['class'] = 'payment-status payment-status-complete';
                return $this->icon(
                    'action_3.png',
                    NULL,
                    $properties
                );            
        }
        
        return $value;
    }
}