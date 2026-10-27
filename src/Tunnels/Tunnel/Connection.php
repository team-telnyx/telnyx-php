<?php

declare(strict_types=1);

namespace Telnyx\Tunnels\Tunnel;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * A tunnel process connected to the tunnel.
 *
 * @phpstan-type ConnectionShape = array{
 *   connectedAt?: \DateTimeInterface|null,
 *   hostname?: string|null,
 *   regionCode?: string|null,
 *   version?: string|null,
 * }
 */
final class Connection implements BaseModel
{
    /** @use SdkModel<ConnectionShape> */
    use SdkModel;

    /**
     * When the process connected.
     */
    #[Optional('connected_at')]
    public ?\DateTimeInterface $connectedAt;

    /**
     * The name the host reports for itself. Preview: empty until the CLI reports it.
     */
    #[Optional]
    public ?string $hostname;

    /**
     * The Telnyx region the process is connected to. Preview: empty until the CLI reports it.
     */
    #[Optional('region_code')]
    public ?string $regionCode;

    /**
     * The `telnyx-edge` CLI version of the process. Preview: empty until the CLI reports it.
     */
    #[Optional]
    public ?string $version;

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
        ?\DateTimeInterface $connectedAt = null,
        ?string $hostname = null,
        ?string $regionCode = null,
        ?string $version = null,
    ): self {
        $self = new self;

        null !== $connectedAt && $self['connectedAt'] = $connectedAt;
        null !== $hostname && $self['hostname'] = $hostname;
        null !== $regionCode && $self['regionCode'] = $regionCode;
        null !== $version && $self['version'] = $version;

        return $self;
    }

    /**
     * When the process connected.
     */
    public function withConnectedAt(\DateTimeInterface $connectedAt): self
    {
        $self = clone $this;
        $self['connectedAt'] = $connectedAt;

        return $self;
    }

    /**
     * The name the host reports for itself. Preview: empty until the CLI reports it.
     */
    public function withHostname(string $hostname): self
    {
        $self = clone $this;
        $self['hostname'] = $hostname;

        return $self;
    }

    /**
     * The Telnyx region the process is connected to. Preview: empty until the CLI reports it.
     */
    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }

    /**
     * The `telnyx-edge` CLI version of the process. Preview: empty until the CLI reports it.
     */
    public function withVersion(string $version): self
    {
        $self = clone $this;
        $self['version'] = $version;

        return $self;
    }
}
