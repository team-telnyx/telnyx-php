<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enum\EnumGetResponse;
use Telnyx\Enum\EnumRetrieveParams\Endpoint;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EnumRawContract;

final class EnumRawService implements EnumRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get Enum
     *
     * @param Endpoint|value-of<Endpoint> $endpoint
     *
     * @return BaseResponse<mixed|list<mixed|string>>
     *
     * @throws APIException
     */
    public function retrieve(
        Endpoint|string $endpoint,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/enum/%1$s', $endpoint],
            options: $requestOptions,
            convert: EnumGetResponse::class,
        );
    }
}
