<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\McpServers\McpServerCreateParams;
use Telnyx\AI\McpServers\McpServerGetResponse;
use Telnyx\AI\McpServers\McpServerListParams;
use Telnyx\AI\McpServers\McpServerListResponseItem;
use Telnyx\AI\McpServers\McpServerNewResponse;
use Telnyx\AI\McpServers\McpServerUpdateParams;
use Telnyx\AI\McpServers\McpServerUpdateResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface McpServersContract
{
    /**
     * @api
     *
     * @param array<mixed>|McpServerCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|McpServerCreateParams $params,
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
     * @param array<mixed>|McpServerUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $mcpServerID,
        array|McpServerUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): McpServerUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|McpServerListParams $params
     *
     * @return list<McpServerListResponseItem>
     *
     * @throws APIException
     */
    public function list(
        array|McpServerListParams $params,
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
