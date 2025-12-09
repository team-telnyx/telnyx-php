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
        $obj = new self;

        null !== $carrier && $obj['carrier'] = $carrier;
        null !== $lineType && $obj['lineType'] = $lineType;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    public function withCarrier(string $carrier): self
    {
        $obj = clone $this;
        $obj['carrier'] = $carrier;

        return $obj;
    }

    public function withLineType(string $lineType): self
    {
        $obj = clone $this;
        $obj['lineType'] = $lineType;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
