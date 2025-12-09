<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TelephonyCredentialsContract;
use Telnyx\TelephonyCredentials\TelephonyCredential;
use Telnyx\TelephonyCredentials\TelephonyCredentialDeleteResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialGetResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialNewResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialUpdateResponse;

final class TelephonyCredentialsService implements TelephonyCredentialsContract
{
    /**
     * @api
     */
    public TelephonyCredentialsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TelephonyCredentialsRawService($client);
    }

    /**
     * @api
     *
     * Create a credential.
     *
     * @param string $connectionID identifies the Credential Connection this credential is associated with
     * @param string $expiresAt ISO-8601 formatted date indicating when the credential will expire
     * @param string $tag Tags a credential. A single tag can hold at maximum 1000 credentials.
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        ?string $expiresAt = null,
        ?string $name = null,
        ?string $tag = null,
        ?RequestOptions $requestOptions = null,
    ): TelephonyCredentialNewResponse {
        $params = [
            'connectionID' => $connectionID,
            'expiresAt' => $expiresAt,
            'name' => $name,
            'tag' => $tag,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get the details of an existing On-demand Credential.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update an existing credential.
     *
     * @param string $id identifies the resource
     * @param string $connectionID identifies the Credential Connection this credential is associated with
     * @param string $expiresAt ISO-8601 formatted date indicating when the credential will expire
     * @param string $tag Tags a credential. A single tag can hold at maximum 1000 credentials.
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $connectionID = null,
        ?string $expiresAt = null,
        ?string $name = null,
        ?string $tag = null,
        ?RequestOptions $requestOptions = null,
    ): TelephonyCredentialUpdateResponse {
        $params = [
            'connectionID' => $connectionID,
            'expiresAt' => $expiresAt,
            'name' => $name,
            'tag' => $tag,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all On-demand Credentials.
     *
     * @param array{
     *   name?: string,
     *   resourceID?: string,
     *   sipUsername?: string,
     *   status?: string,
     *   tag?: string,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[name], filter[status], filter[resource_id], filter[sip_username]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return DefaultPagination<TelephonyCredential>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete an existing credential.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Create an Access Token (JWT) for the credential.
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function createToken(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createToken($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
