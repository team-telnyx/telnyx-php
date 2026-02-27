<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Documents\DocServiceDocument;
use Telnyx\Documents\DocumentDeleteResponse;
use Telnyx\Documents\DocumentGenerateDownloadLinkResponse;
use Telnyx\Documents\DocumentGetResponse;
use Telnyx\Documents\DocumentListParams;
use Telnyx\Documents\DocumentListParams\Filter;
use Telnyx\Documents\DocumentListParams\Sort;
use Telnyx\Documents\DocumentUpdateParams;
use Telnyx\Documents\DocumentUpdateResponse;
use Telnyx\Documents\DocumentUploadJsonParams;
use Telnyx\Documents\DocumentUploadJsonResponse;
use Telnyx\Documents\DocumentUploadParams;
use Telnyx\Documents\DocumentUploadParams\Document;
use Telnyx\Documents\DocumentUploadResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DocumentsRawContract;

/**
 * Documents.
 *
 * @phpstan-import-type FilterShape from \Telnyx\Documents\DocumentListParams\Filter
 * @phpstan-import-type DocumentShape from \Telnyx\Documents\DocumentUploadParams\Document
 * @phpstan-import-type DocumentShape from \Telnyx\Documents\DocumentUploadJsonParams\Document as DocumentShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DocumentsRawService implements DocumentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a document.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param string $documentID identifies the resource
     * @param array{
     *   customerReference?: string, filename?: string
     * }|DocumentUpdateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = DocumentUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['documents/%1$s', $documentID],
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
     * @param array{
     *   filter?: Filter|FilterShape,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: list<Sort|value-of<Sort>>,
     * }|DocumentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<DocServiceDocument>>
     *
     * @throws APIException
     */
    public function list(
        array|DocumentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DocumentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'documents',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: DocServiceDocument::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a document.<br /><br />A document can only be deleted if it's not linked to a service. If it is linked to a service, it must be unlinked prior to deleting.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['documents/%1$s/download', $id],
            headers: ['Accept' => 'application/octet-stream'],
            options: $requestOptions,
            convert: 'string',
        );
    }

    /**
     * @api
     *
     * Generates a temporary pre-signed URL that can be used to download the document directly from the storage backend without authentication.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param array{document: Document|DocumentShape}|DocumentUploadParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DocumentUploadResponse>
     *
     * @throws APIException
     */
    public function upload(
        array|DocumentUploadParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DocumentUploadParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'documents?content-type=multipart',
            body: (object) $parsed['document'],
            options: $options,
            convert: DocumentUploadResponse::class,
        );
    }

    /**
     * @api
     *
     * Upload a document.<br /><br />Uploaded files must be linked to a service within 30 minutes or they will be automatically deleted.
     *
     * @param array{
     *   document: DocumentUploadJsonParams\Document|DocumentShape1
     * }|DocumentUploadJsonParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DocumentUploadJsonResponse>
     *
     * @throws APIException
     */
    public function uploadJson(
        array|DocumentUploadJsonParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DocumentUploadJsonParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'documents',
            body: (object) $parsed['document'],
            options: $options,
            convert: DocumentUploadJsonResponse::class,
        );
    }
}
