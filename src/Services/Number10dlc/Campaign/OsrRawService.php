<?php

declare(strict_types=1);

namespace Telnyx\Services\Number10dlc\Campaign;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Number10dlc\Campaign\OsrRawContract;

final class OsrRawService implements OsrRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get My Osr Campaign Attributes
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function retrieveAttributes(
        string $campaignID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/campaign/%1$s/osr/attributes', $campaignID],
            options: $requestOptions,
            convert: new MapOf('mixed'),
        );
    }
}
