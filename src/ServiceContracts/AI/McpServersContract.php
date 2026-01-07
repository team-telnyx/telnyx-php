<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\McpServers\McpServerGetResponse;
use Telnyx\AI\McpServers\McpServerListResponse;
use Telnyx\AI\McpServers\McpServerNewResponse;
use Telnyx\AI\McpServers\McpServerUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPaginationTopLevelArray;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface McpServersContract
{
    /**
     * @api
     *
     * @param list<string>|null $allowedTools
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $name,
        string $type,
        string $url,
        ?array $allowedTools = null,
        ?string $apiKeyRef = null,
        RequestOptions|array|null $requestOptions = null,
    ): McpServerNewResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $mcpServerID,
        RequestOptions|array|null $requestOptions = null
    ): McpServerGetResponse;

    /**
     * @api
     *
     * @param list<string>|null $allowedTools
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $mcpServerID,
        ?string $id = null,
        ?array $allowedTools = null,
        ?string $apiKeyRef = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?string $type = null,
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): McpServerUpdateResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPaginationTopLevelArray<McpServerListResponse>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        ?string $type = null,
        ?string $url = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPaginationTopLevelArray;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $mcpServerID,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
