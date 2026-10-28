<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Email;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Email\DedicatedIPs\DedicatedIPCreateParams;
use Telnyx\Email\DedicatedIPs\DedicatedIPDeleteParams;
use Telnyx\Email\DedicatedIPs\DedicatedIPListParams;
use Telnyx\Email\DedicatedIPs\DedicatedIPListResponse;
use Telnyx\Email\DedicatedIPs\DedicatedIPShowResponse;
use Telnyx\Email\DedicatedIPs\DedicatedIPUpdateParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DedicatedIPsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|DedicatedIPCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DedicatedIPShowResponse>
     *
     * @throws APIException
     */
    public function create(
        array|DedicatedIPCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the dedicated IP identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DedicatedIPShowResponse>
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
     * @param string $id the dedicated IP identifier (UUID)
     * @param array<string,mixed>|DedicatedIPUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DedicatedIPShowResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|DedicatedIPUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DedicatedIPListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DedicatedIPListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|DedicatedIPListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id path param: The dedicated IP identifier (UUID)
     * @param array<string,mixed>|DedicatedIPDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DedicatedIPShowResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|DedicatedIPDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
