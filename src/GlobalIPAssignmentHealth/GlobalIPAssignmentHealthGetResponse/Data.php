<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\GlobalIP;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\GlobalIPAssignment;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\GlobalIPAssignment\WireguardPeer;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\Health;

/**
 * @phpstan-type DataShape = array{
 *   globalIP?: GlobalIP|null,
 *   globalIPAssignment?: GlobalIPAssignment|null,
 *   health?: Health|null,
 *   timestamp?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('global_ip')]
    public ?GlobalIP $globalIP;

    #[Optional('global_ip_assignment')]
    public ?GlobalIPAssignment $globalIPAssignment;

    #[Optional]
    public ?Health $health;

    /**
     * The timestamp of the metric.
     */
    #[Optional]
    public ?\DateTimeInterface $timestamp;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param GlobalIP|array{id?: string|null, ipAddress?: string|null} $globalIP
     * @param GlobalIPAssignment|array{
     *   id?: string|null,
     *   wireguardPeer?: WireguardPeer|null,
     *   wireguardPeerID?: string|null,
     * } $globalIPAssignment
     * @param Health|array{fail?: float|null, pass?: float|null} $health
     */
    public static function with(
        GlobalIP|array|null $globalIP = null,
        GlobalIPAssignment|array|null $globalIPAssignment = null,
        Health|array|null $health = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $self = new self;

        null !== $globalIP && $self['globalIP'] = $globalIP;
        null !== $globalIPAssignment && $self['globalIPAssignment'] = $globalIPAssignment;
        null !== $health && $self['health'] = $health;
        null !== $timestamp && $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * @param GlobalIP|array{id?: string|null, ipAddress?: string|null} $globalIP
     */
    public function withGlobalIP(GlobalIP|array $globalIP): self
    {
        $self = clone $this;
        $self['globalIP'] = $globalIP;

        return $self;
    }

    /**
     * @param GlobalIPAssignment|array{
     *   id?: string|null,
     *   wireguardPeer?: WireguardPeer|null,
     *   wireguardPeerID?: string|null,
     * } $globalIPAssignment
     */
    public function withGlobalIPAssignment(
        GlobalIPAssignment|array $globalIPAssignment
    ): self {
        $self = clone $this;
        $self['globalIPAssignment'] = $globalIPAssignment;

        return $self;
    }

    /**
     * @param Health|array{fail?: float|null, pass?: float|null} $health
     */
    public function withHealth(Health|array $health): self
    {
        $self = clone $this;
        $self['health'] = $health;

        return $self;
    }

    /**
     * The timestamp of the metric.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }
}
