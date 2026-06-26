<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Networks\NetworkCreateParams;
use Telnyx\Networks\NetworkDeleteResponse;
use Telnyx\Networks\NetworkGetResponse;
use Telnyx\Networks\NetworkListInterfacesParams;
use Telnyx\Networks\NetworkListInterfacesResponse;
use Telnyx\Networks\NetworkListParams;
use Telnyx\Networks\NetworkListResponse;
use Telnyx\Networks\NetworkNewResponse;
use Telnyx\Networks\NetworkUpdateParams;
use Telnyx\Networks\NetworkUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NetworksRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|NetworkCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NetworkNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NetworkCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NetworkGetResponse>
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
     * @param string $networkID identifies the resource
     * @param array<string,mixed>|NetworkUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NetworkUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $networkID,
        array|NetworkUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|NetworkListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<NetworkListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|NetworkListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<NetworkDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param array<string,mixed>|NetworkListInterfacesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<NetworkListInterfacesResponse>>
     *
     * @throws APIException
     */
    public function listInterfaces(
        string $id,
        array|NetworkListInterfacesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
