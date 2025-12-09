<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Documents\DocumentDeleteResponse;
use Telnyx\Documents\DocumentGenerateDownloadLinkResponse;
use Telnyx\Documents\DocumentGetResponse;
use Telnyx\Documents\DocumentListParams;
use Telnyx\Documents\DocumentListParams\Sort;
use Telnyx\Documents\DocumentListResponse;
use Telnyx\Documents\DocumentUpdateParams;
use Telnyx\Documents\DocumentUpdateResponse;
use Telnyx\Documents\DocumentUploadJsonParams;
use Telnyx\Documents\DocumentUploadJsonResponse;
use Telnyx\Documents\DocumentUploadParams;
use Telnyx\Documents\DocumentUploadResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DocumentsContract;

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
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DocumentGetResponse {
        /** @var BaseResponse<DocumentGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['documents/%1$s', $id],
            options: $requestOptions,
            convert: DocumentGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a document.
     *
     * @param array{
     *   customerReference?: string, filename?: string
     * }|DocumentUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|DocumentUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): DocumentUpdateResponse {
        [$parsed, $options] = DocumentUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<DocumentUpdateResponse> */
        $response = $this->client->request(
            method: 'patch',
            path: ['documents/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: DocumentUpdateResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * List all documents ordered by created_at descending.
     *
     * @param array{
     *   filter?: array{
     *     createdAt?: array{
     *       gt?: string|\DateTimeInterface, lt?: string|\DateTimeInterface
     *     },
     *     customerReference?: array{eq?: string, in?: list<string>},
     *     filename?: array{contains?: string},
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: list<'filename'|'created_at'|'updated_at'|'-filename'|'-created_at'|'-updated_at'|Sort>,
     * }|DocumentListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|DocumentListParams $params,
        ?RequestOptions $requestOptions = null
    ): DocumentListResponse {
        [$parsed, $options] = DocumentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<DocumentListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'documents',
            query: $parsed,
            options: $options,
            convert: DocumentListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a document.<br /><br />A document can only be deleted if it's not linked to a service. If it is linked to a service, it must be unlinked prior to deleting.
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DocumentDeleteResponse {
        /** @var BaseResponse<DocumentDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['documents/%1$s', $id],
            options: $requestOptions,
            convert: DocumentDeleteResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Download a document.
     *
     * @throws APIException
     */
    public function download(
        string $id,
        ?RequestOptions $requestOptions = null
    ): string {
        /** @var BaseResponse<string> */
        $response = $this->client->request(
            method: 'get',
            path: ['documents/%1$s/download', $id],
            headers: ['Accept' => '*'],
            options: $requestOptions,
            convert: 'string',
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Generates a temporary pre-signed URL that can be used to download the document directly from the storage backend without authentication.
     *
     * @throws APIException
     */
    public function generateDownloadLink(
        string $id,
        ?RequestOptions $requestOptions = null
    ): DocumentGenerateDownloadLinkResponse {
        /** @var BaseResponse<DocumentGenerateDownloadLinkResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['documents/%1$s/download_link', $id],
            options: $requestOptions,
            convert: DocumentGenerateDownloadLinkResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Upload a document.<br /><br />Uploaded files must be linked to a service within 30 minutes or they will be automatically deleted.
     *
     * @param array{
     *   url: string, customerReference?: string, filename?: string, file: string
     * }|DocumentUploadParams $params
     *
     * @throws APIException
     */
    public function upload(
        array|DocumentUploadParams $params,
        ?RequestOptions $requestOptions = null
    ): DocumentUploadResponse {
        [$parsed, $options] = DocumentUploadParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<DocumentUploadResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'documents?content-type=multipart',
            body: (object) $parsed,
            options: $options,
            convert: DocumentUploadResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Upload a document.<br /><br />Uploaded files must be linked to a service within 30 minutes or they will be automatically deleted.
     *
     * @param array{
     *   url: string, customerReference?: string, filename?: string, file: string
     * }|DocumentUploadJsonParams $params
     *
     * @throws APIException
     */
    public function uploadJson(
        array|DocumentUploadJsonParams $params,
        ?RequestOptions $requestOptions = null,
    ): DocumentUploadJsonResponse {
        [$parsed, $options] = DocumentUploadJsonParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<DocumentUploadJsonResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'documents',
            body: (object) $parsed,
            options: $options,
            convert: DocumentUploadJsonResponse::class,
        );

        return $response->parse();
    }
}
