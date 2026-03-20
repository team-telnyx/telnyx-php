<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfile;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileCreateParams;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileDeleteResponse;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileGetResponse;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListParams;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListServicesParams;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileListServicesResponse;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileNewResponse;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileUpdateParams;
use Telnyx\TrafficPolicyProfiles\TrafficPolicyProfileUpdateResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TrafficPolicyProfilesRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TrafficPolicyProfileCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TrafficPolicyProfileNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TrafficPolicyProfileCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the traffic policy profile
     * @param array<string,mixed>|TrafficPolicyProfileUpdateParams $params
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TrafficPolicyProfileListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TrafficPolicyProfile>>
     *
     * @throws APIException
     */
    public function list(
        array|TrafficPolicyProfileListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TrafficPolicyProfileListServicesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TrafficPolicyProfileListServicesResponse,>,>
     *
     * @throws APIException
     */
    public function listServices(
        array|TrafficPolicyProfileListServicesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
