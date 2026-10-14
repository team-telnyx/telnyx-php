<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\LlmTokenGateway;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKey;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKeyCreateParams;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKeyDeleteParams;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKeyListParams;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKeyResponse;
use Telnyx\LlmTokenGateway\TokenKeys\TokenKeyUpdateParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TokenKeysRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TokenKeyCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenKeyResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TokenKeyCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenKeyResponse>
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
     * @param array<string,mixed>|TokenKeyUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TokenKeyResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|TokenKeyUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TokenKeyListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TokenKey>>
     *
     * @throws APIException
     */
    public function list(
        array|TokenKeyListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TokenKeyDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|TokenKeyDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
