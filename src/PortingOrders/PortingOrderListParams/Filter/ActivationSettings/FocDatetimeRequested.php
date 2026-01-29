<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter\ActivationSettings;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * FOC datetime range filtering operations.
 *
 * @phpstan-type FocDatetimeRequestedShape = array{
 *   gt?: string|null, lt?: string|null
 * }
 */
final class FocDatetimeRequested implements BaseModel
{
    /** @use SdkModel<FocDatetimeRequestedShape> */
    use SdkModel;

    /**
     * Filter results by foc date later than this value.
     */
    #[Optional]
    public ?string $gt;

    /**
     * Filter results by foc date earlier than this value.
     */
    #[Optional]
    public ?string $lt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $gt = null, ?string $lt = null): self
    {
        $self = new self;

        null !== $gt && $self['gt'] = $gt;
        null !== $lt && $self['lt'] = $lt;

        return $self;
    }

    /**
     * Filter results by foc date later than this value.
     */
    public function withGt(string $gt): self
    {
        $self = clone $this;
        $self['gt'] = $gt;

        return $self;
    }

    /**
     * Filter results by foc date earlier than this value.
     */
    public function withLt(string $lt): self
    {
        $self = clone $this;
        $self['lt'] = $lt;

        return $self;
    }
}
