<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobileNetworkOperatorsRawContract;

final class MobileNetworkOperatorsRawService implements MobileNetworkOperatorsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Telnyx has a set of GSM mobile operators partners that are available through our mobile network roaming. This resource is entirely managed by Telnyx and may change over time. That means that this resource won't allow any write operations for it. Still, it's available so it can be used as a support resource that can be related to other resources or become a configuration option.
     *
     * @param array{
     *   filter?: array{
     *     countryCode?: string,
     *     mcc?: string,
     *     mnc?: string,
     *     name?: array{contains?: string, endsWith?: string, startsWith?: string},
     *     networkPreferencesEnabled?: bool,
     *     tadig?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|MobileNetworkOperatorListParams $params
     *
     * @return BaseResponse<DefaultPagination<MobileNetworkOperatorListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|MobileNetworkOperatorListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MobileNetworkOperatorListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'mobile_network_operators',
            query: $parsed,
            options: $options,
            convert: MobileNetworkOperatorListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
