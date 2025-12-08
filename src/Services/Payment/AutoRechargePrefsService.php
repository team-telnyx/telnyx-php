<?php

declare(strict_types=1);

namespace Telnyx\Services\Payment;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefListResponse;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateParams;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Payment\AutoRechargePrefsContract;

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
     * @param array{
     *   enabled?: bool,
     *   invoice_enabled?: bool,
     *   preference?: 'credit_paypal'|'ach',
     *   recharge_amount?: string,
     *   threshold_amount?: string,
     * }|AutoRechargePrefUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        array|AutoRechargePrefUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AutoRechargePrefUpdateResponse {
        [$parsed, $options] = AutoRechargePrefUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<AutoRechargePrefUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: 'payment/auto_recharge_prefs',
            body: (object) $parsed,
            options: $options,
            convert: AutoRechargePrefUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the payment auto recharge preferences.
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): AutoRechargePrefListResponse {
        /** @var BaseResponse<AutoRechargePrefListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'payment/auto_recharge_prefs',
            options: $requestOptions,
            convert: AutoRechargePrefListResponse::class,
        );

        return $response->parse();
    }
}
