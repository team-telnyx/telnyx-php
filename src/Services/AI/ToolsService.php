<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Tools\ToolGetResponse;
use Telnyx\AI\Tools\ToolListResponse;
use Telnyx\AI\Tools\ToolNewResponse;
use Telnyx\AI\Tools\ToolUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\ToolsContract;

/**
 * Configure AI assistant specifications.
 *
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
     * Create Tool
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
    ): ToolNewResponse {
        $params = Util::removeNulls(
            [
                'displayName' => $displayName,
                'type' => $type,
                'function' => $function,
                'handoff' => $handoff,
                'invite' => $invite,
                'retrieval' => $retrieval,
                'timeoutMs' => $timeoutMs,
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
     * Get Tool
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $toolID,
        RequestOptions|array|null $requestOptions = null
    ): ToolGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($toolID, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update Tool
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
    ): ToolUpdateResponse {
        $params = Util::removeNulls(
            [
                'displayName' => $displayName,
                'function' => $function,
                'handoff' => $handoff,
                'invite' => $invite,
                'retrieval' => $retrieval,
                'timeoutMs' => $timeoutMs,
                'type' => $type,
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
     * List Tools
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
     * Delete Tool
     *
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
