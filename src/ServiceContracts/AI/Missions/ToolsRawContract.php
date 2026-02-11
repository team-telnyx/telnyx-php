<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Missions;

use Telnyx\AI\Missions\Tools\ToolDeleteToolParams;
use Telnyx\AI\Missions\Tools\ToolGetToolParams;
use Telnyx\AI\Missions\Tools\ToolUpdateToolParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ToolsRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function createTool(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ToolDeleteToolParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function deleteTool(
        string $toolID,
        array|ToolDeleteToolParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ToolGetToolParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function getTool(
        string $toolID,
        array|ToolGetToolParams $params,
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
    public function listTools(
        string $missionID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ToolUpdateToolParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function updateTool(
        string $toolID,
        array|ToolUpdateToolParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
