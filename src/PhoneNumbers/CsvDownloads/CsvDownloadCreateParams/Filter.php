<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter\Status;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter\VoiceConnectionName;
use Telnyx\PhoneNumbers\CsvDownloads\CsvDownloadCreateParams\Filter\VoiceUsagePaymentMethod;

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
        $self = new self;

        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $emergencyAddressID && $self['emergencyAddressID'] = $emergencyAddressID;
        null !== $hasBundle && $self['hasBundle'] = $hasBundle;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $status && $self['status'] = $status;
        null !== $tag && $self['tag'] = $tag;
        null !== $voiceConnectionName && $self['voiceConnectionName'] = $voiceConnectionName;
        null !== $voiceUsagePaymentMethod && $self['voiceUsagePaymentMethod'] = $voiceUsagePaymentMethod;

        return $self;
    }

    /**
     * Filter by the billing_group_id associated with phone numbers. To filter to only phone numbers that have no billing group associated them, set the value of this filter to the string 'null'.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $self = clone $this;
        $self['billingGroupID'] = $billingGroupID;

        return $self;
    }

    /**
     * Filter by connection_id.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * Filter numbers via the customer_reference set.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Filter by the emergency_address_id associated with phone numbers. To filter only phone numbers that have no emergency address associated with them, set the value of this filter to the string 'null'.
     */
    public function withEmergencyAddressID(string $emergencyAddressID): self
    {
        $self = clone $this;
        $self['emergencyAddressID'] = $emergencyAddressID;

        return $self;
    }

    /**
     * Filter by phone number that have bundles.
     */
    public function withHasBundle(string $hasBundle): self
    {
        $self = clone $this;
        $self['hasBundle'] = $hasBundle;

        return $self;
    }

    /**
     * Filter by phone number. Requires at least three digits.
     *              Non-numerical characters will result in no values being returned.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Filter by phone number status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Filter by phone number tags.
     */
    public function withTag(string $tag): self
    {
        $self = clone $this;
        $self['tag'] = $tag;

        return $self;
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
        $self = clone $this;
        $self['voiceConnectionName'] = $voiceConnectionName;

        return $self;
    }

    /**
     * Filter by usage_payment_method.
     *
     * @param VoiceUsagePaymentMethod|value-of<VoiceUsagePaymentMethod> $voiceUsagePaymentMethod
     */
    public function withVoiceUsagePaymentMethod(
        VoiceUsagePaymentMethod|string $voiceUsagePaymentMethod
    ): self {
        $self = clone $this;
        $self['voiceUsagePaymentMethod'] = $voiceUsagePaymentMethod;

        return $self;
    }
}
