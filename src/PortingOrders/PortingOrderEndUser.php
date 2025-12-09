<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders;

use Telnyx\Core\Attributes\Optional;
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
     * @param PortingOrderEndUserAdmin|array{
     *   accountNumber?: string|null,
     *   authPersonName?: string|null,
     *   billingPhoneNumber?: string|null,
     *   businessIdentifier?: string|null,
     *   entityName?: string|null,
     *   pinPasscode?: string|null,
     *   taxIdentifier?: string|null,
     * } $admin
     * @param PortingOrderEndUserLocation|array{
     *   administrativeArea?: string|null,
     *   countryCode?: string|null,
     *   extendedAddress?: string|null,
     *   locality?: string|null,
     *   postalCode?: string|null,
     *   streetAddress?: string|null,
     * } $location
     */
    public static function with(
        PortingOrderEndUserAdmin|array|null $admin = null,
        PortingOrderEndUserLocation|array|null $location = null,
    ): self {
        $obj = new self;

        null !== $admin && $obj['admin'] = $admin;
        null !== $location && $obj['location'] = $location;

        return $obj;
    }

    /**
     * @param PortingOrderEndUserAdmin|array{
     *   accountNumber?: string|null,
     *   authPersonName?: string|null,
     *   billingPhoneNumber?: string|null,
     *   businessIdentifier?: string|null,
     *   entityName?: string|null,
     *   pinPasscode?: string|null,
     *   taxIdentifier?: string|null,
     * } $admin
     */
    public function withAdmin(PortingOrderEndUserAdmin|array $admin): self
    {
        $obj = clone $this;
        $obj['admin'] = $admin;

        return $obj;
    }

    /**
     * @param PortingOrderEndUserLocation|array{
     *   administrativeArea?: string|null,
     *   countryCode?: string|null,
     *   extendedAddress?: string|null,
     *   locality?: string|null,
     *   postalCode?: string|null,
     *   streetAddress?: string|null,
     * } $location
     */
    public function withLocation(
        PortingOrderEndUserLocation|array $location
    ): self {
        $obj = clone $this;
        $obj['location'] = $location;

        return $obj;
    }
}
