<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse;
use Telnyx\PhoneNumbers\PhoneNumberDetailed;
use Telnyx\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter;
use Telnyx\PhoneNumbers\PhoneNumberListParams\HandleMessagingProfileError;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Page;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Sort;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse;
use Telnyx\PhoneNumbers\PhoneNumberUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\PhoneNumberListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\PhoneNumbers\PhoneNumberListParams\Page
 * @phpstan-import-type FilterShape from \Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter as FilterShape1
 * @phpstan-import-type PageShape from \Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Page as PageShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumbersContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): PhoneNumberGetResponse;

    /**
     * @api
     *
     * @param string $phoneNumberID identifies the resource
     * @param string $billingGroupID identifies the billing group associated with the phone number
     * @param string $connectionID identifies the connection associated with the phone number
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $externalPin If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     * @param bool $hdVoiceEnabled indicates whether HD voice is enabled for this number
     * @param list<string> $tags a list of user-assigned tags to help organize phone numbers
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $phoneNumberID,
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $externalPin = null,
        ?bool $hdVoiceEnabled = null,
        ?array $tags = null,
        RequestOptions|array|null $requestOptions = null,
    ): PhoneNumberUpdateResponse;

    /**
     * @api
     *
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source]
     * @param HandleMessagingProfileError|value-of<HandleMessagingProfileError> $handleMessagingProfileError Although it is an infrequent occurrence, due to the highly distributed nature of the Telnyx platform, it is possible that there will be an issue when loading in Messaging Profile information. As such, when this parameter is set to `true` and an error in fetching this information occurs, messaging profile related fields will be omitted in the response and an error message will be included instead of returning a 503 error.
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PhoneNumberDetailed>
     *
     * @throws APIException
     */
    public function list(
        Filter|array|null $filter = null,
        HandleMessagingProfileError|string $handleMessagingProfileError = 'false',
        Page|array|null $page = null,
        Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): PhoneNumberDeleteResponse;

    /**
     * @api
     *
     * @param \Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter|FilterShape1 $filter Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source]
     * @param bool $includeConnection include the connection associated with the phone number
     * @param bool $includeTags include the tags associated with the phone number
     * @param \Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Page|PageShape1 $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param \Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Sort|value-of<\Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Sort> $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<PhoneNumberSlimListResponse>
     *
     * @throws APIException
     */
    public function slimList(
        \Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter|array|null $filter = null,
        bool $includeConnection = false,
        bool $includeTags = false,
        \Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Page|array|null $page = null,
        \Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Sort|string|null $sort = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination;
}
