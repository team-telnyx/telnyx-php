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
     *   account_number?: string|null,
     *   auth_person_name?: string|null,
     *   billing_phone_number?: string|null,
     *   business_identifier?: string|null,
     *   entity_name?: string|null,
     *   pin_passcode?: string|null,
     *   tax_identifier?: string|null,
     * } $admin
     * @param PortingOrderEndUserLocation|array{
     *   administrative_area?: string|null,
     *   country_code?: string|null,
     *   extended_address?: string|null,
     *   locality?: string|null,
     *   postal_code?: string|null,
     *   street_address?: string|null,
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
     *   account_number?: string|null,
     *   auth_person_name?: string|null,
     *   billing_phone_number?: string|null,
     *   business_identifier?: string|null,
     *   entity_name?: string|null,
     *   pin_passcode?: string|null,
     *   tax_identifier?: string|null,
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
     *   administrative_area?: string|null,
     *   country_code?: string|null,
     *   extended_address?: string|null,
     *   locality?: string|null,
     *   postal_code?: string|null,
     *   street_address?: string|null,
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
