<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DocumentsRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DocumentGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $documentID identifies the resource
     * @param array<string,mixed>|DocumentUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DocumentUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $documentID,
        array|DocumentUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DocumentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<DocServiceDocument>>
     *
     * @throws APIException
     */
    public function list(
        array|DocumentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DocumentDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function download(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the document
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DocumentGenerateDownloadLinkResponse>
     *
     * @throws APIException
     */
    public function generateDownloadLink(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DocumentUploadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DocumentUploadResponse>
     *
     * @throws APIException
     */
    public function upload(
        array|DocumentUploadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DocumentUploadJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DocumentUploadJsonResponse>
     *
     * @throws APIException
     */
    public function uploadJson(
        array|DocumentUploadJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
