<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update a phone number.
 *
 * @see Telnyx\Services\PhoneNumbersService::update()
 *
 * @phpstan-type PhoneNumberUpdateParamsShape = array{
 *   billingGroupID?: string|null,
 *   connectionID?: string|null,
 *   customerReference?: string|null,
 *   externalPin?: string|null,
 *   hdVoiceEnabled?: bool|null,
 *   tags?: list<string>|null,
 * }
 */
final class PhoneNumberUpdateParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Identifies the billing group associated with the phone number.
     */
    #[Optional('billing_group_id')]
    public ?string $billingGroupID;

    /**
     * Identifies the connection associated with the phone number.
     */
    #[Optional('connection_id')]
    public ?string $connectionID;

    /**
     * A customer reference string for customer look ups.
     */
    #[Optional('customer_reference')]
    public ?string $customerReference;

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    #[Optional('external_pin')]
    public ?string $externalPin;

    /**
     * Indicates whether HD voice is enabled for this number.
     */
    #[Optional('hd_voice_enabled')]
    public ?bool $hdVoiceEnabled;

    /**
     * A list of user-assigned tags to help organize phone numbers.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string')]
    public ?array $tags;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $tags
     */
    public static function with(
        ?string $billingGroupID = null,
        ?string $connectionID = null,
        ?string $customerReference = null,
        ?string $externalPin = null,
        ?bool $hdVoiceEnabled = null,
        ?array $tags = null,
    ): self {
        $self = new self;

        null !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        null !== $connectionID && $self['connectionID'] = $connectionID;
        null !== $customerReference && $self['customerReference'] = $customerReference;
        null !== $externalPin && $self['externalPin'] = $externalPin;
        null !== $hdVoiceEnabled && $self['hdVoiceEnabled'] = $hdVoiceEnabled;
        null !== $tags && $self['tags'] = $tags;

        return $self;
    }

    /**
     * Identifies the billing group associated with the phone number.
     */
    public function withBillingGroupID(string $billingGroupID): self
    {
        $self = clone $this;
        $self['billingGroupID'] = $billingGroupID;

        return $self;
    }

    /**
     * Identifies the connection associated with the phone number.
     */
    public function withConnectionID(string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * A customer reference string for customer look ups.
     */
    public function withCustomerReference(string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * If someone attempts to port your phone number away from Telnyx and your phone number has an external PIN set, we will attempt to verify that you provided the correct external PIN to the winning carrier. Note that not all carriers cooperate with this security mechanism.
     */
    public function withExternalPin(string $externalPin): self
    {
        $self = clone $this;
        $self['externalPin'] = $externalPin;

        return $self;
    }

    /**
     * Indicates whether HD voice is enabled for this number.
     */
    public function withHDVoiceEnabled(bool $hdVoiceEnabled): self
    {
        $self = clone $this;
        $self['hdVoiceEnabled'] = $hdVoiceEnabled;

        return $self;
    }

    /**
     * A list of user-assigned tags to help organize phone numbers.
     *
     * @param list<string> $tags
     */
    public function withTags(array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }
}
