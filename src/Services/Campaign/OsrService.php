<?php

declare(strict_types=1);

namespace Telnyx\Services\Campaign;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
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
        /** @var BaseResponse<array<string,mixed>> */
        $response = $this->client->request(
            method: 'get',
            path: ['10dlc/campaign/%1$s/osr/attributes', $campaignID],
            options: $requestOptions,
            convert: new MapOf('mixed'),
        );

        return $response->parse();
    }
}
