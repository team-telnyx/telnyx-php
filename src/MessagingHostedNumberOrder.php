<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingHostedNumberOrder\Status;

/**
 * @phpstan-type messaging_hosted_number_order = array{
 *   id?: string,
 *   messagingProfileID?: string|null,
 *   phoneNumbers?: list<HostedNumber>,
 *   recordType?: string,
 *   status?: value-of<Status>,
 * }
 */
final class MessagingHostedNumberOrder implements BaseModel
{
    /** @use SdkModel<messaging_hosted_number_order> */
    use SdkModel;

    /**
     * Resource unique identifier.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Automatically associate the number with this messaging profile ID when the order is complete.
     */
    #[Api('messaging_profile_id', nullable: true, optional: true)]
    public ?string $messagingProfileID;

    /** @var list<HostedNumber>|null $phoneNumbers */
    #[Api('phone_numbers', list: HostedNumber::class, optional: true)]
    public ?array $phoneNumbers;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /** @var value-of<Status>|null $status */
    #[Api(enum: Status::class, optional: true)]
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
     * @param list<HostedNumber> $phoneNumbers
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

        null !== $id && $obj->id = $id;
        null !== $messagingProfileID && $obj->messagingProfileID = $messagingProfileID;
        null !== $phoneNumbers && $obj->phoneNumbers = $phoneNumbers;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * Resource unique identifier.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * Automatically associate the number with this messaging profile ID when the order is complete.
     */
    public function withMessagingProfileID(?string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj->messagingProfileID = $messagingProfileID;

        return $obj;
    }

    /**
     * @param list<HostedNumber> $phoneNumbers
     */
    public function withPhoneNumbers(array $phoneNumbers): self
    {
        $obj = clone $this;
        $obj->phoneNumbers = $phoneNumbers;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }
}
