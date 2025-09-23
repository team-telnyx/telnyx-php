<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\PortingOrderListParams\Filter;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PortingOrders\PortingOrderListParams\Filter\EndUser\Admin;

/**
 * @phpstan-type end_user = array{admin?: Admin}
 */
final class EndUser implements BaseModel
{
    /** @use SdkModel<end_user> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Admin $admin;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Admin $admin = null): self
    {
        $obj = new self;

        null !== $admin && $obj->admin = $admin;

        return $obj;
    }

    public function withAdmin(Admin $admin): self
    {
        $obj = clone $this;
        $obj->admin = $admin;

        return $obj;
    }
}
