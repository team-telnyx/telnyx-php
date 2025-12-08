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
 *   messaging_profile_id?: string|null,
 *   phone_numbers?: list<HostedNumber>|null,
 *   record_type?: string|null,
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
    #[Optional(nullable: true)]
    public ?string $messaging_profile_id;

    /** @var list<HostedNumber>|null $phone_numbers */
    #[Optional(list: HostedNumber::class)]
    public ?array $phone_numbers;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

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
     *   phone_number?: string|null,
     *   record_type?: string|null,
     *   status?: value-of<HostedNumber\Status>|null,
     * }> $phone_numbers
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $messaging_profile_id = null,
        ?array $phone_numbers = null,
        ?string $record_type = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $messaging_profile_id && $obj['messaging_profile_id'] = $messaging_profile_id;
        null !== $phone_numbers && $obj['phone_numbers'] = $phone_numbers;
        null !== $record_type && $obj['record_type'] = $record_type;
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
        $obj['messaging_profile_id'] = $messagingProfileID;

        return $obj;
    }

    /**
     * @param list<HostedNumber|array{
     *   id?: string|null,
     *   phone_number?: string|null,
     *   record_type?: string|null,
     *   status?: value-of<HostedNumber\Status>|null,
     * }> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj['phone_numbers'] = $phoneNumbers;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

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
