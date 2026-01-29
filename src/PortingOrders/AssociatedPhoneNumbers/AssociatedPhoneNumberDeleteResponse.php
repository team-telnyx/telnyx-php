<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\AssociatedPhoneNumbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortingAssociatedPhoneNumberShape from \Telnyx\PortingOrders\AssociatedPhoneNumbers\PortingAssociatedPhoneNumber
 *
 * @phpstan-type AssociatedPhoneNumberDeleteResponseShape = array{
 *   data?: null|PortingAssociatedPhoneNumber|PortingAssociatedPhoneNumberShape
 * }
 */
final class AssociatedPhoneNumberDeleteResponse implements BaseModel
{
    /** @use SdkModel<AssociatedPhoneNumberDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?PortingAssociatedPhoneNumber $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingAssociatedPhoneNumber|PortingAssociatedPhoneNumberShape|null $data
     */
    public static function with(
        PortingAssociatedPhoneNumber|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param PortingAssociatedPhoneNumber|PortingAssociatedPhoneNumberShape $data
     */
    public function withData(PortingAssociatedPhoneNumber|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
