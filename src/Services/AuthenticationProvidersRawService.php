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
use Telnyx\ServiceContracts\AuthenticationProvidersRawContract;

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
     *   settings: array{
     *     idpCertFingerprint: string,
     *     idpEntityID: string,
     *     idpSSOTargetURL: string,
     *     idpCertFingerprintAlgorithm?: 'sha1'|'sha256'|'sha384'|'sha512'|IdpCertFingerprintAlgorithm,
     *   },
     *   shortName: string,
     *   active?: bool,
     *   settingsURL?: string,
     * }|AuthenticationProviderCreateParams $params
     *
     * @return BaseResponse<AuthenticationProviderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|AuthenticationProviderCreateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *
     * @return BaseResponse<AuthenticationProviderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     *   settings?: array{
     *     idpCertFingerprint: string,
     *     idpEntityID: string,
     *     idpSSOTargetURL: string,
     *     idpCertFingerprintAlgorithm?: 'sha1'|'sha256'|'sha384'|'sha512'|IdpCertFingerprintAlgorithm,
     *   },
     *   settingsURL?: string,
     *   shortName?: string,
     * }|AuthenticationProviderUpdateParams $params
     *
     * @return BaseResponse<AuthenticationProviderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|AuthenticationProviderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *   page?: array{number?: int, size?: int}, sort?: value-of<Sort>
     * }|AuthenticationProviderListParams $params
     *
     * @return BaseResponse<AuthenticationProviderListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AuthenticationProviderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AuthenticationProviderListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id authentication provider ID
     *
     * @return BaseResponse<AuthenticationProviderDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
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
