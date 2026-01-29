<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberBlocks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortingPhoneNumberBlockShape from \Telnyx\PortingOrders\PhoneNumberBlocks\PortingPhoneNumberBlock
 *
 * @phpstan-type PhoneNumberBlockNewResponseShape = array{
 *   data?: null|PortingPhoneNumberBlock|PortingPhoneNumberBlockShape
 * }
 */
final class PhoneNumberBlockNewResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberBlockNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortingPhoneNumberBlock $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingPhoneNumberBlock|PortingPhoneNumberBlockShape|null $data
     */
    public static function with(
        PortingPhoneNumberBlock|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortingPhoneNumberBlock|PortingPhoneNumberBlockShape $data
     */
    public function withData(PortingPhoneNumberBlock|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
