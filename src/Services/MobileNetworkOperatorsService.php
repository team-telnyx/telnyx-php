<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobileNetworkOperatorsContract;

final class MobileNetworkOperatorsService implements MobileNetworkOperatorsContract
{
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
     *     country_code?: string,
     *     mcc?: string,
     *     mnc?: string,
     *     name?: array{contains?: string, ends_with?: string, starts_with?: string},
     *     network_preferences_enabled?: bool,
     *     tadig?: string,
     *   },
     *   page?: array{number?: int, size?: int},
     * }|MobileNetworkOperatorListParams $params
     *
     * @return DefaultPagination<MobileNetworkOperatorListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|MobileNetworkOperatorListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination {
        [$parsed, $options] = MobileNetworkOperatorListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
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
