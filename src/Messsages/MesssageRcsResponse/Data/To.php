<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageRcsResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ToShape = array{
 *   carrier?: string|null,
 *   line_type?: string|null,
 *   phone_number?: string|null,
 *   status?: string|null,
 * }
 */
final class To implements BaseModel
{
    /** @use SdkModel<ToShape> */
    use SdkModel;

    #[Optional]
    public ?string $carrier;

    #[Optional]
    public ?string $line_type;

    #[Optional]
    public ?string $phone_number;

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
        ?string $line_type = null,
        ?string $phone_number = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $carrier && $obj['carrier'] = $carrier;
        null !== $line_type && $obj['line_type'] = $line_type;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
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
        $obj['line_type'] = $lineType;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
