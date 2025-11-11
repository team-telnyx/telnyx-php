<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter\PhoneNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Phone number pattern filtering operations.
 *
 * @phpstan-type PhoneNumberShape = array{contains?: string|null}
 */
final class PhoneNumber implements BaseModel
{
    /** @use SdkModel<PhoneNumberShape> */
    use SdkModel;

    /**
     * Filter results by full or partial phone_number.
     */
    #[Api(optional: true)]
    public ?string $contains;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $contains = null): self
    {
        $obj = new self;

        null !== $contains && $obj->contains = $contains;

        return $obj;
    }

    /**
     * Filter results by full or partial phone_number.
     */
    public function withContains(string $contains): self
    {
        $obj = clone $this;
        $obj->contains = $contains;

        return $obj;
    }
}
