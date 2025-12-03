<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\ExternalConnections;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
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

interface UploadsContract
{
    /**
     * @api
     *
     * @param array<mixed>|UploadCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|UploadCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): UploadNewResponse;

    /**
     * @api
     *
     * @param array<mixed>|UploadRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $ticketID,
        array|UploadRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): UploadGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|UploadListParams $params
     *
     * @return DefaultPagination<Upload>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        array|UploadListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function pendingCount(
        string $id,
        ?RequestOptions $requestOptions = null
    ): UploadPendingCountResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function refreshStatus(
        string $id,
        ?RequestOptions $requestOptions = null
    ): UploadRefreshStatusResponse;

    /**
     * @api
     *
     * @param array<mixed>|UploadRetryParams $params
     *
     * @throws APIException
     */
    public function retry(
        string $ticketID,
        array|UploadRetryParams $params,
        ?RequestOptions $requestOptions = null,
    ): UploadRetryResponse;
}
