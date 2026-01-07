<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams\Document;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentListResponse;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Portouts\SupportingDocumentsRawContract;

/**
 * @phpstan-import-type DocumentShape from \Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams\Document
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SupportingDocumentsRawService implements SupportingDocumentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a list of supporting documents on a portout request.
     *
     * @param string $id Portout id
     * @param array{
     *   documents?: list<Document|DocumentShape>
     * }|SupportingDocumentCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SupportingDocumentNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|SupportingDocumentCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SupportingDocumentCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['portouts/%1$s/supporting_documents', $id],
            body: (object) $parsed,
            options: $options,
            convert: SupportingDocumentNewResponse::class,
        );
    }

    /**
     * @api
     *
     * List every supporting documents for a portout request.
     *
     * @param string $id Portout id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SupportingDocumentListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['portouts/%1$s/supporting_documents', $id],
            options: $requestOptions,
            convert: SupportingDocumentListResponse::class,
        );
    }
}
