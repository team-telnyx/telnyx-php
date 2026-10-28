<?php

declare(strict_types=1);

namespace Telnyx\Tunnels\TunnelListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Tunnels\TunnelListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[name], filter[status].
 *
 * @phpstan-type FilterShape = array{
 *   name?: string|null, status?: null|Status|value-of<Status>
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * The name of the tunnel.
     */
    #[Optional]
    public ?string $name;

    /**
     * The status of the tunnel.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $name = null,
        Status|string|null $status = null
    ): self {
        $self = new self;

        null !== $name && $self['name'] = $name;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * The name of the tunnel.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The status of the tunnel.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
