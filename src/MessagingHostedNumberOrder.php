<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrder\Status;

/**
 * @phpstan-import-type HostedNumberShape from \Telnyx\HostedNumber
 *
 * @phpstan-type MessagingHostedNumberOrderShape = array{
 *   id?: string|null,
 *   messagingProfileID?: string|null,
 *   phoneNumbers?: list<HostedNumber|HostedNumberShape>|null,
 *   recordType?: string|null,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class MessagingHostedNumberOrder implements BaseModel
{
    /** @use SdkModel<MessagingHostedNumberOrderShape> */
    use SdkModel;

    /**
     * Resource unique identifier.
     */
    #[Optional]
    public ?string $id;

    /**
     * Automatically associate the number with this messaging profile ID when the order is complete.
     */
    #[Optional('messaging_profile_id', nullable: true)]
    public ?string $messagingProfileID;

    /** @var list<HostedNumber>|null $phoneNumbers */
    #[Optional('phone_numbers', list: HostedNumber::class)]
    public ?array $phoneNumbers;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<HostedNumber|HostedNumberShape>|null $phoneNumbers
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $id = null,
        ?string $messagingProfileID = null,
        ?array $phoneNumbers = null,
        ?string $recordType = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $messagingProfileID && $self['messagingProfileID'] = $messagingProfileID;
        null !== $phoneNumbers && $self['phoneNumbers'] = $phoneNumbers;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Resource unique identifier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Automatically associate the number with this messaging profile ID when the order is complete.
     */
    public function withMessagingProfileID(?string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * @param list<HostedNumber|HostedNumberShape> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $self = clone $this;
        $self['phoneNumbers'] = $phoneNumbers;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
