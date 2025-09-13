<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Documents\DocumentDeleteResponse;
use Telnyx\Documents\DocumentGenerateDownloadLinkResponse;
use Telnyx\Documents\DocumentGetResponse;
use Telnyx\Documents\DocumentListParams;
use Telnyx\Documents\DocumentListParams\Filter;
use Telnyx\Documents\DocumentListParams\Page;
use Telnyx\Documents\DocumentListParams\Sort;
use Telnyx\Documents\DocumentListResponse;
use Telnyx\Documents\DocumentUpdateParams;
use Telnyx\Documents\DocumentUpdateResponse;
use Telnyx\Documents\DocumentUploadParams;
use Telnyx\Documents\DocumentUploadResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DocumentsContract;

use const Telnyx\Core\OMIT as omit;

final class DocumentsService implements DocumentsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a document.
     *
     * @return DocumentGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DocumentGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['documents/%1$s', $id],
            options: $requestOptions,
            convert: DocumentGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a document.
     *
     * @param string $customerReference optional reference string for customer tracking
     * @param string $filename the filename of the document
     *
     * @return DocumentUpdateResponse<HasRawResponse>
     */
    public function update(
        string $id,
        $customerReference = omit,
        $filename = omit,
        ?RequestOptions $requestOptions = null,
    ): DocumentUpdateResponse {
        [$parsed, $options] = DocumentUpdateParams::parseRequest(
            ['customerReference' => $customerReference, 'filename' => $filename],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'patch',
            path: ['documents/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: DocumentUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * List all documents ordered by created_at descending.
     *
     * @param Filter $filter Consolidated filter parameter for documents (deepObject style). Originally: filter[filename][contains], filter[customer_reference][eq], filter[customer_reference][in][], filter[created_at][gt], filter[created_at][lt]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param list<Sort|value-of<Sort>> $sort Consolidated sort parameter for documents (deepObject style). Originally: sort[]
     *
     * @return DocumentListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): DocumentListResponse {
        [$parsed, $options] = DocumentListParams::parseRequest(
            ['filter' => $filter, 'page' => $page, 'sort' => $sort],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'documents',
            query: $parsed,
            options: $options,
            convert: DocumentListResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a document.<br /><br />A document can only be deleted if it's not linked to a service. If it is linked to a service, it must be unlinked prior to deleting.
     *
     * @return DocumentDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DocumentDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['documents/%1$s', $id],
            options: $requestOptions,
            convert: DocumentDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Download a document.
     */
    public function download(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['documents/%1$s/download', $id],
            headers: ['Accept' => '*'],
            options: $requestOptions,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Generates a temporary pre-signed URL that can be used to download the document directly from the storage backend without authentication.
     *
     * @return DocumentGenerateDownloadLinkResponse<HasRawResponse>
     */
    public function generateDownloadLink(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DocumentGenerateDownloadLinkResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['documents/%1$s/download_link', $id],
            options: $requestOptions,
            convert: DocumentGenerateDownloadLinkResponse::class,
        );
    }

    /**
     * @api
     *
     * Upload a document.<br /><br />Uploaded files must be linked to a service within 30 minutes or they will be automatically deleted.
     *
     * @param string $url if the file is already hosted publicly, you can provide a URL and have the documents service fetch it for you
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $filename the filename of the document
     * @param string $file the Base64 encoded contents of the file you are uploading
     *
     * @return DocumentUploadResponse<HasRawResponse>
     */
    public function upload(
        $url,
        $customerReference = omit,
        $filename = omit,
        $file,
        ?RequestOptions $requestOptions = null,
    ): DocumentUploadResponse {
        [$parsed, $options] = DocumentUploadParams::parseRequest(
            [
                'url' => $url,
                'customerReference' => $customerReference,
                'filename' => $filename,
                'file' => $file,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'documents',
            body: (object) $parsed,
            options: $options,
            convert: DocumentUploadResponse::class,
        );
    }
}
