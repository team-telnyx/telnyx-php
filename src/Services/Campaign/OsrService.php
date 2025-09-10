<?php

declare(strict_types=1);

namespace Telnyx\Services\Campaign;

use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Campaign\OsrContract;

final class OsrService implements OsrContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get My Osr Campaign Attributes
     */
    public function getAttributes(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['campaign/%1$s/osr/attributes', $campaignID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }
}
