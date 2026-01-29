<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\MessagingURLDomains\MessagingURLDomainListParams\Page;
use Telnyx\MessagingURLDomains\MessagingURLDomainListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingURLDomainsContract;

/**
 * @phpstan-import-type PageShape from \Telnyx\MessagingURLDomains\MessagingURLDomainListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingURLDomainsService implements MessagingURLDomainsContract
{
    /**
     * @api
     */
    public MessagingURLDomainsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagingURLDomainsRawService($client);
    }

    /**
     * @api
     *
     * List messaging URL domains
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
    ): DefaultPagination {
        $params = Util::removeNulls(['page' => $page]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
