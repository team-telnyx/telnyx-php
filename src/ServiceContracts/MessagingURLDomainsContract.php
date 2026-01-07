<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MessagingURLDomains\MessagingURLDomainListParams\Page;
use Telnyx\MessagingURLDomains\MessagingURLDomainListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type PageShape from \Telnyx\MessagingURLDomains\MessagingURLDomainListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingURLDomainsContract
{
    /**
     * @api
     *
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<MessagingURLDomainListResponse>
     *
     * @throws APIException
     */
    public function list(
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null
    ): DefaultPagination;
}
