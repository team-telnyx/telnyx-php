<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrder\Status;

/**
 * @phpstan-type MessagingHostedNumberOrderShape = array{
 *   id?: string|null,
 *   messagingProfileID?: string|null,
 *   phoneNumbers?: list<HostedNumber>|null,
 *   recordType?: string|null,
 *   status?: value-of<Status>|null,
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
     * @param list<HostedNumber|array{
     *   id?: string|null,
     *   phoneNumber?: string|null,
     *   recordType?: string|null,
     *   status?: value-of<HostedNumber\Status>|null,
     * }> $phoneNumbers
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $messagingProfileID = null,
        ?array $phoneNumbers = null,
        ?string $recordType = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $messagingProfileID && $obj['messagingProfileID'] = $messagingProfileID;
        null !== $phoneNumbers && $obj['phoneNumbers'] = $phoneNumbers;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Resource unique identifier.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Automatically associate the number with this messaging profile ID when the order is complete.
     */
    public function withMessagingProfileID(?string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messagingProfileID'] = $messagingProfileID;

        return $obj;
    }

    /**
     * @param list<HostedNumber|array{
     *   id?: string|null,
     *   phoneNumber?: string|null,
     *   recordType?: string|null,
     *   status?: value-of<HostedNumber\Status>|null,
     * }> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phoneNumbers'] = $phoneNumbers;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
