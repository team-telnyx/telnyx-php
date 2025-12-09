<?php

declare(strict_types=1);

namespace Telnyx\Services\Payment;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefListResponse;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateParams;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateParams\Preference;
use Telnyx\Payment\AutoRechargePrefs\AutoRechargePrefUpdateResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Payment\AutoRechargePrefsRawContract;

final class AutoRechargePrefsRawService implements AutoRechargePrefsRawContract
{
    // @phpstan-ignore-next-line
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
     *   invoiceEnabled?: bool,
     *   preference?: 'credit_paypal'|'ach'|Preference,
     *   rechargeAmount?: string,
     *   thresholdAmount?: string,
     * }|AutoRechargePrefUpdateParams $params
     *
     * @return BaseResponse<AutoRechargePrefUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        array|AutoRechargePrefUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AutoRechargePrefUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *
     * @return BaseResponse<AutoRechargePrefListResponse>
     *
     * @throws APIException
     */
    public function list(?RequestOptions $requestOptions = null): BaseResponse
    {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'payment/auto_recharge_prefs',
            options: $requestOptions,
            convert: AutoRechargePrefListResponse::class,
        );
    }
}
