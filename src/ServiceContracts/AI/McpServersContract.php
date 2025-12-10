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

interface McpServersContract
{
    /**
     * @api
     *
     * @param list<string>|null $allowedTools
     *
     * @throws APIException
     */
    public function create(
        string $name,
        string $type,
        string $url,
        ?array $allowedTools = null,
        ?string $apiKeyRef = null,
        ?RequestOptions $requestOptions = null,
    ): McpServerNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $mcpServerID,
        ?RequestOptions $requestOptions = null
    ): McpServerGetResponse;

    /**
     * @api
     *
     * @param list<string>|null $allowedTools
     *
     * @throws APIException
     */
    public function update(
        string $mcpServerID,
        ?string $id = null,
        ?array $allowedTools = null,
        ?string $apiKeyRef = null,
        string|\DateTimeInterface|null $createdAt = null,
        ?string $name = null,
        ?string $type = null,
        ?string $url = null,
        ?RequestOptions $requestOptions = null,
    ): McpServerUpdateResponse;

    /**
     * @api
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
        ?RequestOptions $requestOptions = null,
    ): DefaultFlatPaginationTopLevelArray;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $mcpServerID,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
