<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Email;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Email\IPPools\IPPoolCreateParams;
use Telnyx\Email\IPPools\IPPoolDeleteParams;
use Telnyx\Email\IPPools\IPPoolListResponse;
use Telnyx\Email\IPPools\IPPoolShowResponse;
use Telnyx\Email\IPPools\IPPoolUpdateParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface IPPoolsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|IPPoolCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IPPoolShowResponse>
     *
     * @throws APIException
     */
    public function create(
        array|IPPoolCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the IP pool identifier (UUID)
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IPPoolShowResponse>
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
     * @param string $id the IP pool identifier (UUID)
     * @param array<string,mixed>|IPPoolUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IPPoolShowResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|IPPoolUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<IPPoolListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the IP pool identifier (UUID)
     * @param array<string,mixed>|IPPoolDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        array|IPPoolDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
