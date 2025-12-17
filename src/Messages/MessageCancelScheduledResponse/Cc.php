<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageCancelScheduledResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageCancelScheduledResponse\Cc\LineType;
use Telnyx\Messages\MessageCancelScheduledResponse\Cc\Status;

/**
 * @phpstan-type CcShape = array{
 *   carrier?: string|null,
 *   lineType?: null|LineType|value-of<LineType>,
 *   phoneNumber?: string|null,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class Cc implements BaseModel
{
    /** @use SdkModel<CcShape> */
    use SdkModel;

    /**
     * The carrier of the receiver.
     */
    #[Optional]
    public ?string $carrier;

    /**
     * The line-type of the receiver.
     *
     * @var value-of<LineType>|null $lineType
     */
    #[Optional('line_type', enum: LineType::class)]
    public ?string $lineType;

    /**
     * Receiving address (+E.164 formatted phone number or short code).
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

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
     * @param LineType|value-of<LineType>|null $lineType
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $carrier = null,
        LineType|string|null $lineType = null,
        ?string $phoneNumber = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $carrier && $self['carrier'] = $carrier;
        null !== $lineType && $self['lineType'] = $lineType;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * The carrier of the receiver.
     */
    public function withCarrier(string $carrier): self
    {
        $self = clone $this;
        $self['carrier'] = $carrier;

        return $self;
    }

    /**
     * The line-type of the receiver.
     *
     * @param LineType|value-of<LineType> $lineType
     */
    public function withLineType(LineType|string $lineType): self
    {
        $self = clone $this;
        $self['lineType'] = $lineType;

        return $self;
    }

    /**
     * Receiving address (+E.164 formatted phone number or short code).
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The delivery status of the message.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
