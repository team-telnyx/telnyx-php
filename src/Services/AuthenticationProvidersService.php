<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AuthenticationProviders\AuthenticationProviderCreateParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderDeleteResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderGetResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderListParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderListResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderNewResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderUpdateParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AuthenticationProvidersContract;

final class AuthenticationProvidersService implements AuthenticationProvidersContract
{
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
     *   settings: array{
     *     idp_cert_fingerprint: string,
     *     idp_entity_id: string,
     *     idp_sso_target_url: string,
     *     idp_cert_fingerprint_algorithm?: "sha1"|"sha256"|"sha384"|"sha512",
     *   },
     *   short_name: string,
     *   active?: bool,
     *   settings_url?: string,
     * }|AuthenticationProviderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|AuthenticationProviderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AuthenticationProviderNewResponse {
        [$parsed, $options] = AuthenticationProviderCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderGetResponse {
        // @phpstan-ignore-next-line;
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
     * @param array{
     *   active?: bool,
     *   name?: string,
     *   settings?: array{
     *     idp_cert_fingerprint: string,
     *     idp_entity_id: string,
     *     idp_sso_target_url: string,
     *     idp_cert_fingerprint_algorithm?: "sha1"|"sha256"|"sha384"|"sha512",
     *   },
     *   settings_url?: string,
     *   short_name?: string,
     * }|AuthenticationProviderUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|AuthenticationProviderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): AuthenticationProviderUpdateResponse {
        [$parsed, $options] = AuthenticationProviderUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
     * @phpstan-type Sort = "name"|"-name"|"short_name"|"-short_name"|"active"|"-active"|"created_at"|"-created_at"|"updated_at"|"-updated_at"
     *
     * Returns a list of your SSO authentication providers.
     *
     * @param array{
     *   page?: array{number?: int, size?: int}, sort?: Sort
     * }|AuthenticationProviderListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|AuthenticationProviderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): AuthenticationProviderListResponse {
        [$parsed, $options] = AuthenticationProviderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'authentication_providers',
            query: $parsed,
            options: $options,
            convert: AuthenticationProviderListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes an existing authentication provider.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): AuthenticationProviderDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['authentication_providers/%1$s', $id],
            options: $requestOptions,
            convert: AuthenticationProviderDeleteResponse::class,
        );
    }
}
