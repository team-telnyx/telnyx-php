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
        $obj = new self;

        null !== $bytesReceived && $obj['bytesReceived'] = $bytesReceived;
        null !== $bytesSent && $obj['bytesSent'] = $bytesSent;
        null !== $ops && $obj['ops'] = $ops;
        null !== $successfulOps && $obj['successfulOps'] = $successfulOps;

        return $obj;
    }

    /**
     * The number of bytes received.
     */
    public function withBytesReceived(int $bytesReceived): self
    {
        $obj = clone $this;
        $obj['bytesReceived'] = $bytesReceived;

        return $obj;
    }

    /**
     * The number of bytes sent.
     */
    public function withBytesSent(int $bytesSent): self
    {
        $obj = clone $this;
        $obj['bytesSent'] = $bytesSent;

        return $obj;
    }

    /**
     * The number of operations.
     */
    public function withOps(int $ops): self
    {
        $obj = clone $this;
        $obj['ops'] = $ops;

        return $obj;
    }

    /**
     * The number of successful operations.
     */
    public function withSuccessfulOps(int $successfulOps): self
    {
        $obj = clone $this;
        $obj['successfulOps'] = $successfulOps;

        return $obj;
    }
}
