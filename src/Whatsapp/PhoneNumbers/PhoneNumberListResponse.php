<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberListResponse\CoexistenceState;
use Telnyx\Whatsapp\PhoneNumbers\PhoneNumberListResponse\SyncProgress;

/**
 * @phpstan-import-type SyncProgressShape from \Telnyx\Whatsapp\PhoneNumbers\PhoneNumberListResponse\SyncProgress
 *
 * @phpstan-type PhoneNumberListResponseShape = array{
 *   callingEnabled?: bool|null,
 *   coexistenceState?: null|CoexistenceState|value-of<CoexistenceState>,
 *   createdAt?: \DateTimeInterface|null,
 *   displayName?: string|null,
 *   enabled?: bool|null,
 *   isOnBizApp?: bool|null,
 *   phoneNumber?: string|null,
 *   phoneNumberID?: string|null,
 *   qualityRating?: string|null,
 *   recordType?: string|null,
 *   status?: string|null,
 *   syncDeadline?: \DateTimeInterface|null,
 *   syncProgress?: null|SyncProgress|SyncProgressShape,
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

    /**
     * Current lifecycle state for a coexistence number. This is null for a standard Cloud API number.
     *
     * @var value-of<CoexistenceState>|null $coexistenceState
     */
    #[Optional(
        'coexistence_state',
        enum: CoexistenceState::class,
        nullable: true
    )]
    public ?string $coexistenceState;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('display_name')]
    public ?string $displayName;

    #[Optional]
    public ?bool $enabled;

    /**
     * Indicates whether the number is connected to both the WhatsApp Business app and Cloud API through WhatsApp Coexistence.
     */
    #[Optional('is_on_biz_app')]
    public ?bool $isOnBizApp;

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
     * Deadline for initiating the current coexistence synchronization cycle. This is null when no deadline applies.
     */
    #[Optional('sync_deadline', nullable: true)]
    public ?\DateTimeInterface $syncDeadline;

    /**
     * Synchronization progress. This object is returned only while a coexistence number is synchronizing.
     */
    #[Optional('sync_progress', nullable: true)]
    public ?SyncProgress $syncProgress;

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
     *
     * @param Omitted|CoexistenceState|value-of<CoexistenceState>|null $coexistenceState
     * @param Omitted|SyncProgress|SyncProgressShape|null $syncProgress
     */
    public static function with(
        Omitted|CoexistenceState|string|null $coexistenceState = Omitted::VALUE,
        \DateTimeInterface|Omitted|null $syncDeadline = Omitted::VALUE,
        Omitted|SyncProgress|array|null $syncProgress = Omitted::VALUE,
        ?bool $callingEnabled = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $displayName = null,
        ?bool $enabled = null,
        ?bool $isOnBizApp = null,
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
        Omitted::VALUE !== $coexistenceState && $self['coexistenceState'] = $coexistenceState;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $displayName && $self['displayName'] = $displayName;
        null !== $enabled && $self['enabled'] = $enabled;
        null !== $isOnBizApp && $self['isOnBizApp'] = $isOnBizApp;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $phoneNumberID && $self['phoneNumberID'] = $phoneNumberID;
        null !== $qualityRating && $self['qualityRating'] = $qualityRating;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        Omitted::VALUE !== $syncDeadline && $self['syncDeadline'] = $syncDeadline;
        Omitted::VALUE !== $syncProgress && $self['syncProgress'] = $syncProgress;
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

    /**
     * Current lifecycle state for a coexistence number. This is null for a standard Cloud API number.
     *
     * @param CoexistenceState|value-of<CoexistenceState>|null $coexistenceState
     */
    public function withCoexistenceState(
        CoexistenceState|string|null $coexistenceState
    ): self {
        $self = clone $this;
        $self['coexistenceState'] = $coexistenceState;

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
     * Indicates whether the number is connected to both the WhatsApp Business app and Cloud API through WhatsApp Coexistence.
     */
    public function withIsOnBizApp(bool $isOnBizApp): self
    {
        $self = clone $this;
        $self['isOnBizApp'] = $isOnBizApp;

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
     * Deadline for initiating the current coexistence synchronization cycle. This is null when no deadline applies.
     */
    public function withSyncDeadline(?\DateTimeInterface $syncDeadline): self
    {
        $self = clone $this;
        $self['syncDeadline'] = $syncDeadline;

        return $self;
    }

    /**
     * Synchronization progress. This object is returned only while a coexistence number is synchronizing.
     *
     * @param SyncProgress|SyncProgressShape|null $syncProgress
     */
    public function withSyncProgress(
        SyncProgress|array|null $syncProgress
    ): self {
        $self = clone $this;
        $self['syncProgress'] = $syncProgress;

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
