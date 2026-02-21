<?php

declare(strict_types=1);

namespace Telnyx\AlphanumericSenderIDs;

use Telnyx\AlphanumericSenderIDs\AlphanumericSenderIDListResponse\RecordType;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AlphanumericSenderIDListResponseShape = array{
 *   id?: string|null,
 *   alphanumericSenderID?: string|null,
 *   messagingProfileID?: string|null,
 *   organizationID?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   usLongCodeFallback?: string|null,
 * }
 */
final class AlphanumericSenderIDListResponse implements BaseModel
{
    /** @use SdkModel<AlphanumericSenderIDListResponseShape> */
    use SdkModel;

    /**
     * Uniquely identifies the alphanumeric sender ID resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * The alphanumeric sender ID string.
     */
    #[Optional('alphanumeric_sender_id')]
    public ?string $alphanumericSenderID;

    /**
     * The messaging profile this sender ID belongs to.
     */
    #[Optional('messaging_profile_id')]
    public ?string $messagingProfileID;

    /**
     * The organization that owns this sender ID.
     */
    #[Optional('organization_id')]
    public ?string $organizationID;

    /** @var value-of<RecordType>|null $recordType */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * A US long code number to use as fallback when sending to US destinations.
     */
    #[Optional('us_long_code_fallback')]
    public ?string $usLongCodeFallback;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType>|null $recordType
     */
    public static function with(
        ?string $id = null,
        ?string $alphanumericSenderID = null,
        ?string $messagingProfileID = null,
        ?string $organizationID = null,
        RecordType|string|null $recordType = null,
        ?string $usLongCodeFallback = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $alphanumericSenderID && $self['alphanumericSenderID'] = $alphanumericSenderID;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $organizationID && $self['organizationID'] = $organizationID;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $usLongCodeFallback && $self['usLongCodeFallback'] = $usLongCodeFallback;

        return $self;
    }

    /**
     * Uniquely identifies the alphanumeric sender ID resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The alphanumeric sender ID string.
     */
    public function withAlphanumericSenderID(string $alphanumericSenderID): self
    {
        $self = clone $this;
        $self['alphanumericSenderID'] = $alphanumericSenderID;

        return $self;
    }

    /**
     * The messaging profile this sender ID belongs to.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * The organization that owns this sender ID.
     */
    public function withOrganizationID(string $organizationID): self
    {
        $self = clone $this;
        $self['organizationID'] = $organizationID;

        return $self;
    }

    /**
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * A US long code number to use as fallback when sending to US destinations.
     */
    public function withUsLongCodeFallback(string $usLongCodeFallback): self
    {
        $self = clone $this;
        $self['usLongCodeFallback'] = $usLongCodeFallback;

        return $self;
    }
}
