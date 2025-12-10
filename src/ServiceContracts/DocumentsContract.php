<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Documents\DocServiceDocument;
use Telnyx\Documents\DocumentDeleteResponse;
use Telnyx\Documents\DocumentGenerateDownloadLinkResponse;
use Telnyx\Documents\DocumentGetResponse;
use Telnyx\Documents\DocumentListParams\Sort;
use Telnyx\Documents\DocumentUpdateResponse;
use Telnyx\Documents\DocumentUploadJsonResponse;
use Telnyx\Documents\DocumentUploadResponse;
use Telnyx\RequestOptions;

interface DocumentsContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
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
     * @param string $documentID identifies the resource
     * @param string $customerReference optional reference string for customer tracking
     * @param string $filename the filename of the document
     *
     * @throws APIException
     */
    public function update(
        string $documentID,
        ?string $customerReference = null,
        ?string $filename = null,
        ?RequestOptions $requestOptions = null,
    ): DocumentUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   createdAt?: array{
     *     gt?: string|\DateTimeInterface, lt?: string|\DateTimeInterface
     *   },
     *   customerReference?: array{eq?: string, in?: list<string>},
     *   filename?: array{contains?: string},
     * } $filter Consolidated filter parameter for documents (deepObject style). Originally: filter[filename][contains], filter[customer_reference][eq], filter[customer_reference][in][], filter[created_at][gt], filter[created_at][lt]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param list<'filename'|'created_at'|'updated_at'|'-filename'|'-created_at'|'-updated_at'|Sort> $sort Consolidated sort parameter for documents (deepObject style). Originally: sort[]
     *
     * @return DefaultPagination<DocServiceDocument>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?array $sort = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
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
     * @param string $id identifies the resource
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
     * @param string $id Uniquely identifies the document
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
     * @param array{
     *   customerReference?: string, file?: string, filename?: string, url?: string
     * } $document
     *
     * @throws APIException
     */
    public function upload(
        array $document,
        ?RequestOptions $requestOptions = null
    ): DocumentUploadResponse;

    /**
     * @api
     *
     * @param array{
     *   customerReference?: string, file?: string, filename?: string, url?: string
     * } $document
     *
     * @throws APIException
     */
    public function uploadJson(
        array $document,
        ?RequestOptions $requestOptions = null
    ): DocumentUploadJsonResponse;
}
