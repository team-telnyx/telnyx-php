<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\McpServers\McpServerCreateParams;
use Telnyx\AI\McpServers\McpServerGetResponse;
use Telnyx\AI\McpServers\McpServerListParams;
use Telnyx\AI\McpServers\McpServerListResponse;
use Telnyx\AI\McpServers\McpServerNewResponse;
use Telnyx\AI\McpServers\McpServerUpdateParams;
use Telnyx\AI\McpServers\McpServerUpdateResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPaginationTopLevelArray;
use Telnyx\RequestOptions;

interface McpServersRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|McpServerCreateParams $params
     *
     * @return BaseResponse<McpServerNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|McpServerCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<McpServerGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $mcpServerID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|McpServerUpdateParams $params
     *
     * @return BaseResponse<McpServerUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $mcpServerID,
        array|McpServerUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|McpServerListParams $params
     *
     * @return BaseResponse<DefaultFlatPaginationTopLevelArray<McpServerListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|McpServerListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $mcpServerID,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
