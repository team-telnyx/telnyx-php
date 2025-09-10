<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Payment;

use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefListResponse;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateParams\Preference;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface AutoRechargePrefsContract
{
    /**
     * @api
     *
     * @param bool $enabled whether auto recharge is enabled
     * @param bool $invoiceEnabled
     * @param Preference|value-of<Preference> $preference the payment preference for auto recharge
     * @param string $rechargeAmount the amount to recharge the account, the actual recharge amount will be the amount necessary to reach the threshold amount plus the recharge amount
     * @param string $thresholdAmount the threshold amount at which the account will be recharged
     */
    public function update(
        $enabled = omit,
        $invoiceEnabled = omit,
        $preference = omit,
        $rechargeAmount = omit,
        $thresholdAmount = omit,
        ?RequestOptions $requestOptions = null,
    ): AutoRechargePrefUpdateResponse;

    /**
     * @api
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): AutoRechargePrefListResponse;
}
