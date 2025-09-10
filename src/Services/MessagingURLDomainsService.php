<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\MessagingURLDomains\MessagingURLDomainListParams;
use Telnyx\MessagingURLDomains\MessagingURLDomainListParams\Page;
use Telnyx\MessagingURLDomains\MessagingURLDomainListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingURLDomainsContract;

use const Telnyx\Core\OMIT as omit;

final class MessagingURLDomainsService implements MessagingURLDomainsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List messaging URL domains
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): MessagingURLDomainListResponse {
        [$parsed, $options] = MessagingURLDomainListParams::parseRequest(
            ['page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'messaging_url_domains',
            query: $parsed,
            options: $options,
            convert: MessagingURLDomainListResponse::class,
        );
    }
}
