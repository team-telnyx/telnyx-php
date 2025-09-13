<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\MessagingURLDomains\MessagingURLDomainListParams\Page;
use Telnyx\MessagingURLDomains\MessagingURLDomainListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface MessagingURLDomainsContract
{
    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return MessagingURLDomainListResponse<HasRawResponse>
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): MessagingURLDomainListResponse;
}
