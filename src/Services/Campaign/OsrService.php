<?php

declare(strict_types=1);

namespace Telnyx\Services\Campaign;

use Telnyx\Client;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Core\Exceptions\APIException;
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
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function getAttributes(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): array {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['campaign/%1$s/osr/attributes', $campaignID],
            options: $requestOptions,
            convert: new MapOf('mixed'),
        );
    }
}
