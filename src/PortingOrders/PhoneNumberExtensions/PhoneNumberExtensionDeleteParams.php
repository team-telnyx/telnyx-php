<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Deletes a phone number extension.
 *
 * @see Telnyx\Services\PortingOrders\PhoneNumberExtensionsService::delete()
 *
 * @phpstan-type PhoneNumberExtensionDeleteParamsShape = array{
 *   portingOrderID: string
 * }
 */
final class PhoneNumberExtensionDeleteParams implements BaseModel
{
    /** @use SdkModel<PhoneNumberExtensionDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $portingOrderID;

    /**
     * `new PhoneNumberExtensionDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberExtensionDeleteParams::with(portingOrderID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberExtensionDeleteParams)->withPortingOrderID(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $portingOrderID): self
    {
        $self = new self;

        $self['portingOrderID'] = $portingOrderID;

        return $self;
    }

    public function withPortingOrderID(string $portingOrderID): self
    {
        $self = clone $this;
        $self['portingOrderID'] = $portingOrderID;

        return $self;
    }
}
