<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\RequestOptions;
use Telnyx\TelephonyCredentials\TelephonyCredentialDeleteResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialGetResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialListParams\Filter;
use Telnyx\TelephonyCredentials\TelephonyCredentialListParams\Page;
use Telnyx\TelephonyCredentials\TelephonyCredentialListResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialNewResponse;
use Telnyx\TelephonyCredentials\TelephonyCredentialUpdateResponse;

use const Telnyx\Core\OMIT as omit;

interface TelephonyCredentialsContract
{
    /**
     * @api
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
    ): TelephonyCredentialNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialGetResponse;

    /**
     * @api
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
    ): TelephonyCredentialUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[name], filter[status], filter[resource_id], filter[sip_username]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialListResponse;

    /**
     * @api
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): TelephonyCredentialDeleteResponse;

    /**
     * @api
     */
    public function createToken(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string;
}
