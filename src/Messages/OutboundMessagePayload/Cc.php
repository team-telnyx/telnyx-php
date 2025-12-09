<?php

declare(strict_types=1);

namespace Telnyx\Messages\OutboundMessagePayload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\OutboundMessagePayload\Cc\LineType;
use Telnyx\Messages\OutboundMessagePayload\Cc\Status;

/**
 * @phpstan-type CcShape = array{
 *   carrier?: string|null,
 *   lineType?: value-of<LineType>|null,
 *   phoneNumber?: string|null,
 *   status?: value-of<Status>|null,
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
     * @param LineType|value-of<LineType> $lineType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $carrier = null,
        LineType|string|null $lineType = null,
        ?string $phoneNumber = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $carrier && $obj['carrier'] = $carrier;
        null !== $lineType && $obj['lineType'] = $lineType;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
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
        $obj['lineType'] = $lineType;

        return $obj;
    }

    /**
     * Receiving address (+E.164 formatted phone number or short code).
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

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
