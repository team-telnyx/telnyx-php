<?php

declare(strict_types=1);

namespace Telnyx\Services\Portouts;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams\Document;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentListResponse;
use Telnyx\Portouts\SupportingDocuments\SupportingDocumentNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Portouts\SupportingDocumentsContract;

/**
 * Number portout operations.
 *
 * @phpstan-import-type DocumentShape from \Telnyx\Portouts\SupportingDocuments\SupportingDocumentCreateParams\Document
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param list<Document|DocumentShape> $documents List of supporting documents parameters
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $id,
        ?array $documents = null,
        RequestOptions|array|null $requestOptions = null,
    ): SupportingDocumentNewResponse {
        $params = Util::removeNulls(['documents' => $documents]);

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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SupportingDocumentListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
