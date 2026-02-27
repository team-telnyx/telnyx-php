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

/**
 * V2 Auto Recharge Preferences API.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     *   preference?: Preference|value-of<Preference>,
     *   rechargeAmount?: string,
     *   thresholdAmount?: string,
     * }|AutoRechargePrefUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AutoRechargePrefUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        array|AutoRechargePrefUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AutoRechargePrefListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'payment/auto_recharge_prefs',
            options: $requestOptions,
            convert: AutoRechargePrefListResponse::class,
        );
    }
}
