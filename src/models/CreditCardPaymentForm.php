<?php
/**
 * CardConnect for Craft Commerce plugin for Craft CMS 3.x
 *
 * CardConnect integration for Craft Commerce 2
 *
 * @link      http://www.joel-king.com
 * @copyright Copyright (c) 2019 jmauzyk
 */

namespace jmauzyk\commerce\cardconnect\models;

use craft\commerce\models\PaymentSource;
use craft\commerce\models\payments\CreditCardPaymentForm as BaseCreditCardPaymentForm;

/**
 * Credit card payment form model
 *
 * @author    jmauzyk
 * @package   CardConnect
 * @since     1.4.0
 *
 */
class CreditCardPaymentForm extends BaseCreditCardPaymentForm
{
    /**
     * @var string
     */
    public $profile;

    /**
     * @param PaymentSource $paymentSource
     */
    public function populateFromPaymentSource(PaymentSource $paymentSource)
    {
        $this->number = null;
        $this->profile = $paymentSource->token;
    }

    /**
     * @inheritdoc
     */
    public function defineRules(): array
    {
        $rules = parent::defineRules();

        if ($this->profile) {
            return []; //No validation of form if using a token
        }

        return $rules;
    }
}