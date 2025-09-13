<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;
use Telnyx\NumberOrders\NumberOrderCreateParams\PhoneNumber;
use Telnyx\NumberOrders\NumberOrderGetResponse;
use Telnyx\NumberOrders\NumberOrderListParams\Filter;
use Telnyx\NumberOrders\NumberOrderListParams\Page;
use Telnyx\NumberOrders\NumberOrderListResponse;
use Telnyx\NumberOrders\NumberOrderNewResponse;
use Telnyx\NumberOrders\NumberOrderUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface NumberOrdersContract
{
    /**
     * @api
     *
     * @param string $billingGroupID identifies the billing group associated with the phone number
     * @param string $connectionID identifies the connection associated with this phone number
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $messagingProfileID identifies the messaging profile associated with the phone number
     * @param list<PhoneNumber> $phoneNumbers
     *
     * @return NumberOrderNewResponse<HasRawResponse>
     */
    public function create(
        $billingGroupID = omit,
        $connectionID = omit,
        $customerReference = omit,
        $messagingProfileID = omit,
        $phoneNumbers = omit,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderNewResponse;

    /**
     * @api
     *
     * @return NumberOrderGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $numberOrderID,
        ?RequestOptions $requestOptions = null
    ): NumberOrderGetResponse;

    /**
     * @api
     *
     * @param string $customerReference a customer reference string for customer look ups
     * @param list<UpdateRegulatoryRequirement> $regulatoryRequirements
     *
     * @return NumberOrderUpdateResponse<HasRawResponse>
     */
    public function update(
        string $numberOrderID,
        $customerReference = omit,
        $regulatoryRequirements = omit,
        ?RequestOptions $requestOptions = null,
    ): NumberOrderUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers_count], filter[customer_reference], filter[requirements_met]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @return NumberOrderListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NumberOrderListResponse;
}
