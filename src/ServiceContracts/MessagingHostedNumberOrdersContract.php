<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

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
     */
    public function create(
        $messagingProfileID = omit,
        $phoneNumbers = omit,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderNewResponse;

    /**
     * @api
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderGetResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderListResponse;

    /**
     * @api
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderDeleteResponse;

    /**
     * @api
     *
     * @param list<string> $phoneNumbers List of phone numbers to check eligibility
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
     */
    public function validateCodes(
        string $id,
        $verificationCodes,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderValidateCodesResponse;
}
