<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions;

use Telnyx\AI\Missions\Tools\ToolDeleteToolParams;
use Telnyx\AI\Missions\Tools\ToolGetToolParams;
use Telnyx\AI\Missions\Tools\ToolUpdateToolParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Missions\ToolsRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ToolsRawService implements ToolsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Adds a new tool to the specified mission, defining an action agents can invoke during runs of this mission.
     *
     * @param string $missionID unique identifier of the mission
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createTool(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/missions/%1$s/tools', $missionID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Removes the specified tool from the mission so agents can no longer invoke it in subsequent runs.
     *
     * @param string $toolID unique identifier of the tool
     * @param array{missionID: string}|ToolDeleteToolParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteTool(
        string $toolID,
        array|ToolDeleteToolParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ToolDeleteToolParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/missions/%1$s/tools/%2$s', $missionID, $toolID],
            options: $options,
            convert: null,
        );
    }

    /**
     * @api
     *
     * Returns the definition of a single tool configured on the specified mission.
     *
     * @param string $toolID unique identifier of the tool
     * @param array{missionID: string}|ToolGetToolParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getTool(
        string $toolID,
        array|ToolGetToolParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ToolGetToolParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/missions/%1$s/tools/%2$s', $missionID, $toolID],
            options: $options,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Returns the tools configured on the specified mission. Tools define the actions agents may invoke while executing the mission's runs.
     *
     * @param string $missionID unique identifier of the mission
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function listTools(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/missions/%1$s/tools', $missionID],
            options: $requestOptions,
            convert: 'mixed',
        );
    }

    /**
     * @api
     *
     * Replaces the definition of the specified tool on this mission.
     *
     * @param string $toolID unique identifier of the tool
     * @param array{missionID: string}|ToolUpdateToolParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateTool(
        string $toolID,
        array|ToolUpdateToolParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ToolUpdateToolParams::parseRequest(
            $params,
            $requestOptions,
        );
        $missionID = $parsed['missionID'];
        unset($parsed['missionID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['ai/missions/%1$s/tools/%2$s', $missionID, $toolID],
            options: $options,
            convert: 'mixed',
        );
    }
}
