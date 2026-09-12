<?php

declare(strict_types=1);

namespace Telnyx\Webhooks\WhatsappMessageEcho\Data\Payload;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type FromShape = array{
 *   phoneNumber: string, carrier?: string|null, lineType?: string|null
 * }
 */
final class From implements BaseModel
{
    /** @use SdkModel<FromShape> */
    use SdkModel;

    /**
     * Coexistence-enabled business phone number in E.164 format.
     */
    #[Required('phone_number')]
    public string $phoneNumber;

    #[Optional]
    public ?string $carrier;

    #[Optional('line_type')]
    public ?string $lineType;

    /**
     * `new From()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * From::with(phoneNumber: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new From)->withPhoneNumber(...)
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
    public static function with(
        string $phoneNumber,
        ?string $carrier = null,
        ?string $lineType = null
    ): self {
        $self = new self;

        $self['phoneNumber'] = $phoneNumber;

        null !== $carrier && $self['carrier'] = $carrier;
        null !== $lineType && $self['lineType'] = $lineType;

        return $self;
    }

    /**
     * Coexistence-enabled business phone number in E.164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withCarrier(string $carrier): self
    {
        $self = clone $this;
        $self['carrier'] = $carrier;

        return $self;
    }

    public function withLineType(string $lineType): self
    {
        $self = clone $this;
        $self['lineType'] = $lineType;

        return $self;
    }
}
