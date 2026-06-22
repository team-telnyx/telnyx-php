<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Tools\SharedToolResponse;
use Telnyx\AI\Tools\ToolCreateParams;
use Telnyx\AI\Tools\ToolListParams;
use Telnyx\AI\Tools\ToolUpdateParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ToolsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ToolCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SharedToolResponse>
     *
     * @throws APIException
     */
    public function create(
        array|ToolCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toolID unique identifier of the tool
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SharedToolResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $toolID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toolID unique identifier of the tool
     * @param array<string,mixed>|ToolUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SharedToolResponse>
     *
     * @throws APIException
     */
    public function update(
        string $toolID,
        array|ToolUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ToolListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<SharedToolResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|ToolListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $toolID unique identifier of the tool
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $toolID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
