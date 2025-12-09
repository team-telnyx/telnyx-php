<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ActivationRange;
use Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension\ExtensionRange;

/**
 * @phpstan-type PhoneNumberExtensionDeleteResponseShape = array{
 *   data?: PortingPhoneNumberExtension|null
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
     * @param PortingPhoneNumberExtension|array{
     *   id?: string|null,
     *   activationRanges?: list<ActivationRange>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   extensionRange?: ExtensionRange|null,
     *   portingPhoneNumberID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        PortingPhoneNumberExtension|array|null $data = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PortingPhoneNumberExtension|array{
     *   id?: string|null,
     *   activationRanges?: list<ActivationRange>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   extensionRange?: ExtensionRange|null,
     *   portingPhoneNumberID?: string|null,
     *   recordType?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(PortingPhoneNumberExtension|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
