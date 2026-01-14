<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\PortingOrders\PortingOrder;
use Telnyx\PortingOrders\PortingOrderCreateParams;
use Telnyx\PortingOrders\PortingOrderGetAllowedFocWindowsResponse;
use Telnyx\PortingOrders\PortingOrderGetExceptionTypesResponse;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse;
use Telnyx\PortingOrders\PortingOrderGetResponse;
use Telnyx\PortingOrders\PortingOrderGetSubRequestResponse;
use Telnyx\PortingOrders\PortingOrderListParams;
use Telnyx\PortingOrders\PortingOrderNewResponse;
use Telnyx\PortingOrders\PortingOrderRetrieveLoaTemplateParams;
use Telnyx\PortingOrders\PortingOrderRetrieveParams;
use Telnyx\PortingOrders\PortingOrderRetrieveRequirementsParams;
use Telnyx\PortingOrders\PortingOrderUpdateParams;
use Telnyx\PortingOrders\PortingOrderUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PortingOrdersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PortingOrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortingOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PortingOrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|PortingOrderRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortingOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|PortingOrderRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|PortingOrderUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortingOrderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|PortingOrderUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PortingOrderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PortingOrder>>
     *
     * @throws APIException
     */
    public function list(
        array|PortingOrderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
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
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortingOrderGetAllowedFocWindowsResponse>
     *
     * @throws APIException
     */
    public function retrieveAllowedFocWindows(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortingOrderGetExceptionTypesResponse>
     *
     * @throws APIException
     */
    public function retrieveExceptionTypes(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|PortingOrderRetrieveLoaTemplateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function retrieveLoaTemplate(
        string $id,
        array|PortingOrderRetrieveLoaTemplateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|PortingOrderRetrieveRequirementsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PortingOrderGetRequirementsResponse>>
     *
     * @throws APIException
     */
    public function retrieveRequirements(
        string $id,
        array|PortingOrderRetrieveRequirementsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PortingOrderGetSubRequestResponse>
     *
     * @throws APIException
     */
    public function retrieveSubRequest(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
