<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortingPhoneNumberExtensionShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension
 *
 * @phpstan-type PhoneNumberExtensionDeleteResponseShape = array{
 *   data?: null|PortingPhoneNumberExtension|PortingPhoneNumberExtensionShape
 * }
 */
final class PhoneNumberExtensionDeleteResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberExtensionDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortingPhoneNumberExtension $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingPhoneNumberExtensionShape $data
     */
    public static function with(
        PortingPhoneNumberExtension|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortingPhoneNumberExtensionShape $data
     */
    public function withData(PortingPhoneNumberExtension|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
