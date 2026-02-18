<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Missions\MissionCreateParams\ExecutionMode;
use Telnyx\AI\Missions\MissionData;
use Telnyx\AI\Missions\MissionGetResponse;
use Telnyx\AI\Missions\MissionListEventsResponse;
use Telnyx\AI\Missions\MissionNewResponse;
use Telnyx\AI\Missions\MissionUpdateMissionResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MissionsContract
{
    /**
     * @api
     *
     * @param ExecutionMode|value-of<ExecutionMode> $executionMode
     * @param array<string,mixed> $metadata
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        ?string $description = null,
        ExecutionMode|string $executionMode = 'external',
        ?string $instructions = null,
        ?array $metadata = null,
        ?string $model = null,
        RequestOptions|array|null $requestOptions = null,
    ): MissionNewResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): MissionGetResponse;

    /**
     * @api
     *
     * @param int $pageNumber Page number (1-based)
     * @param int $pageSize Number of items per page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MissionData>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cloneMission(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteMission(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param int $pageNumber Page number (1-based)
     * @param int $pageSize Number of items per page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MissionListEventsResponse>
     *
     * @throws APIException
     */
    public function listEvents(
        int $pageNumber = 1,
        int $pageSize = 50,
        ?string $type = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param \Telnyx\AI\Missions\MissionUpdateMissionParams\ExecutionMode|value-of<\Telnyx\AI\Missions\MissionUpdateMissionParams\ExecutionMode> $executionMode
     * @param array<string,mixed> $metadata
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateMission(
        string $missionID,
        ?string $description = null,
        \Telnyx\AI\Missions\MissionUpdateMissionParams\ExecutionMode|string|null $executionMode = null,
        ?string $instructions = null,
        ?array $metadata = null,
        ?string $model = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): MissionUpdateMissionResponse;
}
