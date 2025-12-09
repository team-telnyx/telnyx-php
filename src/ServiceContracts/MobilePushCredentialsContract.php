<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Filter\Type;
use Telnyx\MobilePushCredentials\MobilePushCredentialListResponse;
use Telnyx\MobilePushCredentials\PushCredentialResponse;
use Telnyx\RequestOptions;

interface MobilePushCredentialsContract
{
    /**
     * @api
     *
     * @param string $alias Alias to uniquely identify the credential
     * @param string $certificate Certificate as received from APNs
     * @param string $privateKey Corresponding private key to the certificate as received from APNs
     * @param 'android'|\Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\Type $type Type of mobile push credential. Should be <code>android</code> here
     * @param array<string,mixed> $projectAccountJsonFile Private key file in JSON format
     *
     * @throws APIException
     */
    public function create(
        string $alias,
        string $certificate,
        string $privateKey,
        string|\Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\Type $type,
        array $projectAccountJsonFile,
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
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): MobilePushCredentialListResponse;

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
