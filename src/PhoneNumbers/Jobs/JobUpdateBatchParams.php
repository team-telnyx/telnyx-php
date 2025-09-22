<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter;
use Telnyx\PhoneNumbers\Voice\UpdateVoiceSettings;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new JobUpdateBatchParams); // set properties as needed
 * $client->phoneNumbers.jobs->updateBatch(...$params->toArray());
 * ```
 * Creates a new background job to update a batch of numbers. At most one thousand numbers can be updated per API call. At least one of the updateable fields must be submitted. IMPORTANT: You must either specify filters (using the filter parameters) or specific phone numbers (using the phone_numbers parameter in the request body). If you specify filters, ALL phone numbers that match the given filters (up to 1000 at a time) will be updated. If you want to update only specific numbers, you must use the phone_numbers parameter in the request body. When using the phone_numbers parameter, ensure you follow the correct format as shown in the example (either phone number IDs or phone numbers in E164 format).
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->phoneNumbers.jobs->updateBatch(...$params->toArray());`
 *
 * @see Telnyx\PhoneNumbers\Jobs->updateBatch
 *
 * @phpstan-type job_update_batch_params = array{
 *   phoneNumbers: list<string>,
 *   filter?: Filter,
 *   billingGroupID?: string,
 *   connectionID?: string,
 *   customerReference?: string,
 *   deletionLockEnabled?: bool,
 *   externalPin?: string,
 *   hdVoiceEnabled?: bool,
 *   tags?: list<string>,
 *   voice?: UpdateVoiceSettings,
 * }
 */
final class JobUpdateBatchParams implements BaseModel
{
    /** @use SdkModel<job_update_batch_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Array of phone number ids and/or phone numbers in E164 format to update. This parameter is required if no filter parameters are provided. If you want to update specific numbers rather than all numbers matching a filter, you must use this parameter. Each item must be either a valid phone number ID or a phone number in E164 format (e.g., '+13127367254').
     *
     * @var list<string> $phoneNumbers
     */
    #[Api('phone_numbers', list: 'string')]
    public array $phoneNumbers;

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference].
     */
    #[Api(optional: true)]
    public ?Filter $filter;

    /**
     * Identifies the billing group associated with the phone number.
     */
    #[Api('billing_group_id', optional: true)]
    public ?string $billingGroupID;

    /**
     * Identifies the connection associated with the phone number.
     */
    #[Api('connection_id', optional: true)]
    public ?string $connectionID;

    /**
     * A customer reference string for customer look ups.
     */
    #[Api('customer_reference', optional: true)]
    public ?string $customerReference;

    /**
     * Indicates whether to enable or disable the deletion lock on each phone number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     */
    #[Api('deletion_lock_enabled', optional: true)]
    public ?bool $deletionLockEnabled;

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    #[Api('external_pin', optional: true)]
    public ?string $externalPin;

    /**
     * Indicates whether to enable or disable HD Voice on each phone number. HD Voice is a paid feature and may not be available for all phone numbers, more details about it can be found in the Telnyx support documentation.
     */
    #[Api('hd_voice_enabled', optional: true)]
    public ?bool $hdVoiceEnabled;

    /**
     * A list of user-assigned tags to help organize phone numbers.
     *
     * @var list<string>|null $tags
     */
    #[Api(list: 'string', optional: true)]
    public ?array $tags;

    #[Api(optional: true)]
    public ?UpdateVoiceSettings $voice;

    /**
     * `new JobUpdateBatchParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * JobUpdateBatchParams::with(phoneNumbers: ...)
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
     * @param list<string> $phoneNumbers
     * @param list<string> $tags
     */
    public static function with(
        array $phoneNumbers,
        ?Filter $filter = null,
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?bool $deletionLockEnabled = null,
        ?string $externalPin = null,
        ?bool $hdVoiceEnabled = null,
        ?array $tags = null,
        ?UpdateVoiceSettings $voice = null,
    ): self {
        $obj = new self;

        $obj->phoneNumbers = $phoneNumbers;

        null !== $filter && $obj->filter = $filter;
        null !== $billingGroupID && $obj->billingGroupID = $billingGroupID;
        null !== $connectionID && $obj->connectionID = $connectionID;
        null !== $customerReference && $obj->customerReference = $customerReference;
        null !== $deletionLockEnabled && $obj->deletionLockEnabled = $deletionLockEnabled;
        null !== $externalPin && $obj->externalPin = $externalPin;
        null !== $hdVoiceEnabled && $obj->hdVoiceEnabled = $hdVoiceEnabled;
        null !== $tags && $obj->tags = $tags;
        null !== $voice && $obj->voice = $voice;

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
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    /**
     * Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference].
     */
    public function withFilter(Filter $filter): self
    {
        $obj = clone $this;
        $obj->filter = $filter;

        return $obj;
    }

    /**
     * Identifies the billing group associated with the phone number.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj->billingGroupID = $billingGroupID;

        return $obj;
    }

    /**
     * Identifies the connection associated with the phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj->connectionID = $connectionID;

        return $obj;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj->customerReference = $customerReference;

        return $obj;
    }

    /**
     * Indicates whether to enable or disable the deletion lock on each phone number. When enabled, this prevents the phone number from being deleted via the API or Telnyx portal.
     */
    public function withDeletionLockEnabled(bool $deletionLockEnabled): self
    {
        $obj = clone $this;
        $obj->deletionLockEnabled = $deletionLockEnabled;

        return $obj;
    }

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    public function withExternalPin(string $externalPin): self
    {
        $obj = clone $this;
        $obj->externalPin = $externalPin;

        return $obj;
    }

    /**
     * Indicates whether to enable or disable HD Voice on each phone number. HD Voice is a paid feature and may not be available for all phone numbers, more details about it can be found in the Telnyx support documentation.
     */
    public function withHDVoiceEnabled(bool $hdVoiceEnabled): self
    {
        $obj = clone $this;
        $obj->hdVoiceEnabled = $hdVoiceEnabled;

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
        $obj->tags = $tags;

        return $obj;
    }

    public function withVoice(UpdateVoiceSettings $voice): self
    {
        $obj = clone $this;
        $obj->voice = $voice;

        return $obj;
    }
}
