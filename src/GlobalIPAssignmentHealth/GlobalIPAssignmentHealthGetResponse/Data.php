<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\GlobalIP;
use Telnyx\GlobalIPAssignmentHealth\GlobalIPAssignmentHealthGetResponse\Data\GlobalIPAssignment;
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

    #[Api(optional: true)]
    public ?GlobalIP $global_ip;

    #[Api(optional: true)]
    public ?GlobalIPAssignment $global_ip_assignment;

    #[Api(optional: true)]
    public ?Health $health;

    /**
     * The timestamp of the metric.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $timestamp;

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
        ?GlobalIP $global_ip = null,
        ?GlobalIPAssignment $global_ip_assignment = null,
        ?Health $health = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $obj = new self;

        null !== $global_ip && $obj->global_ip = $global_ip;
        null !== $global_ip_assignment && $obj->global_ip_assignment = $global_ip_assignment;
        null !== $health && $obj->health = $health;
        null !== $timestamp && $obj->timestamp = $timestamp;

        return $obj;
    }

    public function withGlobalIP(GlobalIP $globalIP): self
    {
        $obj = clone $this;
        $obj->global_ip = $globalIP;

        return $obj;
    }

    public function withGlobalIPAssignment(
        GlobalIPAssignment $globalIPAssignment
    ): self {
        $obj = clone $this;
        $obj->global_ip_assignment = $globalIPAssignment;

        return $obj;
    }

    public function withHealth(Health $health): self
    {
        $obj = clone $this;
        $obj->health = $health;

        return $obj;
    }

    /**
     * The timestamp of the metric.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }
}
