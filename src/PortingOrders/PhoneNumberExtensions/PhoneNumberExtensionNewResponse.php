<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortingPhoneNumberExtensionShape from \Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension
 *
 * @phpstan-type PhoneNumberExtensionNewResponseShape = array{
 *   data?: null|PortingPhoneNumberExtension|PortingPhoneNumberExtensionShape
 * }
 */
final class PhoneNumberExtensionNewResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberExtensionNewResponseShape> */
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
     * @param PortingPhoneNumberExtension|PortingPhoneNumberExtensionShape|null $data
     */
    public static function with(
        PortingPhoneNumberExtension|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortingPhoneNumberExtension|PortingPhoneNumberExtensionShape $data
     */
    public function withData(PortingPhoneNumberExtension|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
