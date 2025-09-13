<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\Type;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Filter;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Page;
use Telnyx\MobilePushCredentials\MobilePushCredentialListResponse;
use Telnyx\MobilePushCredentials\PushCredentialResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface MobilePushCredentialsContract
{
    /**
     * @api
     *
     * @param string $alias Alias to uniquely identify the credential
     * @param string $certificate Certificate as received from APNs
     * @param string $privateKey Corresponding private key to the certificate as received from APNs
     * @param Type|value-of<Type> $type Type of mobile push credential. Should be <code>android</code> here
     * @param array<string,
     * mixed,> $projectAccountJsonFile Private key file in JSON format
     *
     * @return PushCredentialResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $alias,
        $certificate,
        $privateKey,
        $type,
        $projectAccountJsonFile,
        ?RequestOptions $requestOptions = null,
    ): PushCredentialResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PushCredentialResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PushCredentialResponse;

    /**
     * @api
     *
     * @return PushCredentialResponse<HasRawResponse>
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
     * @return PushCredentialResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $pushCredentialID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): PushCredentialResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[type], filter[alias]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return MobilePushCredentialListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): MobilePushCredentialListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MobilePushCredentialListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MobilePushCredentialListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $pushCredentialID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $pushCredentialID,
        mixed $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
