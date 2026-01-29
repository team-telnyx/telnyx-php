<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AuthenticationProviders\AuthenticationProvider;
use Telnyx\AuthenticationProviders\AuthenticationProviderCreateParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderDeleteResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderGetResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderListParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderListParams\Sort;
use Telnyx\AuthenticationProviders\AuthenticationProviderNewResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderUpdateParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderUpdateResponse;
use Telnyx\AuthenticationProviders\Settings;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AuthenticationProvidersRawContract;

/**
 * @phpstan-import-type SettingsShape from \Telnyx\AuthenticationProviders\Settings
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AuthenticationProvidersRawService implements AuthenticationProvidersRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates an authentication provider.
     *
     * @param array{
     *   name: string,
     *   settings: Settings|SettingsShape,
     *   shortName: string,
     *   active?: bool,
     *   settingsURL?: string,
     * }|AuthenticationProviderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AuthenticationProviderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AuthenticationProviderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthenticationProviderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'authentication_providers',
            body: (object) $parsed,
            options: $options,
            convert: AuthenticationProviderNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing authentication provider.
     *
     * @param string $id authentication provider ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AuthenticationProviderGetResponse>
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
            path: ['authentication_providers/%1$s', $id],
            options: $requestOptions,
            convert: AuthenticationProviderGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates settings of an existing authentication provider.
     *
     * @param string $id identifies the resource
     * @param array{
     *   active?: bool,
     *   name?: string,
     *   settings?: Settings|SettingsShape,
     *   settingsURL?: string,
     *   shortName?: string,
     * }|AuthenticationProviderUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AuthenticationProviderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|AuthenticationProviderUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthenticationProviderUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['authentication_providers/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: AuthenticationProviderUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns a list of your SSO authentication providers.
     *
     * @param array{
     *   pageNumber?: int, pageSize?: int, sort?: value-of<Sort>
     * }|AuthenticationProviderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<AuthenticationProvider>>
     *
     * @throws APIException
     */
    public function list(
        array|AuthenticationProviderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthenticationProviderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'authentication_providers',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: AuthenticationProvider::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes an existing authentication provider.
     *
     * @param string $id authentication provider ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AuthenticationProviderDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['authentication_providers/%1$s', $id],
            options: $requestOptions,
            convert: AuthenticationProviderDeleteResponse::class,
        );
    }
}
