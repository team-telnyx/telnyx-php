<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest\CreateAndroidPushCredentialRequest;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest\CreateIosPushCredentialRequest;
use Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Filter;
use Telnyx\MobilePushCredentials\PushCredential;
use Telnyx\MobilePushCredentials\PushCredentialResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type CreateMobilePushCredentialRequestShape from \Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest
 * @phpstan-import-type FilterShape from \Telnyx\MobilePushCredentials\MobilePushCredentialListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MobilePushCredentialsContract
{
    /**
     * @api
     *
     * @param CreateMobilePushCredentialRequestShape $createMobilePushCredentialRequest
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        CreateIosPushCredentialRequest|array|CreateAndroidPushCredentialRequest $createMobilePushCredentialRequest,
        RequestOptions|array|null $requestOptions = null,
    ): PushCredentialResponse;

    /**
     * @api
     *
     * @param string $pushCredentialID The unique identifier of a mobile push credential
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $pushCredentialID,
        RequestOptions|array|null $requestOptions = null
    ): PushCredentialResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[type], filter[alias]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<PushCredential>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $pushCredentialID The unique identifier of a mobile push credential
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $pushCredentialID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
