<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse\Data\GlobalIP;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse\Data\GlobalIPAssignment;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse\Data\Received;
use Telnyx\GlobalIPAssignmentsUsage\GlobalIPAssignmentsUsageGetResponse\Data\Transmitted;

/**
 * @phpstan-type DataShape = array{
 *   global_ip?: GlobalIP|null,
 *   global_ip_assignment?: GlobalIPAssignment|null,
 *   received?: Received|null,
 *   timestamp?: \DateTimeInterface|null,
 *   transmitted?: Transmitted|null,
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
    public ?Received $received;

    /**
     * The timestamp of the metric.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $timestamp;

    #[Api(optional: true)]
    public ?Transmitted $transmitted;

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
        ?Received $received = null,
        ?\DateTimeInterface $timestamp = null,
        ?Transmitted $transmitted = null,
    ): self {
        $obj = new self;

        null !== $global_ip && $obj->global_ip = $global_ip;
        null !== $global_ip_assignment && $obj->global_ip_assignment = $global_ip_assignment;
        null !== $received && $obj->received = $received;
        null !== $timestamp && $obj->timestamp = $timestamp;
        null !== $transmitted && $obj->transmitted = $transmitted;

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

    public function withReceived(Received $received): self
    {
        $obj = clone $this;
        $obj->received = $received;

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

    public function withTransmitted(Transmitted $transmitted): self
    {
        $obj = clone $this;
        $obj->transmitted = $transmitted;

        return $obj;
    }
}
