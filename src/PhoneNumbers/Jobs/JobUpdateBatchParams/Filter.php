<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter\Status;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter\VoiceConnectionName;
use Telnyx\PhoneNumbers\Jobs\JobUpdateBatchParams\Filter\VoiceUsagePaymentMethod;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[has_bundle], filter[tag], filter[connection_id], filter[phone_number], filter[status], filter[voice.connection_name], filter[voice.usage_payment_method], filter[billing_group_id], filter[emergency_address_id], filter[customer_reference].
 *
 * @phpstan-type FilterShape = array{
 *   billingGroupID?: string|null,
 *   connectionID?: string|null,
 *   customerReference?: string|null,
 *   emergencyAddressID?: string|null,
 *   hasBundle?: string|null,
 *   phoneNumber?: string|null,
 *   status?: value-of<Status>|null,
 *   tag?: string|null,
 *   voiceConnectionName?: VoiceConnectionName|null,
 *   voiceUsagePaymentMethod?: value-of<VoiceUsagePaymentMethod>|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by the billing_group_id associated with phone numbers. To filter to only phone numbers that have no billing group associated them, set the value of this filter to the string 'null'.
     */
    #[Optional('billing_group_id')]
    public ?string $billingGroupID;

    /**
     * Filter by connection_id.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * Filter numbers via the customer_reference set.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * Filter by the emergency_address_id associated with phone numbers. To filter only phone numbers that have no emergency address associated with them, set the value of this filter to the string 'null'.
     */
    #[Optional('emergency_address_id')]
    public ?string $emergencyAddressID;

    /**
     * Filter by phone number that have bundles.
     */
    #[Optional('has_bundle')]
    public ?string $hasBundle;

    /**
     * Filter by phone number. Requires at least three digits.
     *              Non-numerical characters will result in no values being returned.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Filter by phone number status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * Filter by phone number tags.
     */
    #[Optional]
    public ?string $tag;

    /**
     * Filter by voice connection name pattern matching.
     */
    #[Optional('voice.connection_name')]
    public ?VoiceConnectionName $voiceConnectionName;

    /**
     * Filter by usage_payment_method.
     *
     * @var value-of<VoiceUsagePaymentMethod>|null $voiceUsagePaymentMethod
     */
    #[Optional(
        'voice.usage_payment_method',
        enum: VoiceUsagePaymentMethod::class
    )]
    public ?string $voiceUsagePaymentMethod;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     * @param VoiceConnectionName|array{
     *   contains?: string|null,
     *   endsWith?: string|null,
     *   eq?: string|null,
     *   startsWith?: string|null,
     * } $voiceConnectionName
     * @param VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod> $voiceUsagePaymentMethod
     */
    public static function with(
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $emergencyAddressID = null,
        ?string $hasBundle = null,
        ?string $phoneNumber = null,
        Status|string|null $status = null,
        ?string $tag = null,
        VoiceConnectionName|array|null $voiceConnectionName = null,
        VoiceUsagePaymentMethod|string|null $voiceUsagePaymentMethod = null,
    ): self {
        $obj = new self;

        null !== $billingGroupID && $obj['billingGroupID'] = $billingGroupID;
        null !== $connectionID && $obj['connectionID'] = $connectionID;
        null !== $customerReference && $obj['customerReference'] = $customerReference;
        null !== $emergencyAddressID && $obj['emergencyAddressID'] = $emergencyAddressID;
        null !== $hasBundle && $obj['hasBundle'] = $hasBundle;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $status && $obj['status'] = $status;
        null !== $tag && $obj['tag'] = $tag;
        null !== $voiceConnectionName && $obj['voiceConnectionName'] = $voiceConnectionName;
        null !== $voiceUsagePaymentMethod && $obj['voiceUsagePaymentMethod'] = $voiceUsagePaymentMethod;

        return $obj;
    }

    /**
     * Filter by the billing_group_id associated with phone numbers. To filter to only phone numbers that have no billing group associated them, set the value of this filter to the string 'null'.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $obj = clone $this;
        $obj['billingGroupID'] = $billingGroupID;

        return $obj;
    }

    /**
     * Filter by connection_id.
     */
    public function withConnectionID(string $connectionID): self
    {
        $obj = clone $this;
        $obj['connectionID'] = $connectionID;

        return $obj;
    }

    /**
     * Filter numbers via the customer_reference set.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $obj = clone $this;
        $obj['customerReference'] = $customerReference;

        return $obj;
    }

    /**
     * Filter by the emergency_address_id associated with phone numbers. To filter only phone numbers that have no emergency address associated with them, set the value of this filter to the string 'null'.
     */
    public function withEmergencyAddressID(string $emergencyAddressID): self
    {
        $obj = clone $this;
        $obj['emergencyAddressID'] = $emergencyAddressID;

        return $obj;
    }

    /**
     * Filter by phone number that have bundles.
     */
    public function withHasBundle(string $hasBundle): self
    {
        $obj = clone $this;
        $obj['hasBundle'] = $hasBundle;

        return $obj;
    }

    /**
     * Filter by phone number. Requires at least three digits.
     *              Non-numerical characters will result in no values being returned.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * Filter by phone number status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filter by phone number tags.
     */
    public function withTag(string $tag): self
    {
        $obj = clone $this;
        $obj['tag'] = $tag;

        return $obj;
    }

    /**
     * Filter by voice connection name pattern matching.
     *
     * @param VoiceConnectionName|array{
     *   contains?: string|null,
     *   endsWith?: string|null,
     *   eq?: string|null,
     *   startsWith?: string|null,
     * } $voiceConnectionName
     */
    public function withVoiceConnectionName(
        VoiceConnectionName|array $voiceConnectionName
    ): self {
        $obj = clone $this;
        $obj['voiceConnectionName'] = $voiceConnectionName;

        return $obj;
    }

    /**
     * Filter by usage_payment_method.
     *
     * @param VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod> $voiceUsagePaymentMethod
     */
    public function withVoiceUsagePaymentMethod(
        VoiceUsagePaymentMethod|string $voiceUsagePaymentMethod
    ): self {
        $obj = clone $this;
        $obj['voiceUsagePaymentMethod'] = $voiceUsagePaymentMethod;

        return $obj;
    }
}
