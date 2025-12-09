<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\AuthenticationProviders\AuthenticationProviderCreateParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderDeleteResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderGetResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderListParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderListParams\Sort;
use Telnyx\AuthenticationProviders\AuthenticationProviderListResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderNewResponse;
use Telnyx\AuthenticationProviders\AuthenticationProviderUpdateParams;
use Telnyx\AuthenticationProviders\AuthenticationProviderUpdateResponse;
use Telnyx\AuthenticationProviders\Settings\IdpCertFingerprintAlgorithm;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
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
     *     idp_cert_fingerprint_algorithm?: 'sha1'|'sha256'|'sha384'|'sha512'|IdpCertFingerprintAlgorithm,
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

        /** @var BaseResponse<AuthenticationProviderNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'authentication_providers',
            body: (object) $parsed,
            options: $options,
            convert: AuthenticationProviderNewResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<AuthenticationProviderGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['authentication_providers/%1$s', $id],
            options: $requestOptions,
            convert: AuthenticationProviderGetResponse::class,
        );

        return $response->parse();
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
     *     idp_cert_fingerprint_algorithm?: 'sha1'|'sha256'|'sha384'|'sha512'|IdpCertFingerprintAlgorithm,
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

        /** @var BaseResponse<AuthenticationProviderUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['authentication_providers/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: AuthenticationProviderUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns a list of your SSO authentication providers.
     *
     * @param array{
     *   page?: array{number?: int, size?: int}, sort?: value-of<Sort>
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

        /** @var BaseResponse<AuthenticationProviderListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'authentication_providers',
            query: $parsed,
            options: $options,
            convert: AuthenticationProviderListResponse::class,
        );

        return $response->parse();
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
        /** @var BaseResponse<AuthenticationProviderDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['authentication_providers/%1$s', $id],
            options: $requestOptions,
            convert: AuthenticationProviderDeleteResponse::class,
        );

        return $response->parse();
    }
}
