<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageRcsResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ToShape = array{
 *   carrier?: string|null,
 *   lineType?: string|null,
 *   phoneNumber?: string|null,
 *   status?: string|null,
 * }
 */
final class To implements BaseModel
{
    /** @use SdkModel<ToShape> */
    use SdkModel;

    #[Optional]
    public ?string $carrier;

    #[Optional('line_type')]
    public ?string $lineType;

    #[Optional('phone_number')]
    public ?string $phoneNumber;

    #[Optional]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $carrier = null,
        ?string $lineType = null,
        ?string $phoneNumber = null,
        ?string $status = null,
    ): self {
        $self = new self;

        null !== $carrier && $self['carrier'] = $carrier;
        null !== $lineType && $self['lineType'] = $lineType;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withCarrier(string $carrier): self
    {
        $self = clone $this;
        $self['carrier'] = $carrier;

        return $self;
    }

    public function withLineType(string $lineType): self
    {
        $self = clone $this;
        $self['lineType'] = $lineType;

        return $self;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
