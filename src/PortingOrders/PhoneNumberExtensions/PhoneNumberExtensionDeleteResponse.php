<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\Core\Attributes\Api;
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

    #[Api(optional: true)]
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
     *   activation_ranges?: list<ActivationRange>|null,
     *   created_at?: \DateTimeInterface|null,
     *   extension_range?: ExtensionRange|null,
     *   porting_phone_number_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
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
     *   activation_ranges?: list<ActivationRange>|null,
     *   created_at?: \DateTimeInterface|null,
     *   extension_range?: ExtensionRange|null,
     *   porting_phone_number_id?: string|null,
     *   record_type?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(PortingPhoneNumberExtension|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
