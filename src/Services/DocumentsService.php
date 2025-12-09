<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
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
use Telnyx\ServiceContracts\DocumentsContract;

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
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
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
     *
     * @throws APIException
     */
    public function update(
        string $documentID,
        ?string $customerReference = null,
        ?string $filename = null,
        ?RequestOptions $requestOptions = null,
    ): DocumentUpdateResponse {
        $params = [
            'customerReference' => $customerReference, 'filename' => $filename,
        ];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($documentID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all documents ordered by created_at descending.
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
    ): DefaultPagination {
        $params = ['filter' => $filter, 'page' => $page, 'sort' => $sort];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

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
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
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
     *
     * @throws APIException
     */
    public function download(
        string $id,
        ?RequestOptions $requestOptions = null
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
     *
     * @throws APIException
     */
    public function generateDownloadLink(
        string $id,
        ?RequestOptions $requestOptions = null
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
     * @param array<string,mixed> $document
     *
     * @throws APIException
     */
    public function upload(
        array $document,
        ?RequestOptions $requestOptions = null
    ): DocumentUploadResponse {
        $params = ['document' => $document];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->upload(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Upload a document.<br /><br />Uploaded files must be linked to a service within 30 minutes or they will be automatically deleted.
     *
     * @param array<string,mixed> $document
     *
     * @throws APIException
     */
    public function uploadJson(
        array $document,
        ?RequestOptions $requestOptions = null
    ): DocumentUploadJsonResponse {
        $params = ['document' => $document];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->uploadJson(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
