<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter\Status;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter\VoiceConnectionName;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter\VoiceUsagePaymentMethod;
use Telnyx\PhoneNumbers\Voice\CallForwarding;
use Telnyx\PhoneNumbers\Voice\CallRecording;
use Telnyx\PhoneNumbers\Voice\CnamListing;
use Telnyx\PhoneNumbers\Voice\MediaFeatures;
use Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings;
use Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings\InboundCallScreening;
use Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings\UsagePaymentMethod;

/**
 * Creates a new background job to update a batch of numbers. At most one thousand numbers can be updated per API call. At least one of the updateable fields must be submitted. IMPORTANT: You must either specify filters (using the filter parameters) or specific phone numbers (using the phone_numbers parameter in the request body). If you specify filters, ALL phone numbers that match the given filters (up to 1000 at a time) will be updated. If you want to update only specific numbers, you must use the phone_numbers parameter in the request body. When using the phone_numbers parameter, ensure you follow the correct format as shown in the example (either phone number IDs or phone numbers in E164 format).
 *
 * @see Telnyx\Services\PhoneNumbers\JobsService::updateBatch()
 *
 * @phpstan-type JobUpdateBatchParamsShape = array{
 *   phone_numbers: list<string>,
 *   filter?: Filter|array{
 *     billing_group_id?: string|null,
 *     connection_id?: string|null,
 *     customer_reference?: string|null,
 *     emergency_address_id?: string|null,
 *     has_bundle?: string|null,
 *     phone_number?: string|null,
 *     status?: value-of<Status>|null,
 *     tag?: string|null,
 *     voice_connection_name?: VoiceConnectionName|null,
 *     voice_usage_payment_method?: value-of<VoiceUsagePaymentMethod>|null,
 *   },
 *   billing_group_id?: string,
 *   connection_id?: string,
 *   customer_reference?: string,
 *   deletion_lock_enabled?: bool,
 *   external_pin?: string,
 *   hd_voice_enabled?: bool,
 *   tags?: list<string>,
 *   voice?: UpdateVoiceSettings|array{
 *     call_forwarding?: CallForwarding|null,
 *     call_recording?: CallRecording|null,
 *     caller_id_name_enabled?: bool|null,
 *     cnam_listing?: CnamListing|null,
 *     inbound_call_screening?: value-of<InboundCallScreening>|null,
 *     media_features?: MediaFeatures|null,
 *     tech_prefix_enabled?: bool|null,
 *     translated_number?: string|null,
 *     usage_payment_method?: value-of<UsagePaymentMethod>|null,
 *   },
 * }
 */
