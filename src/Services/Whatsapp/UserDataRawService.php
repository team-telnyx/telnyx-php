<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\UserDataRawContract;
use Telnyx\Whatsapp\UserData\UserDataGetResponse;
use Telnyx\Whatsapp\UserData\UserDataUpdateParams;
use Telnyx\Whatsapp\UserData\UserDataUpdateResponse;

/**
 * Manage Whatsapp business accounts.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class UserDataRawService implements UserDataRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Fetch Whatsapp user data
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserDataGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'v2/whatsapp/user_data',
            options: $requestOptions,
            convert: UserDataGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update Whatsapp user data
     *
     * @param array{
     *   webhookFailoverURL?: string, webhookURL?: string
     * }|UserDataUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UserDataUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        array|UserDataUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = UserDataUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: 'v2/whatsapp/user_data',
            body: (object) $parsed,
            options: $options,
            convert: UserDataUpdateResponse::class,
        );
    }
}
