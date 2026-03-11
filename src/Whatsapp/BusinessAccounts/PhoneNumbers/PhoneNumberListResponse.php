<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\BusinessAccounts\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PhoneNumberListResponseShape = array{
 *   callingEnabled?: bool|null,
 *   createdAt?: \DateTimeInterface|null,
 *   displayName?: string|null,
 *   enabled?: bool|null,
 *   phoneNumber?: string|null,
 *   phoneNumberID?: string|null,
 *   qualityRating?: string|null,
 *   recordType?: string|null,
 *   status?: string|null,
 *   userID?: string|null,
 *   wabaID?: string|null,
 * }
 */
final class PhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberListResponseShape> */
    use SdkModel;

    #[Optional('calling_enabled')]
    public ?bool $callingEnabled;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('display_name')]
    public ?string $displayName;

    #[Optional]
    public ?bool $enabled;

    /**
     * Phone number in E164 format.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Whatsapp phone number ID.
     */
    #[Optional('phone_number_id')]
    public ?string $phoneNumberID;

    /**
     * Whatsapp quality rating.
     */
    #[Optional('quality_rating')]
    public ?string $qualityRating;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional]
    public ?string $status;

    /**
     * User ID.
     */
    #[Optional('user_id')]
    public ?string $userID;

    /**
     * WABA ID of Whatsapp business account.
     */
    #[Optional('waba_id')]
    public ?string $wabaID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?bool $callingEnabled = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $displayName = null,
        ?bool $enabled = null,
        ?string $phoneNumber = null,
        ?string $phoneNumberID = null,
        ?string $qualityRating = null,
        ?string $recordType = null,
        ?string $status = null,
        ?string $userID = null,
        ?string $wabaID = null,
    ): self {
        $self = new self;

        null !== $callingEnabled && $self['callingEnabled'] = $callingEnabled;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $enabled && $self['enabled'] = $enabled;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $phoneNumberID && $self['phoneNumberID'] = $phoneNumberID;
        null !== $qualityRating && $self['qualityRating'] = $qualityRating;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        null !== $userID && $self['userID'] = $userID;
        null !== $wabaID && $self['wabaID'] = $wabaID;

        return $self;
    }

    public function withCallingEnabled(bool $callingEnabled): self
    {
        $self = clone $this;
        $self['callingEnabled'] = $callingEnabled;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDisplayName(string $displayName): self
    {
        $self = clone $this;
        $self['displayName'] = $displayName;

        return $self;
    }

    public function withEnabled(bool $enabled): self
    {
        $self = clone $this;
        $self['enabled'] = $enabled;

        return $self;
    }

    /**
     * Phone number in E164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Whatsapp phone number ID.
     */
    public function withPhoneNumberID(string $phoneNumberID): self
    {
        $self = clone $this;
        $self['phoneNumberID'] = $phoneNumberID;

        return $self;
    }

    /**
     * Whatsapp quality rating.
     */
    public function withQualityRating(string $qualityRating): self
    {
        $self = clone $this;
        $self['qualityRating'] = $qualityRating;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * User ID.
     */
    public function withUserID(string $userID): self
    {
        $self = clone $this;
        $self['userID'] = $userID;

        return $self;
    }

    /**
     * WABA ID of Whatsapp business account.
     */
    public function withWabaID(string $wabaID): self
    {
        $self = clone $this;
        $self['wabaID'] = $wabaID;

        return $self;
    }
}
