<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\LlmTokenGateway;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroup;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupDeleteParams;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupListParams;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupResponse;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupUpdateParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TokenGroupsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TokenGroupCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenGroupResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TokenGroupCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenGroupResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Path param
     * @param array<string,mixed>|TokenGroupUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenGroupResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TokenGroupUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TokenGroupListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TokenGroup>>
     *
     * @throws APIException
     */
    public function list(
        array|TokenGroupListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TokenGroupDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|TokenGroupDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
