<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\TelephonyCredentials\TelephonyCredential;
use Telnyx\TelephonyCredentials\TelephonyCredentialDeleteResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialGetResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialListParams\Filter;
use Telnyx\TelephonyCredentials\TelephonyCredentialListParams\Page;
use Telnyx\TelephonyCredentials\TelephonyCredentialNewResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialUpdateResponse;

/**
 * @phpstan-import-type FilterShape from \Telnyx\TelephonyCredentials\TelephonyCredentialListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\TelephonyCredentials\TelephonyCredentialListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TelephonyCredentialsContract
{
    /**
     * @api
     *
     * @param string $connectionID identifies the Credential Connection this credential is associated with
     * @param string $expiresAt ISO-8601 formatted date indicating when the credential will expire
     * @param string $tag Tags a credential. A single tag can hold at maximum 1000 credentials.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $connectionID,
        ?string $expiresAt = null,
        ?string $name = null,
        ?string $tag = null,
        RequestOptions|array|null $requestOptions = null,
    ): TelephonyCredentialNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TelephonyCredentialGetResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param string $connectionID identifies the Credential Connection this credential is associated with
     * @param string $expiresAt ISO-8601 formatted date indicating when the credential will expire
     * @param string $tag Tags a credential. A single tag can hold at maximum 1000 credentials.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $connectionID = null,
        ?string $expiresAt = null,
        ?string $name = null,
        ?string $tag = null,
        RequestOptions|array|null $requestOptions = null,
    ): TelephonyCredentialUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[name], filter[status], filter[resource_id], filter[sip_username]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<TelephonyCredential>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TelephonyCredentialDeleteResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createToken(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): string;
}
