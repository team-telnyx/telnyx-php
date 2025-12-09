<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions\PortingPhoneNumberExtension;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Specifies the extension range for this porting phone number extension.
 *
 * @phpstan-type ExtensionRangeShape = array{endAt?: int|null, startAt?: int|null}
 */
final class ExtensionRange implements BaseModel
{
    /** @use SdkModel<ExtensionRangeShape> */
    use SdkModel;

    /**
     * Specifies the end of the extension range for this porting phone number extension.
     */
    #[Optional('end_at')]
    public ?int $endAt;

    /**
     * Specifies the start of the extension range for this porting phone number extension.
     */
    #[Optional('start_at')]
    public ?int $startAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?int $endAt = null, ?int $startAt = null): self
    {
        $self = new self;

        null !== $endAt && $self['endAt'] = $endAt;
        null !== $startAt && $self['startAt'] = $startAt;

        return $self;
    }

    /**
     * Specifies the end of the extension range for this porting phone number extension.
     */
    public function withEndAt(int $endAt): self
    {
        $self = clone $this;
        $self['endAt'] = $endAt;

        return $self;
    }

    /**
     * Specifies the start of the extension range for this porting phone number extension.
     */
    public function withStartAt(int $startAt): self
    {
        $self = clone $this;
        $self['startAt'] = $startAt;

        return $self;
    }
}
