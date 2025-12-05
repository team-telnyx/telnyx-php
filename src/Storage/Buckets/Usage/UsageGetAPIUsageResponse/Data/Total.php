<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type TotalShape = array{
 *   bytes_received?: int|null,
 *   bytes_sent?: int|null,
 *   ops?: int|null,
 *   successful_ops?: int|null,
 * }
 */
final class Total implements BaseModel
{
    /** @use SdkModel<TotalShape> */
    use SdkModel;

    /**
     * The number of bytes received.
     */
    #[Api(optional: true)]
    public ?int $bytes_received;

    /**
     * The number of bytes sent.
     */
    #[Api(optional: true)]
    public ?int $bytes_sent;

    /**
     * The number of operations.
     */
    #[Api(optional: true)]
    public ?int $ops;

    /**
     * The number of successful operations.
     */
    #[Api(optional: true)]
    public ?int $successful_ops;

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
        ?int $bytes_received = null,
        ?int $bytes_sent = null,
        ?int $ops = null,
        ?int $successful_ops = null,
    ): self {
        $obj = new self;

        null !== $bytes_received && $obj['bytes_received'] = $bytes_received;
        null !== $bytes_sent && $obj['bytes_sent'] = $bytes_sent;
        null !== $ops && $obj['ops'] = $ops;
        null !== $successful_ops && $obj['successful_ops'] = $successful_ops;

        return $obj;
    }

    /**
     * The number of bytes received.
     */
    public function withBytesReceived(int $bytesReceived): self
    {
        $obj = clone $this;
        $obj['bytes_received'] = $bytesReceived;

        return $obj;
    }

    /**
     * The number of bytes sent.
     */
    public function withBytesSent(int $bytesSent): self
    {
        $obj = clone $this;
        $obj['bytes_sent'] = $bytesSent;

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
        $obj['successful_ops'] = $successfulOps;

        return $obj;
    }
}
