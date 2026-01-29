<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TotalShape = array{
 *   bytesReceived?: int|null,
 *   bytesSent?: int|null,
 *   ops?: int|null,
 *   successfulOps?: int|null,
 * }
 */
final class Total implements BaseModel
{
    /** @use SdkModel<TotalShape> */
    use SdkModel;

    /**
     * The number of bytes received.
     */
    #[Optional('bytes_received')]
    public ?int $bytesReceived;

    /**
     * The number of bytes sent.
     */
    #[Optional('bytes_sent')]
    public ?int $bytesSent;

    /**
     * The number of operations.
     */
    #[Optional]
    public ?int $ops;

    /**
     * The number of successful operations.
     */
    #[Optional('successful_ops')]
    public ?int $successfulOps;

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
        ?int $bytesReceived = null,
        ?int $bytesSent = null,
        ?int $ops = null,
        ?int $successfulOps = null,
    ): self {
        $self = new self;

        null !== $bytesReceived && $self['bytesReceived'] = $bytesReceived;
        null !== $bytesSent && $self['bytesSent'] = $bytesSent;
        null !== $ops && $self['ops'] = $ops;
        null !== $successfulOps && $self['successfulOps'] = $successfulOps;

        return $self;
    }

    /**
     * The number of bytes received.
     */
    public function withBytesReceived(int $bytesReceived): self
    {
        $self = clone $this;
        $self['bytesReceived'] = $bytesReceived;

        return $self;
    }

    /**
     * The number of bytes sent.
     */
    public function withBytesSent(int $bytesSent): self
    {
        $self = clone $this;
        $self['bytesSent'] = $bytesSent;

        return $self;
    }

    /**
     * The number of operations.
     */
    public function withOps(int $ops): self
    {
        $self = clone $this;
        $self['ops'] = $ops;

        return $self;
    }

    /**
     * The number of successful operations.
     */
    public function withSuccessfulOps(int $successfulOps): self
    {
        $self = clone $this;
        $self['successfulOps'] = $successfulOps;

        return $self;
    }
}
