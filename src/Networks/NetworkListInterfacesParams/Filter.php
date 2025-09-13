<?php

declare(strict_types=1);

namespace Telnyx\Networks\NetworkListInterfacesParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[name], filter[type], filter[status].
 *
 * @phpstan-type filter_alias = array{
 *   name?: string, status?: value-of<InterfaceStatus>, type?: string
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * The interface name to filter on.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * The interface status to filter on.
     *
     * @var value-of<InterfaceStatus>|null $status
     */
    #[Api(enum: InterfaceStatus::class, optional: true)]
    public ?string $status;

    /**
     * The interface type to filter on.
     */
    #[Api(optional: true)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     */
    public static function with(
        ?string $name = null,
        InterfaceStatus|string|null $status = null,
        ?string $type = null,
    ): self {
        $obj = new self;

        null !== $name && $obj->name = $name;
        null !== $status && $obj->status = $status instanceof InterfaceStatus ? $status->value : $status;
        null !== $type && $obj->type = $type;

        return $obj;
    }

    /**
     * The interface name to filter on.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * The interface status to filter on.
     *
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     */
    public function withStatus(InterfaceStatus|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof InterfaceStatus ? $status->value : $status;

        return $obj;
    }

    /**
     * The interface type to filter on.
     */
    public function withType(string $type): self
    {
        $obj = clone $this;
        $obj->type = $type;

        return $obj;
    }
}
