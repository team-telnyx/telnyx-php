<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\DocumentLinks\DocumentLinkListParams\Filter;
use Telnyx\DocumentLinks\DocumentLinkListParams\Page;
use Telnyx\DocumentLinks\DocumentLinkListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\DocumentLinks\DocumentLinkListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\DocumentLinks\DocumentLinkListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DocumentLinksContract
{
    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter for document links (deepObject style). Originally: filter[linked_record_type], filter[linked_resource_id]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<DocumentLinkListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;
}
