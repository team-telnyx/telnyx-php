<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Tools\PayToolParams;
use Telnyx\AI\Tools\SharedToolResponse;
use Telnyx\AI\Tools\UpdateDynamicVariablesToolParams;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\ToolsContract;

/**
 * Configure AI assistant specifications.
 *
 * @phpstan-import-type PayToolParamsShape from \Telnyx\AI\Tools\PayToolParams
 * @phpstan-import-type UpdateDynamicVariablesToolParamsShape from \Telnyx\AI\Tools\UpdateDynamicVariablesToolParams
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
     * Create a new custom AI tool that can be attached to AI assistants.
     *
     * @param array<string,mixed> $clientSideTool
     * @param array<string,mixed> $function
     * @param array<string,mixed> $handoff
     * @param array<string,mixed> $invite
     * @param PayToolParams|PayToolParamsShape $pay
     * @param array<string,mixed> $retrieval
     * @param UpdateDynamicVariablesToolParams|UpdateDynamicVariablesToolParamsShape $updateDynamicVariables configuration for an update_dynamic_variables tool
     * @param array<string,mixed> $webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $displayName,
        string $type,
        ?array $clientSideTool = null,
        ?array $function = null,
        ?array $handoff = null,
        ?array $invite = null,
        PayToolParams|array|null $pay = null,
        ?array $retrieval = null,
        int $timeoutMs = 5000,
        UpdateDynamicVariablesToolParams|array|null $updateDynamicVariables = null,
        ?array $webhook = null,
        RequestOptions|array|null $requestOptions = null,
    ): SharedToolResponse {
        $params = Util::removeNulls(
            [
                'displayName' => $displayName,
                'type' => $type,
                'clientSideTool' => $clientSideTool,
                'function' => $function,
                'handoff' => $handoff,
                'invite' => $invite,
                'pay' => $pay,
                'retrieval' => $retrieval,
                'timeoutMs' => $timeoutMs,
                'updateDynamicVariables' => $updateDynamicVariables,
                'webhook' => $webhook,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve the details of a specific AI tool.
     *
     * @param string $toolID unique identifier of the tool
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $toolID,
        RequestOptions|array|null $requestOptions = null
    ): SharedToolResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($toolID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update the configuration of an existing AI tool.
     *
     * @param string $toolID unique identifier of the tool
     * @param array<string,mixed> $clientSideTool
     * @param array<string,mixed> $function
     * @param array<string,mixed> $handoff
     * @param array<string,mixed> $invite
     * @param PayToolParams|PayToolParamsShape $pay
     * @param array<string,mixed> $retrieval
     * @param UpdateDynamicVariablesToolParams|UpdateDynamicVariablesToolParamsShape $updateDynamicVariables configuration for an update_dynamic_variables tool
     * @param array<string,mixed> $webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $toolID,
        ?array $clientSideTool = null,
        ?string $displayName = null,
        ?array $function = null,
        ?array $handoff = null,
        ?array $invite = null,
        PayToolParams|array|null $pay = null,
        ?array $retrieval = null,
        ?int $timeoutMs = null,
        ?string $type = null,
        UpdateDynamicVariablesToolParams|array|null $updateDynamicVariables = null,
        ?array $webhook = null,
        RequestOptions|array|null $requestOptions = null,
    ): SharedToolResponse {
        $params = Util::removeNulls(
            [
                'clientSideTool' => $clientSideTool,
                'displayName' => $displayName,
                'function' => $function,
                'handoff' => $handoff,
                'invite' => $invite,
                'pay' => $pay,
                'retrieval' => $retrieval,
                'timeoutMs' => $timeoutMs,
                'type' => $type,
                'updateDynamicVariables' => $updateDynamicVariables,
                'webhook' => $webhook,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($toolID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a list of the custom AI tools configured on your account.
     *
     * @param string $filterName filter results by filter name
     * @param string $filterType filter results by filter type
     * @param int $pageNumber page number to retrieve (1-based)
     * @param int $pageSize number of items to return per page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<SharedToolResponse>
     *
     * @throws APIException
     */
    public function list(
        ?string $filterName = null,
        ?string $filterType = null,
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterName' => $filterName,
                'filterType' => $filterType,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a custom AI tool.
     *
     * @param string $toolID unique identifier of the tool
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $toolID,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($toolID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
