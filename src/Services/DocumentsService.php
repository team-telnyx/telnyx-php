<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\Documents\DocServiceDocument;
use Telnyx\Documents\DocumentDeleteResponse;
use Telnyx\Documents\DocumentGenerateDownloadLinkResponse;
use Telnyx\Documents\DocumentGetResponse;
use Telnyx\Documents\DocumentListParams\Filter;
use Telnyx\Documents\DocumentListParams\Page;
use Telnyx\Documents\DocumentListParams\Sort;
use Telnyx\Documents\DocumentUpdateResponse;
use Telnyx\Documents\DocumentUploadJsonResponse;
use Telnyx\Documents\DocumentUploadParams\Document;
use Telnyx\Documents\DocumentUploadResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DocumentsContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\Documents\DocumentListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\Documents\DocumentListParams\Page
 * @phpstan-import-type DocumentShape from \Telnyx\Documents\DocumentUploadParams\Document
 * @phpstan-import-type DocumentShape from \Telnyx\Documents\DocumentUploadJsonParams\Document as DocumentShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DocumentsService implements DocumentsContract
{
    /**
     * @api
     */
    public DocumentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DocumentsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a document.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DocumentGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a document.
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
    ): DocumentUpdateResponse {
        $params = Util::removeNulls(
            ['customerReference' => $customerReference, 'filename' => $filename]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($documentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all documents ordered by created_at descending.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter for documents (deepObject style). Originally: filter[filename][contains], filter[customer_reference][eq], filter[customer_reference][in][], filter[created_at][gt], filter[created_at][lt]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param list<Sort|value-of<Sort>> $sort Consolidated sort parameter for documents (deepObject style). Originally: sort[]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<DocServiceDocument>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        ?array $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(
            ['filter' => $filter, 'page' => $page, 'sort' => $sort]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a document.<br /><br />A document can only be deleted if it's not linked to a service. If it is linked to a service, it must be unlinked prior to deleting.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DocumentDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Download a document.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function download(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->download($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Generates a temporary pre-signed URL that can be used to download the document directly from the storage backend without authentication.
     *
     * @param string $id Uniquely identifies the document
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function generateDownloadLink(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): DocumentGenerateDownloadLinkResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->generateDownloadLink($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Upload a document.<br /><br />Uploaded files must be linked to a service within 30 minutes or they will be automatically deleted.
     *
     * @param Document|DocumentShape $document
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function upload(
        Document|array $document,
        RequestOptions|array|null $requestOptions = null
    ): DocumentUploadResponse {
        $params = Util::removeNulls(['document' => $document]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upload(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Upload a document.<br /><br />Uploaded files must be linked to a service within 30 minutes or they will be automatically deleted.
     *
     * @param \Telnyx\Documents\DocumentUploadJsonParams\Document|DocumentShape1 $document
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function uploadJson(
        \Telnyx\Documents\DocumentUploadJsonParams\Document|array $document,
        RequestOptions|array|null $requestOptions = null,
    ): DocumentUploadJsonResponse {
        $params = Util::removeNulls(['document' => $document]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->uploadJson(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
