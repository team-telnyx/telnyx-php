<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse;
use Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams;
use Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams\Filter;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\GlobalIPUsageRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\GlobalIPUsage\GlobalIPUsageRetrieveParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class GlobalIPUsageRawService implements GlobalIPUsageRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Global IP Usage Metrics
     *
     * @param array{filter?: Filter|FilterShape}|GlobalIPUsageRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<GlobalIPUsageGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        array|GlobalIPUsageRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = GlobalIPUsageRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'global_ip_usage',
            query: $parsed,
            options: $options,
            convert: GlobalIPUsageGetResponse::class,
        );
    }
}
