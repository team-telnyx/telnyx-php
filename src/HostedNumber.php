<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\HostedNumber\Status;

/**
 * @phpstan-type HostedNumberShape = array{
 *   id?: string|null,
 *   phone_number?: string|null,
 *   record_type?: string|null,
 *   status?: value-of<Status>|null,
 * }
 */
final class HostedNumber implements BaseModel
{
    /** @use SdkModel<HostedNumberShape> */
    use SdkModel;

    /**
     * Identifies the type of resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * The messaging hosted phone number (+E.164 format).
     */
    #[Optional]
    public ?string $phone_number;

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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $phone_number = null,
        ?string $record_type = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Identifies the type of resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * The messaging hosted phone number (+E.164 format).
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

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
