<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Missions\ExecutionMode;
use Telnyx\AI\Missions\MissionData;
use Telnyx\AI\Missions\MissionResponse;
use Telnyx\AI\Missions\Runs\Events\EventData;
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
        ExecutionMode|string|null $executionMode = null,
        ?string $instructions = null,
        ?array $metadata = null,
        ?string $model = null,
        RequestOptions|array|null $requestOptions = null,
    ): MissionResponse;

    /**
     * @api
     *
     * @param string $missionID unique identifier of the mission
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): MissionResponse;

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
     * @param string $missionID unique identifier of the mission
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
     * @param string $missionID unique identifier of the mission
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
     * @param string $type filter results by type
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<EventData>
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
     * @param string $missionID unique identifier of the mission
     * @param ExecutionMode|value-of<ExecutionMode> $executionMode
     * @param array<string,mixed> $metadata
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateMission(
        string $missionID,
        ?string $description = null,
        ExecutionMode|string|null $executionMode = null,
        ?string $instructions = null,
        ?array $metadata = null,
        ?string $model = null,
        ?string $name = null,
        RequestOptions|array|null $requestOptions = null,
    ): MissionResponse;
}
