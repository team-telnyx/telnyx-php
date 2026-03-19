<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\TrafficPolicyProfilesContract;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfile;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileCreateParams\LimitBwKbps;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileCreateParams\Type;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileDeleteResponse;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileGetResponse;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListParams\FilterType;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListParams\Sort;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListServicesResponse;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileNewResponse;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileUpdateResponse;

/**
 * Traffic Policy Profiles operations.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TrafficPolicyProfilesService implements TrafficPolicyProfilesContract
{
    /**
     * @api
     */
    public TrafficPolicyProfilesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TrafficPolicyProfilesRawService($client);
    }

    /**
     * @api
     *
     * Create a new traffic policy profile. At least one of `services`, `ip_ranges`, or `domains` must be provided.
     *
     * @param Type|value-of<Type> $type the type of the traffic policy profile
     * @param list<string> $domains array of domain names
     * @param list<string> $ipRanges array of IP ranges in CIDR notation
     * @param LimitBwKbps|value-of<LimitBwKbps> $limitBwKbps Bandwidth limit in kbps. Must be 512 or 1024.
     * @param list<string> $services array of PCEF service IDs to include in the profile
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Type|string $type,
        ?array $domains = null,
        ?array $ipRanges = null,
        LimitBwKbps|int|null $limitBwKbps = null,
        ?array $services = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrafficPolicyProfileNewResponse {
        $params = Util::removeNulls(
            [
                'type' => $type,
                'domains' => $domains,
                'ipRanges' => $ipRanges,
                'limitBwKbps' => $limitBwKbps,
                'services' => $services,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns the details regarding a specific traffic policy profile.
     *
     * @param string $id identifies the traffic policy profile
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TrafficPolicyProfileGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Updates a traffic policy profile.
     *
     * @param string $id identifies the traffic policy profile
     * @param list<string> $domains array of domain names
     * @param list<string> $ipRanges array of IP ranges in CIDR notation
     * @param \Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileUpdateParams\LimitBwKbps|value-of<\Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileUpdateParams\LimitBwKbps>|null $limitBwKbps Bandwidth limit in kbps. Must be 512 or 1024, or null to remove.
     * @param list<string> $services array of PCEF service IDs to include in the profile
     * @param \Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileUpdateParams\Type|value-of<\Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileUpdateParams\Type> $type the type of the traffic policy profile
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?array $domains = null,
        ?array $ipRanges = null,
        \Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileUpdateParams\LimitBwKbps|int|null $limitBwKbps = null,
        ?array $services = null,
        \Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileUpdateParams\Type|string|null $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): TrafficPolicyProfileUpdateResponse {
        $params = Util::removeNulls(
            [
                'domains' => $domains,
                'ipRanges' => $ipRanges,
                'limitBwKbps' => $limitBwKbps,
                'services' => $services,
                'type' => $type,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all traffic policy profiles belonging to the user that match the given filters.
     *
     * @param string $filterService filter by service ID
     * @param FilterType|value-of<FilterType> $filterType filter by traffic policy profile type
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     * @param Sort|value-of<Sort> $sort Sorts traffic policy profiles by the given field. Defaults to ascending order unless field is prefixed with a minus sign.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<TrafficPolicyProfile>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterService = null,
        FilterType|string|null $filterType = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterService' => $filterService,
                'filterType' => $filterType,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'sort' => $sort,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes the traffic policy profile.
     *
     * @param string $id identifies the traffic policy profile
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): TrafficPolicyProfileDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get all available PCEF services that can be used in traffic policy profiles.
     *
     * @param string $filterGroup filter services by group
     * @param string $filterName filter services by name
     * @param int $pageNumber the page number to load
     * @param int $pageSize the size of the page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<TrafficPolicyProfileListServicesResponse>
     *
     * @throws APIException
     */
    public function listServices(
        ?string $filterGroup = null,
        ?string $filterName = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterGroup' => $filterGroup,
                'filterName' => $filterName,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listServices(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
