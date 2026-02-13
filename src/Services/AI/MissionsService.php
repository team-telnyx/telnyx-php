<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Missions\MissionCreateParams\ExecutionMode;
use Telnyx\AI\Missions\MissionGetResponse;
use Telnyx\AI\Missions\MissionListEventsResponse;
use Telnyx\AI\Missions\MissionListResponse;
use Telnyx\AI\Missions\MissionNewResponse;
use Telnyx\AI\Missions\MissionUpdateMissionResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\MissionsContract;
use Telnyx\Services\AI\Missions\KnowledgeBasesService;
use Telnyx\Services\AI\Missions\McpServersService;
use Telnyx\Services\AI\Missions\RunsService;
use Telnyx\Services\AI\Missions\ToolsService;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MissionsService implements MissionsContract
{
    /**
     * @api
     */
    public MissionsRawService $raw;

    /**
     * @api
     */
    public RunsService $runs;

    /**
     * @api
     */
    public KnowledgeBasesService $knowledgeBases;

    /**
     * @api
     */
    public McpServersService $mcpServers;

    /**
     * @api
     */
    public ToolsService $tools;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MissionsRawService($client);
        $this->runs = new RunsService($client);
        $this->knowledgeBases = new KnowledgeBasesService($client);
        $this->mcpServers = new McpServersService($client);
        $this->tools = new ToolsService($client);
    }

    /**
     * @api
     *
     * Create a new mission definition
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
    ): MissionNewResponse {
        $params = Util::removeNulls(
            [
                'name' => $name,
                'description' => $description,
                'executionMode' => $executionMode,
                'instructions' => $instructions,
                'metadata' => $metadata,
                'model' => $model,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a mission by ID (includes tools, knowledge_bases, mcp_servers)
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): MissionGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($missionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all missions for the organization
     *
     * @param int $pageNumber Page number (1-based)
     * @param int $pageSize Number of items per page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MissionListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Clone an existing mission
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function cloneMission(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->cloneMission($missionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a mission
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteMission(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteMission($missionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List recent events across all missions
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            ['pageNumber' => $pageNumber, 'pageSize' => $pageSize, 'type' => $type]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listEvents(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a mission definition
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
    ): MissionUpdateMissionResponse {
        $params = Util::removeNulls(
            [
                'description' => $description,
                'executionMode' => $executionMode,
                'instructions' => $instructions,
                'metadata' => $metadata,
                'model' => $model,
                'name' => $name,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateMission($missionID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
