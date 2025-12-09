<?php

declare(strict_types=1);

namespace Telnyx\Networks\NetworkListInterfacesParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Networks\InterfaceStatus;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[name], filter[type], filter[status].
 *
 * @phpstan-type FilterShape = array{
 *   name?: string|null,
 *   status?: value-of<InterfaceStatus>|null,
 *   type?: string|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The interface name to filter on.
     */
    #[Optional]
    public ?string $name;

    /**
     * The interface status to filter on.
     *
     * @var value-of<InterfaceStatus>|null $status
     */
    #[Optional(enum: InterfaceStatus::class)]
    public ?string $status;

    /**
     * The interface type to filter on.
     */
    #[Optional]
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
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $status && $self['status'] = $status;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * The interface name to filter on.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The interface status to filter on.
     *
     * @param InterfaceStatus|value-of<InterfaceStatus> $status
     */
    public function withStatus(InterfaceStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The interface type to filter on.
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
