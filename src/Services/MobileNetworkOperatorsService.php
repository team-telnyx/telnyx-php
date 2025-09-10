<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams\Filter;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListParams\Page;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobileNetworkOperatorsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param Filter $filter Consolidated filter parameter for mobile network operators (deepObject style). Originally: filter[name][starts_with], filter[name][contains], filter[name][ends_with], filter[country_code], filter[mcc], filter[mnc], filter[tadig], filter[network_preferences_enabled]
     * @param Page $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): MobileNetworkOperatorListResponse {
        [$parsed, $options] = MobileNetworkOperatorListParams::parseRequest(
            ['filter' => $filter, 'page' => $page],
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'mobile_network_operators',
            query: $parsed,
            options: $options,
            convert: MobileNetworkOperatorListResponse::class,
        );
    }
}
