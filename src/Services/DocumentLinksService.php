<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\DocumentLinks\DocumentLinkListParams\Filter;
use Telnyx\DocumentLinks\DocumentLinkListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\DocumentLinksContract;

/**
 * Documents.
 *
 * @phpstan-import-type FilterShape from \Telnyx\DocumentLinks\DocumentLinkListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DocumentLinksService implements DocumentLinksContract
{
    /**
     * @api
     */
    public DocumentLinksRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DocumentLinksRawService($client);
    }

    /**
     * @api
     *
     * List all documents links ordered by created_at descending.
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter for document links (deepObject style). Originally: filter[linked_record_type], filter[linked_resource_id]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<DocumentLinkListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'filter' => $filter ?? Omitted::VALUE,
                'pageNumber' => $pageNumber ?? Omitted::VALUE,
                'pageSize' => $pageSize ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
