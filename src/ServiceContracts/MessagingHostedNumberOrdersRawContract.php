<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
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

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingHostedNumberOrdersRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|MessagingHostedNumberOrderCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberOrderNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MessagingHostedNumberOrderCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberOrderGetResponse>
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
     * @param array<string,mixed>|MessagingHostedNumberOrderListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MessagingHostedNumberOrder>>
     *
     * @throws APIException
     */
    public function list(
        array|MessagingHostedNumberOrderListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the messaging hosted number order to delete
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberOrderDeleteResponse>
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
     * @param array<string,mixed>|MessagingHostedNumberOrderCheckEligibilityParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberOrderCheckEligibilityResponse>
     *
     * @throws APIException
     */
    public function checkEligibility(
        array|MessagingHostedNumberOrderCheckEligibilityParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id order ID to have a verification code created
     * @param array<string,mixed>|MessagingHostedNumberOrderCreateVerificationCodesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberOrderNewVerificationCodesResponse>
     *
     * @throws APIException
     */
    public function createVerificationCodes(
        string $id,
        array|MessagingHostedNumberOrderCreateVerificationCodesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id order ID related to the validation codes
     * @param array<string,mixed>|MessagingHostedNumberOrderValidateCodesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessagingHostedNumberOrderValidateCodesResponse>
     *
     * @throws APIException
     */
    public function validateCodes(
        string $id,
        array|MessagingHostedNumberOrderValidateCodesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
