<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\IPs\IP;
use Telnyx\IPs\IPCreateParams;
use Telnyx\IPs\IPDeleteResponse;
use Telnyx\IPs\IPGetResponse;
use Telnyx\IPs\IPListParams;
use Telnyx\IPs\IPNewResponse;
use Telnyx\IPs\IPUpdateParams;
use Telnyx\IPs\IPUpdateResponse;
use Telnyx\RequestOptions;

interface IPsRawContract
{
    /**
     * @api
     *
     * @param array<mixed>|IPCreateParams $params
     *
     * @return BaseResponse<IPNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|IPCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the type of resource
     *
     * @return BaseResponse<IPGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the type of resource
     * @param array<mixed>|IPUpdateParams $params
     *
     * @return BaseResponse<IPUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|IPUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<mixed>|IPListParams $params
     *
     * @return BaseResponse<DefaultPagination<IP>>
     *
     * @throws APIException
     */
    public function list(
        array|IPListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the type of resource
     *
     * @return BaseResponse<IPDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
