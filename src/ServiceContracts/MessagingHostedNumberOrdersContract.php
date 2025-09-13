<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateVerificationCodesParams\VerificationMethod;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderDeleteResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderGetResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderListParams\Page;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderListResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams\VerificationCode;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface MessagingHostedNumberOrdersContract
{
    /**
     * @api
     *
     * @param string $messagingProfileID automatically associate the number with this messaging profile ID when the order is complete
     * @param list<string> $phoneNumbers phone numbers to be used for hosted messaging
     *
     * @return MessagingHostedNumberOrderNewResponse<HasRawResponse>
     */
    public function create(
        $messagingProfileID = omit,
        $phoneNumbers = omit,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderNewResponse;

    /**
     * @api
     *
     * @return MessagingHostedNumberOrderGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderGetResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return MessagingHostedNumberOrderListResponse<HasRawResponse>
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderListResponse;

    /**
     * @api
     *
     * @return MessagingHostedNumberOrderDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderDeleteResponse;

    /**
     * @api
     *
     * @param list<string> $phoneNumbers List of phone numbers to check eligibility
     *
     * @return MessagingHostedNumberOrderCheckEligibilityResponse<HasRawResponse>
     */
    public function checkEligibility(
        $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderCheckEligibilityResponse;

    /**
     * @api
     *
     * @param list<string> $phoneNumbers
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     *
     * @return MessagingHostedNumberOrderNewVerificationCodesResponse<HasRawResponse>
     */
    public function createVerificationCodes(
        string $id,
        $phoneNumbers,
        $verificationMethod,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderNewVerificationCodesResponse;

    /**
     * @api
     *
     * @param list<VerificationCode> $verificationCodes
     *
     * @return MessagingHostedNumberOrderValidateCodesResponse<HasRawResponse>
     */
    public function validateCodes(
        string $id,
        $verificationCodes,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderValidateCodesResponse;
}
