<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageCancelScheduledResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageCancelScheduledResponse\To\LineType;
use Telnyx\Messages\MessageCancelScheduledResponse\To\Status;

/**
 * @phpstan-type ToShape = array{
 *   carrier?: string|null,
 *   line_type?: value-of<LineType>|null,
 *   phone_number?: string|null,
 *   status?: value-of<Status>|null,
 * }
 */
final class To implements BaseModel
{
    /** @use SdkModel<ToShape> */
    use SdkModel;

    /**
     * The carrier of the receiver.
     */
    #[Optional]
    public ?string $carrier;

    /**
     * The line-type of the receiver.
     *
     * @var value-of<LineType>|null $line_type
     */
    #[Optional(enum: LineType::class)]
    public ?string $line_type;

    /**
     * Receiving address (+E.164 formatted phone number or short code).
     */
    #[Optional]
    public ?string $phone_number;

    /**
     * The delivery status of the message.
     *
     * @var value-of<Status>|null $status
     */
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
     * @param LineType|value-of<LineType> $line_type
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $carrier = null,
        LineType|string|null $line_type = null,
        ?string $phone_number = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $carrier && $obj['carrier'] = $carrier;
        null !== $line_type && $obj['line_type'] = $line_type;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * The carrier of the receiver.
     */
    public function withCarrier(string $carrier): self
    {
        $obj = clone $this;
        $obj['carrier'] = $carrier;

        return $obj;
    }

    /**
     * The line-type of the receiver.
     *
     * @param LineType|value-of<LineType> $lineType
     */
    public function withLineType(LineType|string $lineType): self
    {
        $obj = clone $this;
        $obj['line_type'] = $lineType;

        return $obj;
    }

    /**
     * Receiving address (+E.164 formatted phone number or short code).
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * The delivery status of the message.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
