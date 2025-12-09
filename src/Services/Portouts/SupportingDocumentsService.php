<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams\Document\Type;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentListResponse;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Portouts\SupportingDocumentsContract;

final class SupportingDocumentsService implements SupportingDocumentsContract
{
    /**
     * @api
     */
    public SupportingDocumentsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SupportingDocumentsRawService($client);
    }

    /**
     * @api
     *
     * Creates a list of supporting documents on a portout request.
     *
     * @param string $id Portout id
     * @param list<array{
     *   documentID: string, type: 'loa'|'invoice'|Type
     * }> $documents List of supporting documents parameters
     *
     * @throws APIException
     */
    public function create(
        string $id,
        ?array $documents = null,
        ?RequestOptions $requestOptions = null
    ): SupportingDocumentNewResponse {
        $params = ['documents' => $documents];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List every supporting documents for a portout request.
     *
     * @param string $id Portout id
     *
     * @throws APIException
     */
    public function list(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SupportingDocumentListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
