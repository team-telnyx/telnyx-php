<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MessagingURLDomains\MessagingURLDomainListParams;
use Telnyx\MessagingURLDomains\MessagingURLDomainListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingURLDomainsContract;

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
     * @param array{
     *   page?: array{number?: int, size?: int}
     * }|MessagingURLDomainListParams $params
     *
     * @return DefaultPagination<MessagingURLDomainListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingURLDomainListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = MessagingURLDomainListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'messaging_url_domains',
            query: $parsed,
            options: $options,
            convert: MessagingURLDomainListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
