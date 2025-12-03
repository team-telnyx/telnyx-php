<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
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
     * @param array{
     *   customer_reference?: string, filename?: string
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
     * @param array{
     *   filter?: array{
     *     created_at?: array{
     *       gt?: string|\DateTimeInterface, lt?: string|\DateTimeInterface
     *     },
     *     customer_reference?: array{eq?: string, in?: list<string>},
     *     filename?: array{contains?: string},
     *   },
     *   page?: array{number?: int, size?: int},
     *   sort?: list<'filename'|'created_at'|'updated_at'|'-filename'|'-created_at'|'-updated_at'>,
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
     * @throws APIException
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
     *
     * @throws APIException
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
     * @throws APIException
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
     * @throws APIException
     */
    public function upload(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): DocumentUploadResponse {
        [$parsed, $options] = DocumentUploadParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'documents?content-type=multipart',
            body: (object) $parsed,
            options: $options,
            convert: DocumentUploadResponse::class,
        );
    }

    /**
     * @api
     *
     * Upload a document.<br /><br />Uploaded files must be linked to a service within 30 minutes or they will be automatically deleted.
     *
     * @throws APIException
     */
    public function uploadJson(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): DocumentUploadJsonResponse {
        [$parsed, $options] = DocumentUploadJsonParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'documents',
            body: (object) $parsed,
            options: $options,
            convert: DocumentUploadJsonResponse::class,
        );
    }
}
