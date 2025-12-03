<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DocumentLinks\DocumentLinkListParams;
use Telnyx\DocumentLinks\DocumentLinkListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DocumentLinksContract;

final class DocumentLinksService implements DocumentLinksContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List all documents links ordered by created_at descending.
     *
     * @param array{
     *   filter?: array{linked_record_type?: string, linked_resource_id?: string},
     *   page?: array{number?: int, size?: int},
     * }|DocumentLinkListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|DocumentLinkListParams $params,
        ?RequestOptions $requestOptions = null
    ): DocumentLinkListResponse {
        [$parsed, $options] = DocumentLinkListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'document_links',
            query: $parsed,
            options: $options,
            convert: DocumentLinkListResponse::class,
        );
    }
}
