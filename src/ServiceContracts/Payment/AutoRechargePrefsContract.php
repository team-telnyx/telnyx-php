<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Payment;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefListResponse;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateParams\Preference;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface AutoRechargePrefsContract
{
    /**
     * @api
     *
     * @param bool $enabled whether auto recharge is enabled
     * @param Preference|value-of<Preference> $preference the payment preference for auto recharge
     * @param string $rechargeAmount the amount to recharge the account, the actual recharge amount will be the amount necessary to reach the threshold amount plus the recharge amount
     * @param string $thresholdAmount the threshold amount at which the account will be recharged
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        ?bool $enabled = null,
        ?bool $invoiceEnabled = null,
        Preference|string|null $preference = null,
        ?string $rechargeAmount = null,
        ?string $thresholdAmount = null,
        RequestOptions|array|null $requestOptions = null,
    ): AutoRechargePrefUpdateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): AutoRechargePrefListResponse;
}
