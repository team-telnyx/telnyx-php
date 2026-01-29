<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\ExternalConnections\Uploads\Upload;
use Telnyx\ExternalConnections\Uploads\UploadCreateParams;
use Telnyx\ExternalConnections\Uploads\UploadGetResponse;
use Telnyx\ExternalConnections\Uploads\UploadListParams;
use Telnyx\ExternalConnections\Uploads\UploadNewResponse;
use Telnyx\ExternalConnections\Uploads\UploadPendingCountResponse;
use Telnyx\ExternalConnections\Uploads\UploadRefreshStatusResponse;
use Telnyx\ExternalConnections\Uploads\UploadRetrieveParams;
use Telnyx\ExternalConnections\Uploads\UploadRetryParams;
use Telnyx\ExternalConnections\Uploads\UploadRetryResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface UploadsRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array<string,mixed>|UploadCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UploadNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|UploadCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $ticketID Identifies an Upload request
     * @param array<string,mixed>|UploadRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UploadGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $ticketID,
        array|UploadRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array<string,mixed>|UploadListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Upload>>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|UploadListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UploadPendingCountResponse>
     *
     * @throws APIException
     */
    public function pendingCount(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UploadRefreshStatusResponse>
     *
     * @throws APIException
     */
    public function refreshStatus(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $ticketID Identifies an Upload request
     * @param array<string,mixed>|UploadRetryParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<UploadRetryResponse>
     *
     * @throws APIException
     */
    public function retry(
        string $ticketID,
        array|UploadRetryParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
