<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Missions\MissionCreateParams;
use Telnyx\AI\Missions\MissionData;
use Telnyx\AI\Missions\MissionListEventsParams;
use Telnyx\AI\Missions\MissionListParams;
use Telnyx\AI\Missions\MissionResponse;
use Telnyx\AI\Missions\MissionUpdateMissionParams;
use Telnyx\AI\Missions\Runs\Events\EventData;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MissionsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MissionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MissionResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MissionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $missionID unique identifier of the mission
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MissionResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MissionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MissionData>>
     *
     * @throws APIException
     */
    public function list(
        array|MissionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $missionID unique identifier of the mission
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function cloneMission(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $missionID unique identifier of the mission
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteMission(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|MissionListEventsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<EventData>>
     *
     * @throws APIException
     */
    public function listEvents(
        array|MissionListEventsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $missionID unique identifier of the mission
     * @param array<string,mixed>|MissionUpdateMissionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MissionResponse>
     *
     * @throws APIException
     */
    public function updateMission(
        string $missionID,
        array|MissionUpdateMissionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
