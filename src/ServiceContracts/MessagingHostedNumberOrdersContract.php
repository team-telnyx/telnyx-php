<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateVerificationCodesParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderDeleteResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderGetResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderListParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderListResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse;
use Telnyx\RequestOptions;

interface MessagingHostedNumberOrdersContract
{
    /**
     * @api
     *
     * @param array<mixed>|MessagingHostedNumberOrderCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|MessagingHostedNumberOrderCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingHostedNumberOrderListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|MessagingHostedNumberOrderListParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderDeleteResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingHostedNumberOrderCheckEligibilityParams $params
     *
     * @throws APIException
     */
    public function checkEligibility(
        array|MessagingHostedNumberOrderCheckEligibilityParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderCheckEligibilityResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingHostedNumberOrderCreateVerificationCodesParams $params
     *
     * @throws APIException
     */
    public function createVerificationCodes(
        string $id,
        array|MessagingHostedNumberOrderCreateVerificationCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderNewVerificationCodesResponse;

    /**
     * @api
     *
     * @param array<mixed>|MessagingHostedNumberOrderValidateCodesParams $params
     *
     * @throws APIException
     */
    public function validateCodes(
        string $id,
        array|MessagingHostedNumberOrderValidateCodesParams $params,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderValidateCodesResponse;
}
