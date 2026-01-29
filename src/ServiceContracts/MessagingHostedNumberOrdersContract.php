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
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderListParams\Page;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderNewVerificationCodesResponse;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams\VerificationCode;
use Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type PageShape from \Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderListParams\Page
 * @phpstan-import-type VerificationCodeShape from \Telnyx\MessagingHostedNumberOrders\MessagingHostedNumberOrderValidateCodesParams\VerificationCode
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessagingHostedNumberOrdersContract
{
    /**
     * @api
     *
     * @param string $messagingProfileID automatically associate the number with this messaging profile ID when the order is complete
     * @param list<string> $phoneNumbers phone numbers to be used for hosted messaging
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $messagingProfileID = null,
        ?array $phoneNumbers = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessagingHostedNumberOrderNewResponse;

    /**
     * @api
     *
     * @param string $id identifies the type of resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessagingHostedNumberOrderGetResponse;

    /**
     * @api
     *
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<MessagingHostedNumberOrder>
     *
     * @throws APIException
     */
    public function list(
        Page|array|null $page = null,
        RequestOptions|array|null $requestOptions = null
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id identifies the messaging hosted number order to delete
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessagingHostedNumberOrderDeleteResponse;

    /**
     * @api
     *
     * @param list<string> $phoneNumbers List of phone numbers to check eligibility
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function checkEligibility(
        array $phoneNumbers,
        RequestOptions|array|null $requestOptions = null
    ): MessagingHostedNumberOrderCheckEligibilityResponse;

    /**
     * @api
     *
     * @param string $id order ID to have a verification code created
     * @param list<string> $phoneNumbers
     * @param VerificationMethod|value-of<VerificationMethod> $verificationMethod
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function createVerificationCodes(
        string $id,
        array $phoneNumbers,
        VerificationMethod|string $verificationMethod,
        RequestOptions|array|null $requestOptions = null,
    ): MessagingHostedNumberOrderNewVerificationCodesResponse;

    /**
     * @api
     *
     * @param string $id order ID related to the validation codes
     * @param list<VerificationCode|VerificationCodeShape> $verificationCodes
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function validateCodes(
        string $id,
        array $verificationCodes,
        RequestOptions|array|null $requestOptions = null,
    ): MessagingHostedNumberOrderValidateCodesResponse;
}
