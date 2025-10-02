<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse;
use Telnyx\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Page;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Sort;
use Telnyx\PhoneNumbers\PhoneNumberListResponse;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse;
use Telnyx\PhoneNumbers\PhoneNumberUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface PhoneNumbersContract
{
    /**
     * @api
     *
     * @return PhoneNumberGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberGetResponse;

    /**
     * @api
     *
     * @return PhoneNumberGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberGetResponse;

    /**
     * @api
     *
     * @param string $billingGroupID identifies the billing group associated with the phone number
     * @param string $connectionID identifies the connection associated with the phone number
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $externalPin If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     * @param bool $hdVoiceEnabled indicates whether HD voice is enabled for this number
     * @param list<string> $tags a list of user-assigned tags to help organize phone numbers
     *
     * @return PhoneNumberUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $billingGroupID = omit,
        $connectionID = omit,
        $customerReference = omit,
        $externalPin = omit,
        $hdVoiceEnabled = omit,
        $tags = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PhoneNumberUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Sort|value-of<Sort> $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @return PhoneNumberListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $filter = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PhoneNumberListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberListResponse;

    /**
     * @api
     *
     * @return PhoneNumberDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberDeleteResponse;

    /**
     * @api
     *
     * @return PhoneNumberDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberDeleteResponse;

    /**
     * @api
     *
     * @param Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source]
     * @param bool $includeConnection include the connection associated with the phone number
     * @param bool $includeTags include the tags associated with the phone number
     * @param Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Sort|value-of<Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Sort> $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @return PhoneNumberSlimListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function slimList(
        $filter = omit,
        $includeConnection = omit,
        $includeTags = omit,
        $page = omit,
        $sort = omit,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberSlimListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return PhoneNumberSlimListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function slimListRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): PhoneNumberSlimListResponse;
}
