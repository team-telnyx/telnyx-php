<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TelephonyCredentialsContract;
use Telnyx\TelephonyCredentials\TelephonyCredential;
use Telnyx\TelephonyCredentials\TelephonyCredentialCreateParams;
use Telnyx\TelephonyCredentials\TelephonyCredentialDeleteResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialGetResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialListParams;
use Telnyx\TelephonyCredentials\TelephonyCredentialNewResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialUpdateParams;
use Telnyx\TelephonyCredentials\TelephonyCredentialUpdateResponse;

final class TelephonyCredentialsService implements TelephonyCredentialsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a credential.
     *
     * @param array{
     *   connection_id: string, expires_at?: string, name?: string, tag?: string
     * }|TelephonyCredentialCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|TelephonyCredentialCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TelephonyCredentialNewResponse {
        [$parsed, $options] = TelephonyCredentialCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'telephony_credentials',
            body: (object) $parsed,
            options: $options,
            convert: TelephonyCredentialNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get the details of an existing On-demand Credential.
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['telephony_credentials/%1$s', $id],
            options: $requestOptions,
            convert: TelephonyCredentialGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update an existing credential.
     *
     * @param array{
     *   connection_id?: string, expires_at?: string, name?: string, tag?: string
     * }|TelephonyCredentialUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TelephonyCredentialUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): TelephonyCredentialUpdateResponse {
        [$parsed, $options] = TelephonyCredentialUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['telephony_credentials/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: TelephonyCredentialUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List all On-demand Credentials.
     *
     * @param array{
     *   filter?: array{
     *     name?: string,
     *     resource_id?: string,
     *     sip_username?: string,
     *     status?: string,
     *     tag?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|TelephonyCredentialListParams $params
     *
     * @return DefaultPagination<TelephonyCredential>
     *
     * @throws APIException
     */
    public function list(
        array|TelephonyCredentialListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = TelephonyCredentialListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'telephony_credentials',
            query: $parsed,
            options: $options,
            convert: TelephonyCredential::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing credential.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['telephony_credentials/%1$s', $id],
            options: $requestOptions,
            convert: TelephonyCredentialDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Create an Access Token (JWT) for the credential.
     *
     * @throws APIException
     */
    public function createToken(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['telephony_credentials/%1$s/token', $id],
            headers: ['Accept' => 'text/plain'],
            options: $requestOptions,
            convert: 'string',
        );
    }
}
