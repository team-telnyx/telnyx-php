<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\EndUser\Admin;

/**
 * @phpstan-import-type AdminShape from \Telnyx\PortingOrders\PortingOrderListParams\Filter\EndUser\Admin
 *
 * @phpstan-type EndUserShape = array{admin?: null|Admin|AdminShape}
 */
final class EndUser implements BaseModel
{
    /** @use SdkModel<EndUserShape> */
    use SdkModel;

    #[Optional]
    public ?Admin $admin;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AdminShape $admin
     */
    public static function with(Admin|array|null $admin = null): self
    {
        $self = new self;

        null !== $admin && $self['admin'] = $admin;

        return $self;
    }

    /**
     * @param AdminShape $admin
     */
    public function withAdmin(Admin|array $admin): self
    {
        $self = clone $this;
        $self['admin'] = $admin;

        return $self;
    }
}
