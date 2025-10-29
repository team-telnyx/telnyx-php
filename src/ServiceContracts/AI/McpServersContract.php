<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\McpServers\McpServerGetResponse;
use Telnyx\AI\McpServers\McpServerListResponseItem;
use Telnyx\AI\McpServers\McpServerNewResponse;
use Telnyx\AI\McpServers\McpServerUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface McpServersContract
{
    /**
     * @api
     *
     * @param string $name
     * @param string $type
     * @param string $url
     * @param list<string>|null $allowedTools
     * @param string|null $apiKeyRef
     *
     * @throws APIException
     */
    public function create(
        $name,
        $type,
        $url,
        $allowedTools = omit,
        $apiKeyRef = omit,
        ?RequestOptions $requestOptions = null,
    ): McpServerNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
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
     * @param string $id
     * @param list<string>|null $allowedTools
     * @param string|null $apiKeyRef
     * @param \DateTimeInterface $createdAt
     * @param string $name
     * @param string $type
     * @param string $url
     *
     * @throws APIException
     */
    public function update(
        string $mcpServerID,
        $id = omit,
        $allowedTools = omit,
        $apiKeyRef = omit,
        $createdAt = omit,
        $name = omit,
        $type = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): McpServerUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function updateRaw(
        string $mcpServerID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): McpServerUpdateResponse;

    /**
     * @api
     *
     * @param int $pageNumber
     * @param int $pageSize
     * @param string $type
     * @param string $url
     *
     * @return list<McpServerListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        $pageNumber = omit,
        $pageSize = omit,
        $type = omit,
        $url = omit,
        ?RequestOptions $requestOptions = null,
    ): array;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return list<McpServerListResponseItem>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): array;

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
