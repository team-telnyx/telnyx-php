<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\MobileNetworkOperators\MobileNetworkOperatorListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MobileNetworkOperatorsContract;

final class MobileNetworkOperatorsService implements MobileNetworkOperatorsContract
{
    /**
     * @api
     */
    public MobileNetworkOperatorsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MobileNetworkOperatorsRawService($client);
    }

    /**
     * @api
     *
     * Telnyx has a set of GSM mobile operators partners that are available through our mobile network roaming. This resource is entirely managed by Telnyx and may change over time. That means that this resource won't allow any write operations for it. Still, it's available so it can be used as a support resource that can be related to other resources or become a configuration option.
     *
     * @param array{
     *   countryCode?: string,
     *   mcc?: string,
     *   mnc?: string,
     *   name?: array{contains?: string, endsWith?: string, startsWith?: string},
     *   networkPreferencesEnabled?: bool,
     *   tadig?: string,
     * } $filter Consolidated filter parameter for mobile network operators (deepObject style). Originally: filter[name][starts_with], filter[name][contains], filter[name][ends_with], filter[country_code], filter[mcc], filter[mnc], filter[tadig], filter[network_preferences_enabled]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated pagination parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): MobileNetworkOperatorListResponse {
        $params = ['filter' => $filter, 'page' => $page];
        // @phpstan-ignore-next-line function.impossibleType
        $params = array_filter($params, callback: static fn ($v) => !is_null($v));

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
