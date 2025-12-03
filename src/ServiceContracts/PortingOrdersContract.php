<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PortingOrders\PortingOrderCreateParams;
use Telnyx\PortingOrders\PortingOrderGetAllowedFocWindowsResponse;
use Telnyx\PortingOrders\PortingOrderGetExceptionTypesResponse;
use Telnyx\PortingOrders\PortingOrderGetRequirementsResponse;
use Telnyx\PortingOrders\PortingOrderGetResponse;
use Telnyx\PortingOrders\PortingOrderGetSubRequestResponse;
use Telnyx\PortingOrders\PortingOrderListParams;
use Telnyx\PortingOrders\PortingOrderListResponse;
use Telnyx\PortingOrders\PortingOrderNewResponse;
use Telnyx\PortingOrders\PortingOrderRetrieveLoaTemplateParams;
use Telnyx\PortingOrders\PortingOrderRetrieveParams;
use Telnyx\PortingOrders\PortingOrderRetrieveRequirementsParams;
use Telnyx\PortingOrders\PortingOrderUpdateParams;
use Telnyx\PortingOrders\PortingOrderUpdateResponse;
use Telnyx\RequestOptions;

interface PortingOrdersContract
{
    /**
     * @api
     *
     * @param array<mixed>|PortingOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|PortingOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderNewResponse;

    /**
     * @api
     *
     * @param array<mixed>|PortingOrderRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        array|PortingOrderRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|PortingOrderUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|PortingOrderUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|PortingOrderListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|PortingOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveAllowedFocWindows(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetAllowedFocWindowsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveExceptionTypes(
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetExceptionTypesResponse;

    /**
     * @api
     *
     * @param array<mixed>|PortingOrderRetrieveLoaTemplateParams $params
     *
     * @throws APIException
     */
    public function retrieveLoaTemplate(
        string $id,
        array|PortingOrderRetrieveLoaTemplateParams $params,
        ?RequestOptions $requestOptions = null,
    ): string;

    /**
     * @api
     *
     * @param array<mixed>|PortingOrderRetrieveRequirementsParams $params
     *
     * @throws APIException
     */
    public function retrieveRequirements(
        string $id,
        array|PortingOrderRetrieveRequirementsParams $params,
        ?RequestOptions $requestOptions = null,
    ): PortingOrderGetRequirementsResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieveSubRequest(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PortingOrderGetSubRequestResponse;
}
