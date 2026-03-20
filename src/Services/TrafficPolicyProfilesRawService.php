<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TrafficPolicyProfilesRawContract;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileCreateParams;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileCreateParams\LimitBwKbps;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileCreateParams\Type;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileDeleteResponse;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileGetResponse;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListParams;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListParams\FilterType;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListParams\Sort;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListResponse;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListServicesParams;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListServicesResponse;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileNewResponse;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileUpdateParams;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileUpdateResponse;

/**
 * Traffic Policy Profiles operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TrafficPolicyProfilesRawService implements TrafficPolicyProfilesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new traffic policy profile. At least one of `services`, `ip_ranges`, or `domains` must be provided.
     *
     * @param array{
     *   type: Type|value-of<Type>,
     *   domains?: list<string>,
     *   ipRanges?: list<string>,
     *   limitBwKbps?: LimitBwKbps|value-of<LimitBwKbps>,
     *   services?: list<string>,
     * }|TrafficPolicyProfileCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrafficPolicyProfileNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TrafficPolicyProfileCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrafficPolicyProfileCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'traffic_policy_profiles',
            body: (object) $parsed,
            options: $options,
            convert: TrafficPolicyProfileNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns the details regarding a specific traffic policy profile.
     *
     * @param string $id identifies the traffic policy profile
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrafficPolicyProfileGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['traffic_policy_profiles/%1$s', $id],
            options: $requestOptions,
            convert: TrafficPolicyProfileGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates a traffic policy profile.
     *
     * @param string $id identifies the traffic policy profile
     * @param array{
     *   domains?: list<string>,
     *   ipRanges?: list<string>,
     *   limitBwKbps?: TrafficPolicyProfileUpdateParams\LimitBwKbps|value-of<TrafficPolicyProfileUpdateParams\LimitBwKbps>|null,
     *   services?: list<string>,
     *   type?: TrafficPolicyProfileUpdateParams\Type|value-of<TrafficPolicyProfileUpdateParams\Type>,
     * }|TrafficPolicyProfileUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrafficPolicyProfileUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TrafficPolicyProfileUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrafficPolicyProfileUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['traffic_policy_profiles/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: TrafficPolicyProfileUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all traffic policy profiles belonging to the user that match the given filters.
     *
     * @param array{
     *   filterService?: string,
     *   filterType?: FilterType|value-of<FilterType>,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   sort?: Sort|value-of<Sort>,
     * }|TrafficPolicyProfileListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TrafficPolicyProfileListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|TrafficPolicyProfileListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrafficPolicyProfileListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'traffic_policy_profiles',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterService' => 'filter[service]',
                    'filterType' => 'filter[type]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: TrafficPolicyProfileListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes the traffic policy profile.
     *
     * @param string $id identifies the traffic policy profile
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrafficPolicyProfileDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['traffic_policy_profiles/%1$s', $id],
            options: $requestOptions,
            convert: TrafficPolicyProfileDeleteResponse::class,
        );
    }

    /**
     * @api
     *
     * Get all available PCEF services that can be used in traffic policy profiles.
     *
     * @param array{
     *   filterGroup?: string, filterName?: string, pageNumber?: int, pageSize?: int
     * }|TrafficPolicyProfileListServicesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TrafficPolicyProfileListServicesResponse,>,>
     *
     * @throws APIException
     */
    public function listServices(
        array|TrafficPolicyProfileListServicesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TrafficPolicyProfileListServicesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'traffic_policy_profiles/services',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterGroup' => 'filter[group]',
                    'filterName' => 'filter[name]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: TrafficPolicyProfileListServicesResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
