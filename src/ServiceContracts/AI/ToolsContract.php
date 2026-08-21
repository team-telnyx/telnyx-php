<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Tools\PayToolParams;
use Telnyx\AI\Tools\SharedToolResponse;
use Telnyx\AI\Tools\UpdateDynamicVariablesToolParams;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type PayToolParamsShape from \Telnyx\AI\Tools\PayToolParams
 * @phpstan-import-type UpdateDynamicVariablesToolParamsShape from \Telnyx\AI\Tools\UpdateDynamicVariablesToolParams
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ToolsContract
{
    /**
     * @api
     *
     * @param string $displayName Body param
     * @param string $type Body param
     * @param array<string,mixed> $clientSideTool Body param
     * @param array<string,mixed> $function Body param
     * @param array<string,mixed> $handoff Body param
     * @param array<string,mixed> $invite Body param
     * @param PayToolParams|PayToolParamsShape $pay Body param
     * @param array<string,mixed> $retrieval Body param
     * @param int $timeoutMs Body param
     * @param UpdateDynamicVariablesToolParams|UpdateDynamicVariablesToolParamsShape $updateDynamicVariables body param: Configuration for an update_dynamic_variables tool
     * @param array<string,mixed> $webhook Body param
     * @param string $idempotencyKey Header param: Optional opaque, unquoted key for safely retrying the same logical request. Keys must contain 1 to 255 letters, numbers, hyphens, or underscores. Generate a unique UUID v4 for each operation and reuse it only when retrying that operation with the same request. Invalid headers—including duplicate, empty, malformed, or overlong values—return 400 with error code 10015. A request already in progress with the same key returns 409; reusing the key with a different request returns 422. Only successful responses are replayed, for up to 24 hours. Do not include sensitive data in the key.
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
        ?string $idempotencyKey = null,
        RequestOptions|array|null $requestOptions = null,
    ): SharedToolResponse;

    /**
     * @api
     *
     * @param string $toolID unique identifier of the tool
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $toolID,
        RequestOptions|array|null $requestOptions = null
    ): SharedToolResponse;

    /**
     * @api
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
    ): SharedToolResponse;

    /**
     * @api
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
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $toolID unique identifier of the tool
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $toolID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
