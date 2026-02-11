<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Missions;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Missions\ToolsContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ToolsService implements ToolsContract
{
    /**
     * @api
     */
    public ToolsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ToolsRawService($client);
    }

    /**
     * @api
     *
     * Create a new tool for a mission
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createTool(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->createTool($missionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a tool from a mission
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function deleteTool(
        string $toolID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['missionID' => $missionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->deleteTool($toolID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get a specific tool by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function getTool(
        string $toolID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['missionID' => $missionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->getTool($toolID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List all tools for a mission
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listTools(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->listTools($missionID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a tool definition
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function updateTool(
        string $toolID,
        string $missionID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['missionID' => $missionID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->updateTool($toolID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
