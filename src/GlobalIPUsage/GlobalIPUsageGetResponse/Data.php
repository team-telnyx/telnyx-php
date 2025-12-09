<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse\Data\GlobalIP;
use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse\Data\Received;
use Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse\Data\Transmitted;

/**
 * @phpstan-type DataShape = array{
 *   globalIP?: GlobalIP|null,
 *   received?: Received|null,
 *   timestamp?: \DateTimeInterface|null,
 *   transmitted?: Transmitted|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional('global_ip')]
    public ?GlobalIP $globalIP;

    #[Optional]
    public ?Received $received;

    /**
     * The timestamp of the metric.
     */
    #[Optional]
    public ?\DateTimeInterface $timestamp;

    #[Optional]
    public ?Transmitted $transmitted;

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
     * @param Received|array{amount?: float|null, unit?: string|null} $received
     * @param Transmitted|array{amount?: float|null, unit?: string|null} $transmitted
     */
    public static function with(
        GlobalIP|array|null $globalIP = null,
        Received|array|null $received = null,
        ?\DateTimeInterface $timestamp = null,
        Transmitted|array|null $transmitted = null,
    ): self {
        $obj = new self;

        null !== $globalIP && $obj['globalIP'] = $globalIP;
        null !== $received && $obj['received'] = $received;
        null !== $timestamp && $obj['timestamp'] = $timestamp;
        null !== $transmitted && $obj['transmitted'] = $transmitted;

        return $obj;
    }

    /**
     * @param GlobalIP|array{id?: string|null, ipAddress?: string|null} $globalIP
     */
    public function withGlobalIP(GlobalIP|array $globalIP): self
    {
        $obj = clone $this;
        $obj['globalIP'] = $globalIP;

        return $obj;
    }

    /**
     * @param Received|array{amount?: float|null, unit?: string|null} $received
     */
    public function withReceived(Received|array $received): self
    {
        $obj = clone $this;
        $obj['received'] = $received;

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

    /**
     * @param Transmitted|array{amount?: float|null, unit?: string|null} $transmitted
     */
    public function withTransmitted(Transmitted|array $transmitted): self
    {
        $obj = clone $this;
        $obj['transmitted'] = $transmitted;

        return $obj;
    }
}
