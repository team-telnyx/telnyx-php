<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Missions\MissionCreateParams;
use Telnyx\AI\Missions\MissionCreateParams\ExecutionMode;
use Telnyx\AI\Missions\MissionGetResponse;
use Telnyx\AI\Missions\MissionListEventsParams;
use Telnyx\AI\Missions\MissionListEventsResponse;
use Telnyx\AI\Missions\MissionListParams;
use Telnyx\AI\Missions\MissionListResponse;
use Telnyx\AI\Missions\MissionNewResponse;
use Telnyx\AI\Missions\MissionUpdateMissionParams;
use Telnyx\AI\Missions\MissionUpdateMissionResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\MissionsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MissionsRawService implements MissionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a new mission definition
     *
     * @param array{
     *   name: string,
     *   description?: string,
     *   executionMode?: ExecutionMode|value-of<ExecutionMode>,
     *   instructions?: string,
     *   metadata?: array<string,mixed>,
     *   model?: string,
     * }|MissionCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MissionNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MissionCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MissionCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/missions',
            body: (object) $parsed,
            options: $options,
            convert: MissionNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Get a mission by ID (includes tools, knowledge_bases, mcp_servers)
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MissionGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/missions/%1$s', $missionID],
            options: $requestOptions,
            convert: MissionGetResponse::class,
        );
    }

    /**
     * @api
     *
     * List all missions for the organization
     *
     * @param array{pageNumber?: int, pageSize?: int}|MissionListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MissionListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|MissionListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MissionListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/missions',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: MissionListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Clone an existing mission
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function cloneMission(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/missions/%1$s/clone', $missionID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Delete a mission
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteMission(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/missions/%1$s', $missionID],
            options: $requestOptions,
            convert: null,
        );
    }

    /**
     * @api
     *
     * List recent events across all missions
     *
     * @param array{
     *   pageNumber?: int, pageSize?: int, type?: string
     * }|MissionListEventsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MissionListEventsResponse>>
     *
     * @throws APIException
     */
    public function listEvents(
        array|MissionListEventsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MissionListEventsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/missions/events',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: MissionListEventsResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Update a mission definition
     *
     * @param array{
     *   description?: string,
     *   executionMode?: MissionUpdateMissionParams\ExecutionMode|value-of<MissionUpdateMissionParams\ExecutionMode>,
     *   instructions?: string,
     *   metadata?: array<string,mixed>,
     *   model?: string,
     *   name?: string,
     * }|MissionUpdateMissionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MissionUpdateMissionResponse>
     *
     * @throws APIException
     */
    public function updateMission(
        string $missionID,
        array|MissionUpdateMissionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MissionUpdateMissionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['ai/missions/%1$s', $missionID],
            body: (object) $parsed,
            options: $options,
            convert: MissionUpdateMissionResponse::class,
        );
    }
}
