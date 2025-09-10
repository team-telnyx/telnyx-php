<?php

declare(strict_types=1);

namespace Telnyx\Services\Payment;

use Telnyx\Client;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefListResponse;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateParams;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateParams\Preference;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Payment\AutoRechargePrefsContract;

use const Telnyx\Core\OMIT as omit;

final class AutoRechargePrefsService implements AutoRechargePrefsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Update payment auto recharge preferences.
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
    ): AutoRechargePrefUpdateResponse {
        [$parsed, $options] = AutoRechargePrefUpdateParams::parseRequest(
            [
                'enabled' => $enabled,
                'invoiceEnabled' => $invoiceEnabled,
                'preference' => $preference,
                'rechargeAmount' => $rechargeAmount,
                'thresholdAmount' => $thresholdAmount,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: 'payment/auto_recharge_prefs',
            body: (object) $parsed,
            options: $options,
            convert: AutoRechargePrefUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the payment auto recharge preferences.
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): AutoRechargePrefListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'payment/auto_recharge_prefs',
            options: $requestOptions,
            convert: AutoRechargePrefListResponse::class,
        );
    }
}
