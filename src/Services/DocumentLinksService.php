<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\DocumentLinks\DocumentLinkListParams;
use Telnyx\DocumentLinks\DocumentLinkListParams\Filter;
use Telnyx\DocumentLinks\DocumentLinkListParams\Page;
use Telnyx\DocumentLinks\DocumentLinkListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DocumentLinksContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param Filter $filter Consolidated filter parameter for document links (deepObject style). Originally: filter[linked_record_type], filter[linked_resource_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): DocumentLinkListResponse {
        [$parsed, $options] = DocumentLinkListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'document_links',
            query: $parsed,
            options: $options,
            convert: DocumentLinkListResponse::class,
        );
    }
}
