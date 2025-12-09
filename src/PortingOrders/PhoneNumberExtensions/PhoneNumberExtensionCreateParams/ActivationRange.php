<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PhoneNumberExtensions\PhoneNumberExtensionCreateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ActivationRangeShape = array{endAt: int, startAt: int}
 */
final class ActivationRange implements BaseModel
{
    /** @use SdkModel<ActivationRangeShape> */
    use SdkModel;

    /**
     * Specifies the end of the activation range. It must be no more than the end of the extension range.
     */
    #[Required('end_at')]
    public int $endAt;

    /**
     * Specifies the start of the activation range. Must be greater or equal the start of the extension range.
     */
    #[Required('start_at')]
    public int $startAt;

    /**
     * `new ActivationRange()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ActivationRange::with(endAt: ..., startAt: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ActivationRange)->withEndAt(...)->withStartAt(...)
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
    public static function with(int $endAt, int $startAt): self
    {
        $self = new self;

        $self['endAt'] = $endAt;
        $self['startAt'] = $startAt;

        return $self;
    }

    /**
     * Specifies the end of the activation range. It must be no more than the end of the extension range.
     */
    public function withEndAt(int $endAt): self
    {
        $self = clone $this;
        $self['endAt'] = $endAt;

        return $self;
    }

    /**
     * Specifies the start of the activation range. Must be greater or equal the start of the extension range.
     */
    public function withStartAt(int $startAt): self
    {
        $self = clone $this;
        $self['startAt'] = $startAt;

        return $self;
    }
}
