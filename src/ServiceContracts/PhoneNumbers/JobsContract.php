<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\PhoneNumbers;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\PhoneNumbers\Jobs\JobDeleteBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobGetResponse;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Filter\Type;
use Telnyx\PhoneNumbers\Jobs\JobListParams\Sort;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter\Status;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter\VoiceUsagePaymentMethod;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchResponse;
use Telnyx\PhoneNumbers\Jobs\JobUpdateEmergencySettingsBatchResponse;
use Telnyx\PhoneNumbers\Jobs\PhoneNumbersJob;
use Telnyx\PhoneNumbers\Voice\CallForwarding;
use Telnyx\PhoneNumbers\Voice\CallForwarding\ForwardingType;
use Telnyx\PhoneNumbers\Voice\CallRecording;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingChannels;
use Telnyx\PhoneNumbers\Voice\CallRecording\InboundCallRecordingFormat;
use Telnyx\PhoneNumbers\Voice\CnamListing;
use Telnyx\PhoneNumbers\Voice\MediaFeatures;
use Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings\InboundCallScreening;
use Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings\UsagePaymentMethod;
use Telnyx\RequestOptions;

interface JobsContract
{
    /**
     * @api
     *
     * @param string $id identifies the Phone Numbers Job
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): JobGetResponse;

    /**
     * @api
     *
     * @param array{
     *   type?: 'update_emergency_settings'|'delete_phone_numbers'|'update_phone_numbers'|Type,
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[type]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param 'created_at'|Sort $sort Specifies the sort order for results. If not given, results are sorted by created_at in descending order.
     *
     * @return DefaultPagination<PhoneNumbersJob>
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        string|Sort|null $sort = null,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @param list<string> $phoneNumbers
     *
     * @throws APIException
     */
    public function deleteBatch(
        array $phoneNumbers,
        ?RequestOptions $requestOptions = null
    ): JobDeleteBatchResponse;

    /**
     * @api
     *
     * @param list<string> $phoneNumbers Body param: Array of phone number ids and/or phone numbers in E164 format to update. This parameter is required if no filter parameters are provided. If you want to update specific numbers rather than all numbers matching a filter, you must use this parameter. Each item must be either a valid phone number ID or a phone number in E164 format (e.g., '+13127367254').
     * @param array{
     *   billingGroupID?: string,
     *   connectionID?: string,
     *   customerReference?: string,
     *   emergencyAddressID?: string,
     *   hasBundle?: string,
     *   phoneNumber?: string,
     *   status?: 'purchase-pending'|'purchase-failed'|'port-pending'|'active'|'deleted'|'port-failed'|'emergency-only'|'ported-out'|'port-out-pending'|Status,
     *   tag?: string,
     *   voiceConnectionName?: array{
     *     contains?: string, endsWith?: string, eq?: string, startsWith?: string
     *   },
     *   voiceUsagePaymentMethod?: 'pay-per-minute'|'channel'|VoiceUsagePaymentMethod,
     * } $filter Query param: Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference]
     * @param string $billingGroupID body param: Identifies the billing group associated with the phone number
     * @param string $connectionID body param: Identifies the connection associated with the phone number
     * @param string $customerReference body param: A customer reference string for customer look ups
     * @param bool $deletionLockEnabled Body param: Indicates whether to enable or disable the deletion lock on each phone number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     * @param string $externalPin Body param: If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     * @param bool $hdVoiceEnabled Body param: Indicates whether to enable or disable HD Voice on each phone number. HD Voice is a paid feature and may not be available for all phone numbers, more details about it can be found in the Telnyx support documentation.
     * @param list<string> $tags body param: A list of user-assigned tags to help organize phone numbers
     * @param array{
     *   callForwarding?: array{
     *     callForwardingEnabled?: bool,
     *     forwardingType?: 'always'|'on-failure'|ForwardingType,
     *     forwardsTo?: string,
     *   }|CallForwarding,
     *   callRecording?: array{
     *     inboundCallRecordingChannels?: 'single'|'dual'|InboundCallRecordingChannels,
     *     inboundCallRecordingEnabled?: bool,
     *     inboundCallRecordingFormat?: 'wav'|'mp3'|InboundCallRecordingFormat,
     *   }|CallRecording,
     *   callerIDNameEnabled?: bool,
     *   cnamListing?: array{
     *     cnamListingDetails?: string, cnamListingEnabled?: bool
     *   }|CnamListing,
     *   inboundCallScreening?: 'disabled'|'reject_calls'|'flag_calls'|InboundCallScreening,
     *   mediaFeatures?: array{
     *     acceptAnyRtpPacketsEnabled?: bool,
     *     rtpAutoAdjustEnabled?: bool,
     *     t38FaxGatewayEnabled?: bool,
     *   }|MediaFeatures,
     *   techPrefixEnabled?: bool,
     *   translatedNumber?: string,
     *   usagePaymentMethod?: 'pay-per-minute'|'channel'|UsagePaymentMethod,
     * } $voice Body param:
     *
     * @throws APIException
     */
    public function updateBatch(
        array $phoneNumbers,
        ?array $filter = null,
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?bool $deletionLockEnabled = null,
        ?string $externalPin = null,
        ?bool $hdVoiceEnabled = null,
        ?array $tags = null,
        ?array $voice = null,
        ?RequestOptions $requestOptions = null,
    ): JobUpdateBatchResponse;

    /**
     * @api
     *
     * @param bool $emergencyEnabled indicates whether to enable or disable emergency services on the numbers
     * @param list<string> $phoneNumbers
     * @param string|null $emergencyAddressID Identifies the address to be used with emergency services. Required if emergency_enabled is true, must be null or omitted if emergency_enabled is false.
     *
     * @throws APIException
     */
    public function updateEmergencySettingsBatch(
        bool $emergencyEnabled,
        array $phoneNumbers,
        ?string $emergencyAddressID = null,
        ?RequestOptions $requestOptions = null,
    ): JobUpdateEmergencySettingsBatchResponse;
}
