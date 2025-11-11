<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse;
use Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPUsageContract;

final class GlobalIPUsageService implements GlobalIPUsageContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Global IP Usage Metrics
     *
     * @param array{
     *   filter?: array{global_ip_id?: string|array{in?: string}}
     * }|GlobalIPUsageRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        array|GlobalIPUsageRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): GlobalIPUsageGetResponse {
        [$parsed, $options] = GlobalIPUsageRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'global_ip_usage',
            query: $parsed,
            options: $options,
            convert: GlobalIPUsageGetResponse::class,
        );
    }
}
