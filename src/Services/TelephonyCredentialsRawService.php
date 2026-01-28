<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TelephonyCredentialsRawContract;
use Telnyx\TelephonyCredentials\TelephonyCredential;
use Telnyx\TelephonyCredentials\TelephonyCredentialCreateParams;
use Telnyx\TelephonyCredentials\TelephonyCredentialDeleteResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialGetResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialListParams;
use Telnyx\TelephonyCredentials\TelephonyCredentialListParams\Filter;
use Telnyx\TelephonyCredentials\TelephonyCredentialNewResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialUpdateParams;
use Telnyx\TelephonyCredentials\TelephonyCredentialUpdateResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\TelephonyCredentials\TelephonyCredentialListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TelephonyCredentialsRawService implements TelephonyCredentialsRawContract
{
    // @phpstan-ignore-next-line
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
     *   connectionID: string, expiresAt?: string, name?: string, tag?: string
     * }|TelephonyCredentialCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TelephonyCredentialNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TelephonyCredentialCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TelephonyCredentialCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TelephonyCredentialGetResponse>
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
     * @param string $id identifies the resource
     * @param array{
     *   connectionID?: string, expiresAt?: string, name?: string, tag?: string
     * }|TelephonyCredentialUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TelephonyCredentialUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TelephonyCredentialUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TelephonyCredentialUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     *   filter?: Filter|FilterShape, pageNumber?: int, pageSize?: int
     * }|TelephonyCredentialListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TelephonyCredential>>
     *
     * @throws APIException
     */
    public function list(
        array|TelephonyCredentialListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TelephonyCredentialListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'telephony_credentials',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: TelephonyCredential::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing credential.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TelephonyCredentialDeleteResponse>
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
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function createToken(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['telephony_credentials/%1$s/token', $id],
            headers: ['Accept' => 'text/plain'],
            options: $requestOptions,
            convert: 'string',
        );
    }
}
