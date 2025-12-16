<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MessagingHostedNumberOrder;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateVerificationCodesParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderDeleteResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderGetResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderListParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse;
use Telnyx\RequestOptions;

interface MessagingHostedNumberOrdersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MessagingHostedNumberOrderCreateParams $params
     *
     * @return BaseResponse<MessagingHostedNumberOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MessagingHostedNumberOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the type of resource
     *
     * @return BaseResponse<MessagingHostedNumberOrderGetResponse>
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
     * @param array<string,mixed>|MessagingHostedNumberOrderListParams $params
     *
     * @return BaseResponse<DefaultPagination<MessagingHostedNumberOrder>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingHostedNumberOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the messaging hosted number order to delete
     *
     * @return BaseResponse<MessagingHostedNumberOrderDeleteResponse>
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
     * @param array<string,mixed>|MessagingHostedNumberOrderCheckEligibilityParams $params
     *
     * @return BaseResponse<MessagingHostedNumberOrderCheckEligibilityResponse>
     *
     * @throws APIException
     */
    public function checkEligibility(
        array|MessagingHostedNumberOrderCheckEligibilityParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id order ID to have a verification code created
     * @param array<string,mixed>|MessagingHostedNumberOrderCreateVerificationCodesParams $params
     *
     * @return BaseResponse<MessagingHostedNumberOrderNewVerificationCodesResponse>
     *
     * @throws APIException
     */
    public function createVerificationCodes(
        string $id,
        array|MessagingHostedNumberOrderCreateVerificationCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id order ID related to the validation codes
     * @param array<string,mixed>|MessagingHostedNumberOrderValidateCodesParams $params
     *
     * @return BaseResponse<MessagingHostedNumberOrderValidateCodesResponse>
     *
     * @throws APIException
     */
    public function validateCodes(
        string $id,
        array|MessagingHostedNumberOrderValidateCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;
}
