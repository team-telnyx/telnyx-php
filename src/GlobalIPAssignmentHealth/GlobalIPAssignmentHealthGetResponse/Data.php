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
 *   global_ip?: GlobalIP|null,
 *   global_ip_assignment?: GlobalIPAssignment|null,
 *   health?: Health|null,
 *   timestamp?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?GlobalIP $global_ip;

    #[Optional]
    public ?GlobalIPAssignment $global_ip_assignment;

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
     * @param GlobalIP|array{id?: string|null, ip_address?: string|null} $global_ip
     * @param GlobalIPAssignment|array{
     *   id?: string|null,
     *   wireguard_peer?: WireguardPeer|null,
     *   wireguard_peer_id?: string|null,
     * } $global_ip_assignment
     * @param Health|array{fail?: float|null, pass?: float|null} $health
     */
    public static function with(
        GlobalIP|array|null $global_ip = null,
        GlobalIPAssignment|array|null $global_ip_assignment = null,
        Health|array|null $health = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $obj = new self;

        null !== $global_ip && $obj['global_ip'] = $global_ip;
        null !== $global_ip_assignment && $obj['global_ip_assignment'] = $global_ip_assignment;
        null !== $health && $obj['health'] = $health;
        null !== $timestamp && $obj['timestamp'] = $timestamp;

        return $obj;
    }

    /**
     * @param GlobalIP|array{id?: string|null, ip_address?: string|null} $globalIP
     */
    public function withGlobalIP(GlobalIP|array $globalIP): self
    {
        $obj = clone $this;
        $obj['global_ip'] = $globalIP;

        return $obj;
    }

    /**
     * @param GlobalIPAssignment|array{
     *   id?: string|null,
     *   wireguard_peer?: WireguardPeer|null,
     *   wireguard_peer_id?: string|null,
     * } $globalIPAssignment
     */
    public function withGlobalIPAssignment(
        GlobalIPAssignment|array $globalIPAssignment
    ): self {
        $obj = clone $this;
        $obj['global_ip_assignment'] = $globalIPAssignment;

        return $obj;
    }

    /**
     * @param Health|array{fail?: float|null, pass?: float|null} $health
     */
    public function withHealth(Health|array $health): self
    {
        $obj = clone $this;
        $obj['health'] = $health;

        return $obj;
    }

    /**
     * The timestamp of the metric.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj['timestamp'] = $timestamp;

        return $obj;
    }
}
