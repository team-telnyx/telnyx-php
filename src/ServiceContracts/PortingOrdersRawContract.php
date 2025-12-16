<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
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

interface PortingOrdersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PortingOrderCreateParams $params
     *
     * @return BaseResponse<PortingOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PortingOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|PortingOrderRetrieveParams $params
     *
     * @return BaseResponse<PortingOrderGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|PortingOrderRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|PortingOrderUpdateParams $params
     *
     * @return BaseResponse<PortingOrderUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|PortingOrderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PortingOrderListParams $params
     *
     * @return BaseResponse<DefaultPagination<PortingOrder>>
     *
     * @throws APIException
     */
    public function list(
        array|PortingOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     *
     * @return BaseResponse<PortingOrderGetAllowedFocWindowsResponse>
     *
     * @throws APIException
     */
    public function retrieveAllowedFocWindows(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @return BaseResponse<PortingOrderGetExceptionTypesResponse>
     *
     * @throws APIException
     */
    public function retrieveExceptionTypes(
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|PortingOrderRetrieveLoaTemplateParams $params
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function retrieveLoaTemplate(
        string $id,
        array|PortingOrderRetrieveLoaTemplateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     * @param array<string,mixed>|PortingOrderRetrieveRequirementsParams $params
     *
     * @return BaseResponse<DefaultPagination<PortingOrderGetRequirementsResponse>>
     *
     * @throws APIException
     */
    public function retrieveRequirements(
        string $id,
        array|PortingOrderRetrieveRequirementsParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id Porting Order id
     *
     * @return BaseResponse<PortingOrderGetSubRequestResponse>
     *
     * @throws APIException
     */
    public function retrieveSubRequest(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
