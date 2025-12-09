<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Documents\DocumentDeleteResponse;
use Telnyx\Documents\DocumentGenerateDownloadLinkResponse;
use Telnyx\Documents\DocumentGetResponse;
use Telnyx\Documents\DocumentListParams;
use Telnyx\Documents\DocumentListResponse;
use Telnyx\Documents\DocumentUpdateParams;
use Telnyx\Documents\DocumentUpdateResponse;
use Telnyx\Documents\DocumentUploadJsonParams;
use Telnyx\Documents\DocumentUploadJsonResponse;
use Telnyx\Documents\DocumentUploadParams;
use Telnyx\Documents\DocumentUploadResponse;
use Telnyx\RequestOptions;

interface DocumentsContract
{
    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DocumentGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|DocumentUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|DocumentUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): DocumentUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|DocumentListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|DocumentListParams $params,
        ?RequestOptions $requestOptions = null
    ): DocumentListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DocumentDeleteResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function download(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @throws APIException
     */
    public function generateDownloadLink(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DocumentGenerateDownloadLinkResponse;

    /**
     * @api
     *
     * @param array<mixed>|DocumentUploadParams $params
     *
     * @throws APIException
     */
    public function upload(
        array|DocumentUploadParams $params,
        ?RequestOptions $requestOptions = null
    ): DocumentUploadResponse;

    /**
     * @api
     *
     * @param array<mixed>|DocumentUploadJsonParams $params
     *
     * @throws APIException
     */
    public function uploadJson(
        array|DocumentUploadJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): DocumentUploadJsonResponse;
}
