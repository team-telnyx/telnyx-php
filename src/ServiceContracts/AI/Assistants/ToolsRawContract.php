<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\Tools\ToolAddParams;
use Telnyx\AI\Assistants\Tools\ToolRemoveParams;
use Telnyx\AI\Assistants\Tools\ToolTestParams;
use Telnyx\AI\Assistants\Tools\ToolTestResponse;
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
     * @param array<string,mixed>|ToolAddParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function add(
        string $toolID,
        array|ToolAddParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ToolRemoveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function remove(
        string $toolID,
        array|ToolRemoveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toolID Path param
     * @param array<string,mixed>|ToolTestParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ToolTestResponse>
     *
     * @throws APIException
     */
    public function test(
        string $toolID,
        array|ToolTestParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
