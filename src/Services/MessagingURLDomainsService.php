<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\MessagingURLDomains\MessagingURLDomainListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingURLDomainsContract;

/**
 * Messaging URL Domains.
 *
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
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MessagingURLDomainListResponse>
     *
     * @throws APIException
     */
    public function list(
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
