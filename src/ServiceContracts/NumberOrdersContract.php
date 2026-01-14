<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement;
use Telnyx\NumberOrders\NumberOrderCreateParams\PhoneNumber;
use Telnyx\NumberOrders\NumberOrderGetResponse;
use Telnyx\NumberOrders\NumberOrderListParams\Filter;
use Telnyx\NumberOrders\NumberOrderListResponse;
use Telnyx\NumberOrders\NumberOrderNewResponse;
use Telnyx\NumberOrders\NumberOrderUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type PhoneNumberShape from \Telnyx\NumberOrders\NumberOrderCreateParams\PhoneNumber
 * @phpstan-import-type UpdateRegulatoryRequirementShape from \Telnyx\NumberOrderPhoneNumbers\UpdateRegulatoryRequirement
 * @phpstan-import-type FilterShape from \Telnyx\NumberOrders\NumberOrderListParams\Filter
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface NumberOrdersContract
{
    /**
     * @api
     *
     * @param string $billingGroupID identifies the billing group associated with the phone number
     * @param string $connectionID identifies the connection associated with this phone number
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $messagingProfileID identifies the messaging profile associated with the phone number
     * @param list<PhoneNumber|PhoneNumberShape> $phoneNumbers
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $messagingProfileID = null,
        ?array $phoneNumbers = null,
        RequestOptions|array|null $requestOptions = null,
    ): NumberOrderNewResponse;

    /**
     * @api
     *
     * @param string $numberOrderID the number order ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $numberOrderID,
        RequestOptions|array|null $requestOptions = null
    ): NumberOrderGetResponse;

    /**
     * @api
     *
     * @param string $numberOrderID the number order ID
     * @param string $customerReference a customer reference string for customer look ups
     * @param list<UpdateRegulatoryRequirement|UpdateRegulatoryRequirementShape> $regulatoryRequirements
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $numberOrderID,
        ?string $customerReference = null,
        ?array $regulatoryRequirements = null,
        RequestOptions|array|null $requestOptions = null,
    ): NumberOrderUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[status], filter[created_at], filter[phone_numbers_count], filter[customer_reference], filter[requirements_met]
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<NumberOrderListResponse>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;
}
