<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\DocumentLinks\DocumentLinkListParams\Filter;
use Telnyx\DocumentLinks\DocumentLinkListParams\Page;
use Telnyx\DocumentLinks\DocumentLinkListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface DocumentLinksContract
{
    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter for document links (deepObject style). Originally: filter[linked_record_type], filter[linked_resource_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return DocumentLinkListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): DocumentLinkListResponse;
}
