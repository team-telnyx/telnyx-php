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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface McpServersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|McpServerCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<McpServerNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|McpServerCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<McpServerGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $mcpServerID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|McpServerUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<McpServerUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $mcpServerID,
        array|McpServerUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|McpServerListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPaginationTopLevelArray<McpServerListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|McpServerListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $mcpServerID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
