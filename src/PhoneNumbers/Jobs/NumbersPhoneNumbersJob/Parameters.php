<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\PhoneNumber;
use Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\Voice;

/**
 * Effective parameters saved when the job was created, not a snapshot of the original HTTP request or current phone-number settings. Update jobs include the saved update fields; emergency-settings jobs include the saved emergency fields; delete jobs include only targets. Absent fields are omitted, and saved false, null and empty values are preserved. Tags may be normalized to arrays; filter-created jobs contain resolved target identifiers rather than the original filters. Historical jobs with no saved arguments return an empty object.
 *
 * @phpstan-import-type PhoneNumberVariants from \Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\PhoneNumber
 * @phpstan-import-type PhoneNumberShape from \Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\PhoneNumber
 * @phpstan-import-type VoiceShape from \Telnyx\PhoneNumbers\Jobs\NumbersPhoneNumbersJob\Parameters\Voice
 *
 * @phpstan-type ParametersShape = array{
 *   addTags?: list<string>|null,
 *   billingGroupID?: string|null,
 *   connectionID?: string|null,
 *   customerReference?: string|null,
 *   deletionLockEnabled?: bool|null,
 *   emergencyAddressID?: string|null,
 *   emergencyEnabled?: bool|null,
 *   externalPin?: string|null,
 *   hdVoiceEnabled?: bool|null,
 *   phoneNumbers?: list<PhoneNumberShape>|null,
 *   removeTags?: list<string>|null,
 *   tags?: list<string>|null,
 *   voice?: null|Voice|VoiceShape,
 * }
 */
final class Parameters implements BaseModel
{
    /** @use SdkModel<ParametersShape> */
    use SdkModel;

    /**
     * Saved add_tags for an update_phone_numbers job. Values reflect creation-time normalization.
     *
     * @var list<string>|null $addTags
     */
    #[Optional('add_tags', list: 'string', nullable: true)]
    public ?array $addTags;

    /**
     * Saved billing_group_id supplied for an update_phone_numbers job.
     */
    #[Optional('billing_group_id', nullable: true)]
    public ?string $billingGroupID;

    /**
     * Saved connection_id supplied for an update_phone_numbers job.
     */
    #[Optional('connection_id', nullable: true)]
    public ?string $connectionID;

    /**
     * Saved customer_reference supplied for an update_phone_numbers job.
     */
    #[Optional('customer_reference', nullable: true)]
    public ?string $customerReference;

    /**
     * Saved deletion_lock_enabled supplied for an update_phone_numbers job.
     */
    #[Optional('deletion_lock_enabled', nullable: true)]
    public ?bool $deletionLockEnabled;

    /**
     * Saved emergency address identifier for an update_emergency_settings job. An explicitly supplied null is preserved.
     */
    #[Optional('emergency_address_id', nullable: true)]
    public ?string $emergencyAddressID;

    /**
     * Saved emergency-services setting for an update_emergency_settings job.
     */
    #[Optional('emergency_enabled', nullable: true)]
    public ?bool $emergencyEnabled;

    /**
     * Saved external_pin supplied for an update_phone_numbers job.
     */
    #[Optional('external_pin', nullable: true)]
    public ?string $externalPin;

    /**
     * Saved hd_voice_enabled supplied for an update_phone_numbers job.
     */
    #[Optional('hd_voice_enabled', nullable: true)]
    public ?bool $hdVoiceEnabled;

    /**
     * Saved target phone numbers in E.164 format and/or identifiers. Jobs created using filters contain the resolved identifiers, not the original filter expression. Stored identifier types are preserved.
     *
     * @var list<PhoneNumberVariants>|null $phoneNumbers
     */
    #[Optional('phone_numbers', list: PhoneNumber::class)]
    public ?array $phoneNumbers;

    /**
     * Saved remove_tags for an update_phone_numbers job. Values reflect creation-time normalization.
     *
     * @var list<string>|null $removeTags
     */
    #[Optional('remove_tags', list: 'string', nullable: true)]
    public ?array $removeTags;

    /**
     * Saved tags for an update_phone_numbers job. Values reflect creation-time normalization.
     *
     * @var list<string>|null $tags
     */
    #[Optional(list: 'string', nullable: true)]
    public ?array $tags;

