<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Enum\EnumGetResponse;
use Telnyx\Enum\EnumRetrieveParams\Endpoint;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EnumContract;

final class EnumService implements EnumContract
{
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
     * @return mixed|list<mixed|string>
     *
     * @throws APIException
     */
    public function retrieve(
        Endpoint|string $endpoint,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed|list<mixed|string>> */
        $response = $this->client->request(
            method: 'get',
            path: ['10dlc/enum/%1$s', $endpoint],
            options: $requestOptions,
            convert: EnumGetResponse::class,
        );

        return $response->parse();
    }
}
