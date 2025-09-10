<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams\Document;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentListResponse;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Portouts\SupportingDocumentsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param list<Document> $documents List of supporting documents parameters
     */
    public function create(
        string $id,
        $documents = omit,
        ?RequestOptions $requestOptions = null
    ): SupportingDocumentNewResponse {
        [$parsed, $options] = SupportingDocumentCreateParams::parseRequest(
            ['documents' => $documents],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
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
     */
    public function list(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SupportingDocumentListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['portouts/%1$s/supporting_documents', $id],
            options: $requestOptions,
            convert: SupportingDocumentListResponse::class,
        );
    }
}
