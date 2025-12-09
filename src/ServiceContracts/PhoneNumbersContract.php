<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\PhoneNumbers\PhoneNumberDeleteResponse;
use Telnyx\PhoneNumbers\PhoneNumberGetResponse;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\NumberType\Eq;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\Source;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\Status;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\VoiceUsagePaymentMethod;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Filter\WithoutTags;
use Telnyx\PhoneNumbers\PhoneNumberListParams\Sort;
use Telnyx\PhoneNumbers\PhoneNumberListResponse;
use Telnyx\PhoneNumbers\PhoneNumberSlimListResponse;
use Telnyx\PhoneNumbers\PhoneNumberUpdateResponse;
use Telnyx\RequestOptions;

interface PhoneNumbersContract
{
    /**
     * @api
     *
     * @param string $id identifies the resource
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
     * @param string $id identifies the resource
     * @param string $billingGroupID identifies the billing group associated with the phone number
     * @param string $connectionID identifies the connection associated with the phone number
     * @param string $customerReference a customer reference string for customer look ups
     * @param string $externalPin If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     * @param bool $hdVoiceEnabled indicates whether HD voice is enabled for this number
     * @param list<string> $tags a list of user-assigned tags to help organize phone numbers
     *
     * @throws APIException
     */
    public function update(
        string $id,
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $externalPin = null,
        ?bool $hdVoiceEnabled = null,
        ?array $tags = null,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   billingGroupID?: string,
     *   connectionID?: string,
     *   countryISOAlpha2?: string|list<string>,
     *   customerReference?: string,
     *   emergencyAddressID?: string,
     *   numberType?: array{
     *     eq?: 'local'|'national'|'toll_free'|'mobile'|'shared_cost'|Eq
     *   },
     *   phoneNumber?: string,
     *   source?: 'ported'|'purchased'|Source,
     *   status?: 'purchase-pending'|'purchase-failed'|'port-pending'|'active'|'deleted'|'port-failed'|'emergency-only'|'ported-out'|'port-out-pending'|Status,
     *   tag?: string,
     *   voiceConnectionName?: array{
     *     contains?: string, endsWith?: string, eq?: string, startsWith?: string
     *   },
     *   voiceUsagePaymentMethod?: 'pay-per-minute'|'channel'|VoiceUsagePaymentMethod,
     *   withoutTags?: 'true'|'false'|WithoutTags,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param 'purchased_at'|'phone_number'|'connection_name'|'usage_payment_method'|Sort $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        string|Sort|null $sort = null,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberListResponse;

    /**
     * @api
     *
     * @param string $id identifies the resource
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
     * @param array{
     *   billingGroupID?: string,
     *   connectionID?: string,
     *   countryISOAlpha2?: string|list<string>,
     *   customerReference?: string,
     *   emergencyAddressID?: string,
     *   numberType?: array{
     *     eq?: 'local'|'national'|'toll_free'|'mobile'|'shared_cost'|\Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\NumberType\Eq,
     *   },
     *   phoneNumber?: string,
     *   source?: 'ported'|'purchased'|\Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\Source,
     *   status?: 'purchase-pending'|'purchase-failed'|'port_pending'|'active'|'deleted'|'port-failed'|'emergency-only'|'ported-out'|'port-out-pending'|\Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\Status,
     *   tag?: string,
     *   voiceConnectionName?: array{
     *     contains?: string, endsWith?: string, eq?: string, startsWith?: string
     *   },
     *   voiceUsagePaymentMethod?: 'pay-per-minute'|'channel'|\Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Filter\VoiceUsagePaymentMethod,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[tag], filter[phone_number], filter[status], filter[country_iso_alpha2], filter[connection_id], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference], filter[number_type], filter[source]
     * @param bool $includeConnection include the connection associated with the phone number
     * @param bool $includeTags include the tags associated with the phone number
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param 'purchased_at'|'phone_number'|'connection_name'|'usage_payment_method'|\Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Sort $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @throws APIException
     */
    public function slimList(
        ?array $filter = null,
        bool $includeConnection = false,
        bool $includeTags = false,
        ?array $page = null,
        string|\Telnyx\PhoneNumbers\PhoneNumberSlimListParams\Sort|null $sort = null,
        ?RequestOptions $requestOptions = null,
    ): PhoneNumberSlimListResponse;
}
