<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Messaging10dlc\Messaging10dlcGetEnumParams\Endpoint;
use Telnyx\Messaging10dlc\Messaging10dlcGetEnumResponse;
use Telnyx\Messaging10dlc\Messaging10dlcGetEnumResponse\EnumPaginatedResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Messaging10dlcRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class Messaging10dlcRawService implements Messaging10dlcRawContract
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<string>|list<array<string,mixed>>|EnumPaginatedResponse|array<string,mixed>|array<string,mixed>,>
     *
     * @throws APIException
     */
    public function getEnum(
        Endpoint|string $endpoint,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['10dlc/enum/%1$s', $endpoint],
            options: $requestOptions,
            convert: Messaging10dlcGetEnumResponse::class,
        );
    }
}
