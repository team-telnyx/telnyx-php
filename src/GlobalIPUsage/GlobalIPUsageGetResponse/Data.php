<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse\Data\GlobalIP;
use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse\Data\Received;
use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse\Data\Transmitted;

/**
 * @phpstan-type data_alias = array{
 *   globalIP?: GlobalIP,
 *   received?: Received,
 *   timestamp?: \DateTimeInterface,
 *   transmitted?: Transmitted,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    #[Api('global_ip', optional: true)]
    public ?GlobalIP $globalIP;

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
        ?GlobalIP $globalIP = null,
        ?Received $received = null,
        ?\DateTimeInterface $timestamp = null,
        ?Transmitted $transmitted = null,
    ): self {
        $obj = new self;

        null !== $globalIP && $obj->globalIP = $globalIP;
        null !== $received && $obj->received = $received;
        null !== $timestamp && $obj->timestamp = $timestamp;
        null !== $transmitted && $obj->transmitted = $transmitted;

        return $obj;
    }

    public function withGlobalIP(GlobalIP $globalIP): self
    {
        $obj = clone $this;
        $obj->globalIP = $globalIP;

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
