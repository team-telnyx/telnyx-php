<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageRcsResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type to_alias = array{
 *   carrier?: string|null,
 *   lineType?: string|null,
 *   phoneNumber?: string|null,
 *   status?: string|null,
 * }
 */
final class To implements BaseModel
{
    /** @use SdkModel<to_alias> */
    use SdkModel;

    #[Api(optional: true)]
    public ?string $carrier;

    #[Api('line_type', optional: true)]
    public ?string $lineType;

    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    #[Api(optional: true)]
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

        null !== $carrier && $obj->carrier = $carrier;
        null !== $lineType && $obj->lineType = $lineType;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    public function withCarrier(string $carrier): self
    {
        $obj = clone $this;
        $obj->carrier = $carrier;

        return $obj;
    }

    public function withLineType(string $lineType): self
    {
        $obj = clone $this;
        $obj->lineType = $lineType;

        return $obj;
    }

    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
