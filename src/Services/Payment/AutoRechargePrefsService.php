<?php

declare(strict_types=1);

namespace Telnyx\Services\Payment;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefListResponse;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateParams\Preference;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Payment\AutoRechargePrefsContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AutoRechargePrefsService implements AutoRechargePrefsContract
{
    /**
     * @api
     */
    public AutoRechargePrefsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new AutoRechargePrefsRawService($client);
    }

    /**
     * @api
     *
     * Update payment auto recharge preferences.
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
    ): AutoRechargePrefUpdateResponse {
        $params = Util::removeNulls(
            [
                'enabled' => $enabled,
                'invoiceEnabled' => $invoiceEnabled,
                'preference' => $preference,
                'rechargeAmount' => $rechargeAmount,
                'thresholdAmount' => $thresholdAmount,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the payment auto recharge preferences.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): AutoRechargePrefListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }
}
