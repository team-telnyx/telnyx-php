<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Documents\DocServiceDocument;
use Telnyx\Documents\DocumentDeleteResponse;
use Telnyx\Documents\DocumentGenerateDownloadLinkResponse;
use Telnyx\Documents\DocumentGetResponse;
use Telnyx\Documents\DocumentListParams\Filter;
use Telnyx\Documents\DocumentListParams\Sort;
use Telnyx\Documents\DocumentUpdateResponse;
use Telnyx\Documents\DocumentUploadJsonResponse;
use Telnyx\Documents\DocumentUploadParams\Document;
use Telnyx\Documents\DocumentUploadResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Documents\DocumentListParams\Filter
 * @phpstan-import-type DocumentShape from \Telnyx\Documents\DocumentUploadParams\Document
 * @phpstan-import-type DocumentShape from \Telnyx\Documents\DocumentUploadJsonParams\Document as DocumentShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DocumentsContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DocumentGetResponse;

    /**
     * @api
     *
     * @param string $documentID identifies the resource
     * @param string $customerReference optional reference string for customer tracking
     * @param string $filename the filename of the document
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $documentID,
        ?string $customerReference = null,
        ?string $filename = null,
        RequestOptions|array|null $requestOptions = null,
    ): DocumentUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter for documents (deepObject style). Originally: filter[filename][contains], filter[customer_reference][eq], filter[customer_reference][in][], filter[created_at][gt], filter[created_at][lt]
     * @param list<Sort|value-of<Sort>> $sort Consolidated sort parameter for documents (deepObject style). Originally: sort[]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<DocServiceDocument>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?array $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DocumentDeleteResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function download(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): string;

    /**
     * @api
     *
     * @param string $id Uniquely identifies the document
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function generateDownloadLink(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DocumentGenerateDownloadLinkResponse;

    /**
     * @api
     *
     * @param Document|DocumentShape $document
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upload(
        Document|array $document,
        RequestOptions|array|null $requestOptions = null
    ): DocumentUploadResponse;

    /**
     * @api
     *
     * @param \Telnyx\Documents\DocumentUploadJsonParams\Document|DocumentShape1 $document
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function uploadJson(
        \Telnyx\Documents\DocumentUploadJsonParams\Document|array $document,
        RequestOptions|array|null $requestOptions = null,
    ): DocumentUploadJsonResponse;
}
