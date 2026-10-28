<?php

declare(strict_types=1);

namespace Telnyx\Tunnels;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Tunnels\Tunnel\Connection;
use Telnyx\Tunnels\Tunnel\Status;

/**
 * @phpstan-import-type ConnectionShape from \Telnyx\Tunnels\Tunnel\Connection
 *
 * @phpstan-type TunnelWithTokenShape = array{
 *   id?: string|null,
 *   connectionCount?: int|null,
 *   connections?: list<Connection|ConnectionShape>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   name?: string|null,
 *   recordType?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   tunnelToken?: string|null,
 * }
 */
final class TunnelWithToken implements BaseModel
{
    /** @use SdkModel<TunnelWithTokenShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * The number of tunnel processes connected with the tunnel's token.
     */
    #[Optional('connection_count')]
    public ?int $connectionCount;

    /**
     * The tunnel processes connected with the tunnel's token.
     *
     * @var list<Connection>|null $connections
     */
    #[Optional(list: Connection::class)]
    public ?array $connections;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * A user specified name for the tunnel.
     */
    #[Optional]
    public ?string $name;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * `inactive` when no tunnel process is connected, and `healthy` when one or more are. `degraded` (Preview, not reported yet) when a process is connected but fails to reach its destinations.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * The credential that a tunnel process presents with `telnyx-edge tunnel run --token`. Returned only by create and rotate_token. Telnyx stores only a hash of it.
     */
    #[Optional('tunnel_token')]
    public ?string $tunnelToken;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Connection|ConnectionShape>|null $connections
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $id = null,
        ?int $connectionCount = null,
        ?array $connections = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?string $recordType = null,
        Status|string|null $status = null,
        ?string $tunnelToken = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $connectionCount && $self['connectionCount'] = $connectionCount;
        null !== $connections && $self['connections'] = $connections;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $name && $self['name'] = $name;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        null !== $tunnelToken && $self['tunnelToken'] = $tunnelToken;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The number of tunnel processes connected with the tunnel's token.
     */
    public function withConnectionCount(int $connectionCount): self
    {
        $self = clone $this;
        $self['connectionCount'] = $connectionCount;

        return $self;
    }

    /**
     * The tunnel processes connected with the tunnel's token.
     *
     * @param list<Connection|ConnectionShape> $connections
     */
    public function withConnections(array $connections): self
    {
        $self = clone $this;
        $self['connections'] = $connections;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * A user specified name for the tunnel.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * `inactive` when no tunnel process is connected, and `healthy` when one or more are. `degraded` (Preview, not reported yet) when a process is connected but fails to reach its destinations.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The credential that a tunnel process presents with `telnyx-edge tunnel run --token`. Returned only by create and rotate_token. Telnyx stores only a hash of it.
     */
    public function withTunnelToken(string $tunnelToken): self
    {
        $self = clone $this;
        $self['tunnelToken'] = $tunnelToken;

        return $self;
    }
}
