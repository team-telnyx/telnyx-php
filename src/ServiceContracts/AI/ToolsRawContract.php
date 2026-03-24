<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\Tools\ToolCreateParams;
use Telnyx\AI\Tools\ToolGetResponse;
use Telnyx\AI\Tools\ToolListParams;
use Telnyx\AI\Tools\ToolListResponse;
use Telnyx\AI\Tools\ToolNewResponse;
use Telnyx\AI\Tools\ToolUpdateParams;
use Telnyx\AI\Tools\ToolUpdateResponse;
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
     * @return BaseResponse<ToolNewResponse>
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ToolGetResponse>
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
     * @param array<string,mixed>|ToolUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ToolUpdateResponse>
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
     * @return BaseResponse<DefaultFlatPagination<ToolListResponse>>
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
