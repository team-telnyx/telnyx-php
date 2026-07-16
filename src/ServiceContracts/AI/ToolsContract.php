<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Tools\PayToolParams;
use Telnyx\AI\Tools\SharedToolResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type PayToolParamsShape from \Telnyx\AI\Tools\PayToolParams
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ToolsContract
{
    /**
     * @api
     *
     * @param array<string,mixed> $clientSideTool
     * @param array<string,mixed> $function
     * @param array<string,mixed> $handoff
     * @param array<string,mixed> $invite
     * @param PayToolParams|PayToolParamsShape $pay
     * @param array<string,mixed> $retrieval
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
        ?array $webhook = null,
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
