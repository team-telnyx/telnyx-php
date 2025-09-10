<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
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
     */
    public function create(
        $connectionID,
        $expiresAt = omit,
        $name = omit,
        $tag = omit,
        ?RequestOptions $requestOptions = null,
    ): TelephonyCredentialNewResponse {
        [$parsed, $options] = TelephonyCredentialCreateParams::parseRequest(
            [
                'connectionID' => $connectionID,
                'expiresAt' => $expiresAt,
                'name' => $name,
                'tag' => $tag,
            ],
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
     * @param string $connectionID identifies the Credential Connection this credential is associated with
     * @param string $expiresAt ISO-8601 formatted date indicating when the credential will expire
     * @param string $name
     * @param string $tag Tags a credential. A single tag can hold at maximum 1000 credentials.
     */
    public function update(
        string $id,
        $connectionID = omit,
        $expiresAt = omit,
        $name = omit,
        $tag = omit,
        ?RequestOptions $requestOptions = null,
    ): TelephonyCredentialUpdateResponse {
        [$parsed, $options] = TelephonyCredentialUpdateParams::parseRequest(
            [
                'connectionID' => $connectionID,
                'expiresAt' => $expiresAt,
                'name' => $name,
                'tag' => $tag,
            ],
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
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[name], filter[status], filter[resource_id], filter[sip_username]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialListResponse {
        [$parsed, $options] = TelephonyCredentialListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
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
