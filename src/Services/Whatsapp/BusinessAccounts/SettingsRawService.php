<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp\BusinessAccounts;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\BusinessAccounts\SettingsRawContract;
use Telnyx\Whatsapp\BusinessAccounts\Settings\SettingGetResponse;
use Telnyx\Whatsapp\BusinessAccounts\Settings\SettingUpdateParams;
use Telnyx\Whatsapp\BusinessAccounts\Settings\SettingUpdateResponse;

/**
 * Manage Whatsapp business accounts.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SettingsRawService implements SettingsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get WABA settings
     *
     * @param string $id Whatsapp Business Account ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['v2/whatsapp/business_accounts/%1$s/settings', $id],
            options: $requestOptions,
            convert: SettingGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update WABA settings
     *
     * @param string $id Whatsapp Business Account ID
     * @param array{
     *   name?: string,
     *   timezone?: string,
     *   webhookEnabled?: bool,
     *   webhookEvents?: list<string>,
     *   webhookFailoverURL?: string,
     *   webhookURL?: string,
     * }|SettingUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SettingUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|SettingUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SettingUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['v2/whatsapp/business_accounts/%1$s/settings', $id],
            body: (object) $parsed,
            options: $options,
            convert: SettingUpdateResponse::class,
        );
    }
}
