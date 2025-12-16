<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PortingOrderEndUserAdminShape from \Telnyx\PortingOrders\PortingOrderEndUserAdmin
 * @phpstan-import-type PortingOrderEndUserLocationShape from \Telnyx\PortingOrders\PortingOrderEndUserLocation
 *
 * @phpstan-type PortingOrderEndUserShape = array{
 *   admin?: null|PortingOrderEndUserAdmin|PortingOrderEndUserAdminShape,
 *   location?: null|PortingOrderEndUserLocation|PortingOrderEndUserLocationShape,
 * }
 */
final class PortingOrderEndUser implements BaseModel
{
    /** @use SdkModel<PortingOrderEndUserShape> */
    use SdkModel;

    #[Optional]
    public ?PortingOrderEndUserAdmin $admin;

    #[Optional]
    public ?PortingOrderEndUserLocation $location;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PortingOrderEndUserAdminShape $admin
     * @param PortingOrderEndUserLocationShape $location
     */
    public static function with(
        PortingOrderEndUserAdmin|array|null $admin = null,
        PortingOrderEndUserLocation|array|null $location = null,
    ): self {
        $self = new self;

        null !== $admin && $self['admin'] = $admin;
        null !== $location && $self['location'] = $location;

        return $self;
    }

    /**
     * @param PortingOrderEndUserAdminShape $admin
     */
    public function withAdmin(PortingOrderEndUserAdmin|array $admin): self
    {
        $self = clone $this;
        $self['admin'] = $admin;

        return $self;
    }

    /**
     * @param PortingOrderEndUserLocationShape $location
     */
    public function withLocation(
        PortingOrderEndUserLocation|array $location
    ): self {
        $self = clone $this;
        $self['location'] = $location;

        return $self;
    }
}
