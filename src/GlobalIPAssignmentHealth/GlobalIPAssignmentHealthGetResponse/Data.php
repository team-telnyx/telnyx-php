<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\GlobalIP;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\GlobalIPAssignment;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\Health;

/**
 * @phpstan-import-type GlobalIPShape from \Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\GlobalIP
 * @phpstan-import-type GlobalIPAssignmentShape from \Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\GlobalIPAssignment
 * @phpstan-import-type HealthShape from \Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\Health
 *
 * @phpstan-type DataShape = array{
 *   globalIP?: null|GlobalIP|GlobalIPShape,
 *   globalIPAssignment?: null|GlobalIPAssignment|GlobalIPAssignmentShape,
 *   health?: null|Health|HealthShape,
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
     * @param GlobalIP|GlobalIPShape|null $globalIP
     * @param GlobalIPAssignment|GlobalIPAssignmentShape|null $globalIPAssignment
     * @param Health|HealthShape|null $health
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
     * @param GlobalIP|GlobalIPShape $globalIP
     */
    public function withGlobalIP(GlobalIP|array $globalIP): self
    {
        $self = clone $this;
        $self['globalIP'] = $globalIP;

        return $self;
    }

    /**
     * @param GlobalIPAssignment|GlobalIPAssignmentShape $globalIPAssignment
     */
    public function withGlobalIPAssignment(
        GlobalIPAssignment|array $globalIPAssignment
    ): self {
        $self = clone $this;
        $self['globalIPAssignment'] = $globalIPAssignment;

        return $self;
    }

    /**
     * @param Health|HealthShape $health
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
