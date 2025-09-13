<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TelephonyCredentialsContract;
use Telnyx\TelephonyCredentials\TelephonyCredentialCreateParams;
use Telnyx\TelephonyCredentials\TelephonyCredentialDeleteResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialGetResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialListParams;
use Telnyx\TelephonyCredentials\TelephonyCredentialListParams\Filter;
use Telnyx\TelephonyCredentials\TelephonyCredentialListParams\Page;
use Telnyx\TelephonyCredentials\TelephonyCredentialListResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialNewResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialUpdateParams;
use Telnyx\TelephonyCredentials\TelephonyCredentialUpdateResponse;

use const Telnyx\Core\OMIT as omit;

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
     * @param string $connectionID identifies the Credential Connection this credential is associated with
     * @param string $expiresAt ISO-8601 formatted date indicating when the credential will expire
     * @param string $name
     * @param string $tag Tags a credential. A single tag can hold at maximum 1000 credentials.
     *
     * @return TelephonyCredentialNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $connectionID,
        $expiresAt = omit,
        $name = omit,
        $tag = omit,
        ?RequestOptions $requestOptions = null,
    ): TelephonyCredentialNewResponse {
        $params = [
            'connectionID' => $connectionID,
            'expiresAt' => $expiresAt,
            'name' => $name,
            'tag' => $tag,
        ];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return TelephonyCredentialNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialNewResponse {
        [$parsed, $options] = TelephonyCredentialCreateParams::parseRequest(
            $params,
            $requestOptions
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
     * @return TelephonyCredentialGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return TelephonyCredentialGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
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
     * @param string $connectionID identifies the Credential Connection this credential is associated with
     * @param string $expiresAt ISO-8601 formatted date indicating when the credential will expire
     * @param string $name
     * @param string $tag Tags a credential. A single tag can hold at maximum 1000 credentials.
     *
     * @return TelephonyCredentialUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $connectionID = omit,
        $expiresAt = omit,
        $name = omit,
        $tag = omit,
        ?RequestOptions $requestOptions = null,
    ): TelephonyCredentialUpdateResponse {
        $params = [
            'connectionID' => $connectionID,
            'expiresAt' => $expiresAt,
            'name' => $name,
            'tag' => $tag,
        ];

        return $this->updateRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return TelephonyCredentialUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialUpdateResponse {
        [$parsed, $options] = TelephonyCredentialUpdateParams::parseRequest(
            $params,
            $requestOptions
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[name], filter[status], filter[resource_id], filter[sip_username]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return TelephonyCredentialListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialListResponse {
        $params = ['filter' => $filter, 'page' => $page];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return TelephonyCredentialListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialListResponse {
        [$parsed, $options] = TelephonyCredentialListParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'telephony_credentials',
            query: $parsed,
            options: $options,
            convert: TelephonyCredentialListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete an existing credential.
     *
     * @return TelephonyCredentialDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return TelephonyCredentialDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
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
        $params = [];

        return $this->createTokenRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @throws APIException
     */
    public function createTokenRaw(
        string $id,
        mixed $params,
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
