<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PortingOrderEndUserShape = array{
 *   admin?: PortingOrderEndUserAdmin|null,
 *   location?: PortingOrderEndUserLocation|null,
 * }
 */
final class PortingOrderEndUser implements BaseModel
{
    /** @use SdkModel<PortingOrderEndUserShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?PortingOrderEndUserAdmin $admin;

    #[Api(optional: true)]
    public ?PortingOrderEndUserLocation $location;

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
        ?PortingOrderEndUserAdmin $admin = null,
        ?PortingOrderEndUserLocation $location = null,
    ): self {
        $obj = new self;

        null !== $admin && $obj->admin = $admin;
        null !== $location && $obj->location = $location;

        return $obj;
    }

    public function withAdmin(PortingOrderEndUserAdmin $admin): self
    {
        $obj = clone $this;
        $obj->admin = $admin;

        return $obj;
    }

    public function withLocation(PortingOrderEndUserLocation $location): self
    {
        $obj = clone $this;
        $obj->location = $location;

        return $obj;
    }
}
