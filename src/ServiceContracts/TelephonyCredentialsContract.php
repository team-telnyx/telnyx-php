<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\TelephonyCredentials\TelephonyCredential;
use Telnyx\TelephonyCredentials\TelephonyCredentialDeleteResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialGetResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialNewResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialUpdateResponse;

interface TelephonyCredentialsContract
{
    /**
     * @api
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
    ): TelephonyCredentialNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialGetResponse;

    /**
     * @api
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
    ): TelephonyCredentialUpdateResponse;

    /**
     * @api
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
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialDeleteResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @throws APIException
     */
    public function createToken(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string;
}