    /**
     * Saved voice settings for an update_phone_numbers job, using the public field names and nesting. Only settings present at creation are returned.
     */
    #[Optional]
    public ?Voice $voice;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|Omitted|null $addTags
     * @param list<string>|Omitted|null $removeTags
     * @param list<string>|Omitted|null $tags
     * @param list<PhoneNumberShape>|null $phoneNumbers
     * @param Voice|VoiceShape|null $voice
     */
    public static function with(
        array|Omitted|null $addTags = Omitted::VALUE,
        string|Omitted|null $billingGroupID = Omitted::VALUE,
        string|Omitted|null $connectionID = Omitted::VALUE,
        string|Omitted|null $customerReference = Omitted::VALUE,
        bool|Omitted|null $deletionLockEnabled = Omitted::VALUE,
        string|Omitted|null $emergencyAddressID = Omitted::VALUE,
        bool|Omitted|null $emergencyEnabled = Omitted::VALUE,
        string|Omitted|null $externalPin = Omitted::VALUE,
        bool|Omitted|null $hdVoiceEnabled = Omitted::VALUE,
        array|Omitted|null $removeTags = Omitted::VALUE,
        array|Omitted|null $tags = Omitted::VALUE,
        ?array $phoneNumbers = null,
        Voice|array|null $voice = null,
    ): self {
        $self = new self;

        Omitted::VALUE !== $addTags && $self['addTags'] = $addTags;
        Omitted::VALUE !== $billingGroupID && $self['billingGroupID'] = $billingGroupID;
        Omitted::VALUE !== $connectionID && $self['connectionID'] = $connectionID;
        Omitted::VALUE !== $customerReference && $self['customerReference'] = $customerReference;
        Omitted::VALUE !== $deletionLockEnabled && $self['deletionLockEnabled'] = $deletionLockEnabled;
        Omitted::VALUE !== $emergencyAddressID && $self['emergencyAddressID'] = $emergencyAddressID;
        Omitted::VALUE !== $emergencyEnabled && $self['emergencyEnabled'] = $emergencyEnabled;
        Omitted::VALUE !== $externalPin && $self['externalPin'] = $externalPin;
        Omitted::VALUE !== $hdVoiceEnabled && $self['hdVoiceEnabled'] = $hdVoiceEnabled;
        null !== $phoneNumbers && $self['phoneNumbers'] = $phoneNumbers;
        Omitted::VALUE !== $removeTags && $self['removeTags'] = $removeTags;
        Omitted::VALUE !== $tags && $self['tags'] = $tags;
        null !== $voice && $self['voice'] = $voice;

        return $self;
    }

    /**
     * Saved add_tags for an update_phone_numbers job. Values reflect creation-time normalization.
     *
     * @param list<string>|null $addTags
     */
    public function withAddTags(?array $addTags): self
    {
        $self = clone $this;
        $self['addTags'] = $addTags;

        return $self;
    }

    /**
     * Saved billing_group_id supplied for an update_phone_numbers job.
     */
    public function withBillingGroupID(?string $billingGroupID): self
    {
        $self = clone $this;
        $self['billingGroupID'] = $billingGroupID;

        return $self;
    }

    /**
     * Saved connection_id supplied for an update_phone_numbers job.
     */
    public function withConnectionID(?string $connectionID): self
    {
        $self = clone $this;
        $self['connectionID'] = $connectionID;

        return $self;
    }

    /**
     * Saved customer_reference supplied for an update_phone_numbers job.
     */
    public function withCustomerReference(?string $customerReference): self
    {
        $self = clone $this;
        $self['customerReference'] = $customerReference;

        return $self;
    }

    /**
     * Saved deletion_lock_enabled supplied for an update_phone_numbers job.
     */
    public function withDeletionLockEnabled(?bool $deletionLockEnabled): self
    {
        $self = clone $this;
        $self['deletionLockEnabled'] = $deletionLockEnabled;

        return $self;
    }

    /**
     * Saved emergency address identifier for an update_emergency_settings job. An explicitly supplied null is preserved.
     */
    public function withEmergencyAddressID(?string $emergencyAddressID): self
    {
        $self = clone $this;
        $self['emergencyAddressID'] = $emergencyAddressID;

        return $self;
    }

    /**
     * Saved emergency-services setting for an update_emergency_settings job.
     */
    public function withEmergencyEnabled(?bool $emergencyEnabled): self
    {
        $self = clone $this;
        $self['emergencyEnabled'] = $emergencyEnabled;

        return $self;
    }

    /**
     * Saved external_pin supplied for an update_phone_numbers job.
     */
    public function withExternalPin(?string $externalPin): self
    {
        $self = clone $this;
        $self['externalPin'] = $externalPin;

        return $self;
    }

    /**
     * Saved hd_voice_enabled supplied for an update_phone_numbers job.
     */
    public function withHDVoiceEnabled(?bool $hdVoiceEnabled): self
    {
        $self = clone $this;
        $self['hdVoiceEnabled'] = $hdVoiceEnabled;

        return $self;
    }

    /**
     * Saved target phone numbers in E.164 format and/or identifiers. Jobs created using filters contain the resolved identifiers, not the original filter expression. Stored identifier types are preserved.
     *
     * @param list<PhoneNumberShape> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * Saved remove_tags for an update_phone_numbers job. Values reflect creation-time normalization.
     *
     * @param list<string>|null $removeTags
     */
    public function withRemoveTags(?array $removeTags): self
    {
        $self = clone $this;
        $self['removeTags'] = $removeTags;

        return $self;
    }

    /**
     * Saved tags for an update_phone_numbers job. Values reflect creation-time normalization.
     *
     * @param list<string>|null $tags
     */
    public function withTags(?array $tags): self
    {
        $self = clone $this;
        $self['tags'] = $tags;

        return $self;
    }

    /**
     * Saved voice settings for an update_phone_numbers job, using the public field names and nesting. Only settings present at creation are returned.
     *
     * @param Voice|VoiceShape $voice
     */
    public function withVoice(Voice|array $voice): self
    {
        $self = clone $this;
        $self['voice'] = $voice;

        return $self;
    }
}
