<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\MessagingHostedNumberOrder;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCheckEligibilityResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderCreateVerificationCodesParams\VerificationMethod;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderDeleteResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderGetResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse;
use Telnyx\RequestOptions;

interface MessagingHostedNumberOrdersContract
{
    /**
     * @api
     *
     * @param string $messagingProfileID automatically associate the number with this messaging profile ID when the order is complete
     * @param list<string> $phoneNumbers phone numbers to be used for hosted messaging
     *
     * @throws APIException
     */
    public function create(
        ?string $messagingProfileID = null,
        ?array $phoneNumbers = null,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the type of resource
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
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return DefaultPagination<MessagingHostedNumberOrder>
     *
     * @throws APIException
     */
    public function list(
        ?array $page = null,
        ?RequestOptions $requestOptions = null
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id identifies the messaging hosted number order to delete
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
     * @param list<string> $phoneNumbers List of phone numbers to check eligibility
     *
     * @throws APIException
     */
    public function checkEligibility(
        array $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): MessagingHostedNumberOrderCheckEligibilityResponse;

    /**
     * @api
     *
     * @param string $id order ID to have a verification code created
     * @param list<string> $phoneNumbers
     * @param 'sms'|'call'|'flashcall'|VerificationMethod $verificationMethod
     *
     * @throws APIException
     */
    public function createVerificationCodes(
        string $id,
        array $phoneNumbers,
        string|VerificationMethod $verificationMethod,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderNewVerificationCodesResponse;

    /**
     * @api
     *
     * @param string $id order ID related to the validation codes
     * @param list<array{code: string, phoneNumber: string}> $verificationCodes
     *
     * @throws APIException
     */
    public function validateCodes(
        string $id,
        array $verificationCodes,
        ?RequestOptions $requestOptions = null,
    ): MessagingHostedNumberOrderValidateCodesResponse;
}
