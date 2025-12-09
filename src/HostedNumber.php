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
 *   phoneNumber?: string|null,
 *   recordType?: string|null,
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
    #[Optional('phone_number')]
    public ?string $phoneNumber;

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
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $id = null,
        ?string $phoneNumber = null,
        ?string $recordType = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $recordType && $obj['recordType'] = $recordType;
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
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

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
