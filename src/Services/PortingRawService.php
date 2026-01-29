<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Porting\PortingListUkCarriersResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\PortingRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PortingRawService implements PortingRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List available carriers in the UK.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortingListUkCarriersResponse>
     *
     * @throws APIException
     */
    public function listUkCarriers(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'porting/uk_carriers',
            options: $requestOptions,
            convert: PortingListUkCarriersResponse::class,
        );
    }
}
