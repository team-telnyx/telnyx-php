<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentListResponse;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Portouts\SupportingDocumentsContract;

final class SupportingDocumentsService implements SupportingDocumentsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a list of supporting documents on a portout request.
     *
     * @param array{
     *   documents?: list<array{document_id: string, type: 'loa'|'invoice'}>
     * }|SupportingDocumentCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $id,
        array|SupportingDocumentCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SupportingDocumentNewResponse {
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
     * @throws APIException
     */
    public function list(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SupportingDocumentListResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['portouts/%1$s/supporting_documents', $id],
            options: $requestOptions,
            convert: SupportingDocumentListResponse::class,
        );
    }
}