final class JobUpdateBatchParams implements BaseModel
{
    /** @use SdkModel<JobUpdateBatchParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of phone number ids and/or phone numbers in E164 format to update. This parameter is required if no filter parameters are provided. If you want to update specific numbers rather than all numbers matching a filter, you must use this parameter. Each item must be either a valid phone number ID or a phone number in E164 format (e.g., '+13127367254').
     *
     * @var list<string> $phone_numbers
     */
    #[Required(list: 'string')]
    public array $phone_numbers;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference].
     */
    #[Optional]
    public ?Filter $filter;

    /**
     * Identifies the billing group associated with the phone number.
     */
    #[Optional]
    public ?string $billing_group_id;

    /**
     * Identifies the connection associated with the phone number.
     */
    #[Optional]
    public ?string $connection_id;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional]
    public ?string $customer_reference;

    /**
     * Indicates whether to enable or disable the deletion lock on each phone number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     */
    #[Optional]
    public ?bool $deletion_lock_enabled;

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    #[Optional]
    public ?string $external_pin;

    /**
     * Indicates whether to enable or disable HD Voice on each phone number. HD Voice is a paid feature and may not be available for all phone numbers, more details about it can be found in the Telnyx support documentation.
     */
    #[Optional]
    public ?bool $hd_voice_enabled;

    /**
     * A list of user-assigned tags to help organize phone numbers.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    #[Optional]
    public ?UpdateVoiceSettings $voice;

    /**
     * `new JobUpdateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JobUpdateBatchParams::with(phone_numbers: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new JobUpdateBatchParams)->withPhoneNumbers(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $phone_numbers
     * @param Filter|array{
     *   billing_group_id?: string|null,
     *   connection_id?: string|null,
     *   customer_reference?: string|null,
     *   emergency_address_id?: string|null,
     *   has_bundle?: string|null,
     *   phone_number?: string|null,
     *   status?: value-of<Status>|null,
     *   tag?: string|null,
     *   voice_connection_name?: VoiceConnectionName|null,
     *   voice_usage_payment_method?: value-of<VoiceUsagePaymentMethod>|null,
     * } $filter
     * @param list<string> $tags
     * @param UpdateVoiceSettings|array{
     *   call_forwarding?: CallForwarding|null,
     *   call_recording?: CallRecording|null,
     *   caller_id_name_enabled?: bool|null,
     *   cnam_listing?: CnamListing|null,
     *   inbound_call_screening?: value-of<InboundCallScreening>|null,
     *   media_features?: MediaFeatures|null,
     *   tech_prefix_enabled?: bool|null,
     *   translated_number?: string|null,
     *   usage_payment_method?: value-of<UsagePaymentMethod>|null,
     * } $voice
     */
    public static function with(
        array $phone_numbers,
        Filter|array|null $filter = null,
        ?string $billing_group_id = null,
        ?string $connection_id = null,
        ?string $customer_reference = null,
        ?bool $deletion_lock_enabled = null,
        ?string $external_pin = null,
        ?bool $hd_voice_enabled = null,
        ?array $tags = null,
        UpdateVoiceSettings|array|null $voice = null,
    ): self {
        $obj = new self;

        $obj['phone_numbers'] = $phone_numbers;

        null !== $filter && $obj['filter'] = $filter;
        null !== $billing_group_id && $obj['billing_group_id'] = $billing_group_id;
        null !== $connection_id && $obj['connection_id'] = $connection_id;
        null !== $customer_reference && $obj['customer_reference'] = $customer_reference;
        null !== $deletion_lock_enabled && $obj['deletion_lock_enabled'] = $deletion_lock_enabled;
        null !== $external_pin && $obj['external_pin'] = $external_pin;
        null !== $hd_voice_enabled && $obj['hd_voice_enabled'] = $hd_voice_enabled;
        null !== $tags && $obj['tags'] = $tags;
        null !== $voice && $obj['voice'] = $voice;

        return $obj;
    }

    /**
     * Array of phone number ids and/or phone numbers in E164 format to update. This parameter is required if no filter parameters are provided. If you want to update specific numbers rather than all numbers matching a filter, you must use this parameter. Each item must be either a valid phone number ID or a phone number in E164 format (e.g., '+13127367254').
     *
     * @param list<string> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phone_numbers'] = $phoneNumbers;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference].
     *
     * @param Filter|array{
     *   billing_group_id?: string|null,
     *   connection_id?: string|null,
     *   customer_reference?: string|null,
     *   emergency_address_id?: string|null,
     *   has_bundle?: string|null,
     *   phone_number?: string|null,
     *   status?: value-of<Status>|null,
     *   tag?: string|null,
     *   voice_connection_name?: VoiceConnectionName|null,
     *   voice_usage_payment_method?: value-of<VoiceUsagePaymentMethod>|null,
     * } $filter
     */
    public function withFilter(Filter|array $filter): self
    {
        $obj = clone $this;
        $obj['filter'] = $filter;

        return $obj;
    }

    /**
     * Identifies the billing group associated with the phone number.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj['billing_group_id'] = $billingGroupID;

        return $obj;
    }

    /**
     * Identifies the connection associated with the phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connection_id'] = $connectionID;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customer_reference'] = $customerReference;

        return $obj;
    }

    /**
     * Indicates whether to enable or disable the deletion lock on each phone number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     */
    public function withDeletionLockEnabled(bool $deletionLockEnabled): self
    {
        $obj = clone $this;
        $obj['deletion_lock_enabled'] = $deletionLockEnabled;

        return $obj;
    }

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    public function withExternalPin(string $externalPin): self
    {
        $obj = clone $this;
        $obj['external_pin'] = $externalPin;

        return $obj;
    }

    /**
     * Indicates whether to enable or disable HD Voice on each phone number. HD Voice is a paid feature and may not be available for all phone numbers, more details about it can be found in the Telnyx support documentation.
     */
    public function withHDVoiceEnabled(bool $hdVoiceEnabled): self
    {
        $obj = clone $this;
        $obj['hd_voice_enabled'] = $hdVoiceEnabled;

        return $obj;
    }

    /**
     * A list of user-assigned tags to help organize phone numbers.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $obj = clone $this;
        $obj['tags'] = $tags;

        return $obj;
    }

    /**
     * @param UpdateVoiceSettings|array{
     *   call_forwarding?: CallForwarding|null,
     *   call_recording?: CallRecording|null,
     *   caller_id_name_enabled?: bool|null,
     *   cnam_listing?: CnamListing|null,
     *   inbound_call_screening?: value-of<InboundCallScreening>|null,
     *   media_features?: MediaFeatures|null,
     *   tech_prefix_enabled?: bool|null,
     *   translated_number?: string|null,
     *   usage_payment_method?: value-of<UsagePaymentMethod>|null,
     * } $voice
     */
    public function withVoice(UpdateVoiceSettings|array $voice): self
    {
        $obj = clone $this;
        $obj['voice'] = $voice;

        return $obj;
    }
}
