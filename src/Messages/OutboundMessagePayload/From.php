<?php

declare(strict_types=1);

namespace Telnyx\Messages\OutboundMessagePayload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\OutboundMessagePayload\From\LineType;

/**
 * @phpstan-type FromShape = array{
 *   carrier?: string|null,
 *   lineType?: null|LineType|value-of<LineType>,
 *   phoneNumber?: string|null,
 * }
 */
final class From implements BaseModel
{
    /** @use SdkModel<FromShape> */
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
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

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
     */
    public static function with(
        ?string $carrier = null,
        LineType|string|null $lineType = null,
        ?string $phoneNumber = null,
    ): self {
        $self = new self;

        null !== $carrier && $self['carrier'] = $carrier;
        null !== $lineType && $self['lineType'] = $lineType;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

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
     * Sending address (+E.164 formatted phone number, alphanumeric sender ID, or short code).
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
