<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Documents\DocServiceDocument;
use Telnyx\Documents\DocumentDeleteResponse;
use Telnyx\Documents\DocumentGenerateDownloadLinkResponse;
use Telnyx\Documents\DocumentGetResponse;
use Telnyx\Documents\DocumentListParams;
use Telnyx\Documents\DocumentUpdateParams;
use Telnyx\Documents\DocumentUpdateResponse;
use Telnyx\Documents\DocumentUploadJsonParams;
use Telnyx\Documents\DocumentUploadJsonResponse;
use Telnyx\Documents\DocumentUploadParams;
use Telnyx\Documents\DocumentUploadResponse;
use Telnyx\RequestOptions;

interface DocumentsRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<DocumentGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $documentID identifies the resource
     * @param array<string,mixed>|DocumentUpdateParams $params
     *
     * @return BaseResponse<DocumentUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $documentID,
        array|DocumentUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DocumentListParams $params
     *
     * @return BaseResponse<DefaultPagination<DocServiceDocument>>
     *
     * @throws APIException
     */
    public function list(
        array|DocumentListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<DocumentDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function download(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the document
     *
     * @return BaseResponse<DocumentGenerateDownloadLinkResponse>
     *
     * @throws APIException
     */
    public function generateDownloadLink(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DocumentUploadParams $params
     *
     * @return BaseResponse<DocumentUploadResponse>
     *
     * @throws APIException
     */
    public function upload(
        array|DocumentUploadParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DocumentUploadJsonParams $params
     *
     * @return BaseResponse<DocumentUploadJsonResponse>
     *
     * @throws APIException
     */
    public function uploadJson(
        array|DocumentUploadJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
