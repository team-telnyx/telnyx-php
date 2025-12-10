<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Filter\Type;
use Telnyx\MobilePushCredentials\PushCredential;
use Telnyx\MobilePushCredentials\PushCredentialResponse;
use Telnyx\RequestOptions;

interface MobilePushCredentialsContract
{
    /**
     * @api
     *
     * @param array<string,mixed> $createMobilePushCredentialRequest
     *
     * @throws APIException
     */
    public function create(
        array $createMobilePushCredentialRequest,
        ?RequestOptions $requestOptions = null,
    ): PushCredentialResponse;

    /**
     * @api
     *
     * @param string $pushCredentialID The unique identifier of a mobile push credential
     *
     * @throws APIException
     */
    public function retrieve(
        string $pushCredentialID,
        ?RequestOptions $requestOptions = null
    ): PushCredentialResponse;

    /**
     * @api
     *
     * @param array{
     *   alias?: string, type?: 'ios'|'android'|Type
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[type], filter[alias]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DefaultPagination<PushCredential>
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
     * @param string $pushCredentialID The unique identifier of a mobile push credential
     *
     * @throws APIException
     */
    public function delete(
        string $pushCredentialID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
