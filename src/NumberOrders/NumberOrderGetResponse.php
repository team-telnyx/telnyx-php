<?php

declare(strict_types=1);

namespace Telnyx\NumberOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type NumberOrderWithPhoneNumbersShape from \Telnyx\NumberOrders\NumberOrderWithPhoneNumbers
 *
 * @phpstan-type NumberOrderGetResponseShape = array{
 *   data?: null|NumberOrderWithPhoneNumbers|NumberOrderWithPhoneNumbersShape
 * }
 */
final class NumberOrderGetResponse implements BaseModel
{
    /** @use SdkModel<NumberOrderGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?NumberOrderWithPhoneNumbers $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param NumberOrderWithPhoneNumbers|NumberOrderWithPhoneNumbersShape|null $data
     */
    public static function with(
        NumberOrderWithPhoneNumbers|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param NumberOrderWithPhoneNumbers|NumberOrderWithPhoneNumbersShape $data
     */
    public function withData(NumberOrderWithPhoneNumbers|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
