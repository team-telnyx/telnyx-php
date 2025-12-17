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
 * @phpstan-import-type GlobalIPShape from \Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse\Data\GlobalIP
 * @phpstan-import-type ReceivedShape from \Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse\Data\Received
 * @phpstan-import-type TransmittedShape from \Telnyx\GlobalIPUsage\GlobalIPUsageGetResponse\Data\Transmitted
 *
 * @phpstan-type DataShape = array{
 *   globalIP?: null|GlobalIP|GlobalIPShape,
 *   received?: null|Received|ReceivedShape,
 *   timestamp?: \DateTimeInterface|null,
 *   transmitted?: null|Transmitted|TransmittedShape,
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
     * @param GlobalIP|GlobalIPShape|null $globalIP
     * @param Received|ReceivedShape|null $received
     * @param Transmitted|TransmittedShape|null $transmitted
     */
    public static function with(
        GlobalIP|array|null $globalIP = null,
        Received|array|null $received = null,
        ?\DateTimeInterface $timestamp = null,
        Transmitted|array|null $transmitted = null,
    ): self {
        $self = new self;

        null !== $globalIP && $self['globalIP'] = $globalIP;
        null !== $received && $self['received'] = $received;
        null !== $timestamp && $self['timestamp'] = $timestamp;
        null !== $transmitted && $self['transmitted'] = $transmitted;

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
     * @param Received|ReceivedShape $received
     */
    public function withReceived(Received|array $received): self
    {
        $self = clone $this;
        $self['received'] = $received;

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

    /**
     * @param Transmitted|TransmittedShape $transmitted
     */
    public function withTransmitted(Transmitted|array $transmitted): self
    {
        $self = clone $this;
        $self['transmitted'] = $transmitted;

        return $self;
    }
}
