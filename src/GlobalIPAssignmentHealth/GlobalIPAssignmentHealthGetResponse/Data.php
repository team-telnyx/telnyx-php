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
 * @phpstan-type data_alias = array{
 *   globalIP?: GlobalIP,
 *   globalIPAssignment?: GlobalIPAssignment,
 *   health?: Health,
 *   timestamp?: \DateTimeInterface,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api('global_ip', optional: true)]
    public ?GlobalIP $globalIP;

    #[Api('global_ip_assignment', optional: true)]
    public ?GlobalIPAssignment $globalIPAssignment;

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
        ?GlobalIP $globalIP = null,
        ?GlobalIPAssignment $globalIPAssignment = null,
        ?Health $health = null,
        ?\DateTimeInterface $timestamp = null,
    ): self {
        $obj = new self;

        null !== $globalIP && $obj->globalIP = $globalIP;
        null !== $globalIPAssignment && $obj->globalIPAssignment = $globalIPAssignment;
        null !== $health && $obj->health = $health;
        null !== $timestamp && $obj->timestamp = $timestamp;

        return $obj;
    }

    public function withGlobalIP(GlobalIP $globalIP): self
    {
        $obj = clone $this;
        $obj->globalIP = $globalIP;

        return $obj;
    }

    public function withGlobalIPAssignment(
        GlobalIPAssignment $globalIPAssignment
    ): self {
        $obj = clone $this;
        $obj->globalIPAssignment = $globalIPAssignment;

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
