<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Tools\ToolGetResponse;
use Telnyx\AI\Tools\ToolListResponse;
use Telnyx\AI\Tools\ToolNewResponse;
use Telnyx\AI\Tools\ToolUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ToolsContract
{
    /**
     * @api
     *
     * @param array<string,mixed> $function
     * @param array<string,mixed> $handoff
     * @param array<string,mixed> $invite
     * @param array<string,mixed> $retrieval
     * @param array<string,mixed> $webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $displayName,
        string $type,
        ?array $function = null,
        ?array $handoff = null,
        ?array $invite = null,
        ?array $retrieval = null,
        int $timeoutMs = 5000,
        ?array $webhook = null,
        RequestOptions|array|null $requestOptions = null,
    ): ToolNewResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $toolID,
        RequestOptions|array|null $requestOptions = null
    ): ToolGetResponse;

    /**
     * @api
     *
     * @param array<string,mixed> $function
     * @param array<string,mixed> $handoff
     * @param array<string,mixed> $invite
     * @param array<string,mixed> $retrieval
     * @param array<string,mixed> $webhook
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $toolID,
        ?string $displayName = null,
        ?array $function = null,
        ?array $handoff = null,
        ?array $invite = null,
        ?array $retrieval = null,
        ?int $timeoutMs = null,
        ?string $type = null,
        ?array $webhook = null,
        RequestOptions|array|null $requestOptions = null,
    ): ToolUpdateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ToolListResponse>
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $toolID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
