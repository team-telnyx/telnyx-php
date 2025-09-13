<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type total_alias = array{
 *   bytesReceived?: int, bytesSent?: int, ops?: int, successfulOps?: int
 * }
 */
final class Total implements BaseModel
{
    /** @use SdkModel<total_alias> */
    use SdkModel;

    /**
     * The number of bytes received.
     */
    #[Api('bytes_received', optional: true)]
    public ?int $bytesReceived;

    /**
     * The number of bytes sent.
     */
    #[Api('bytes_sent', optional: true)]
    public ?int $bytesSent;

    /**
     * The number of operations.
     */
    #[Api(optional: true)]
    public ?int $ops;

    /**
     * The number of successful operations.
     */
    #[Api('successful_ops', optional: true)]
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

        null !== $bytesReceived && $obj->bytesReceived = $bytesReceived;
        null !== $bytesSent && $obj->bytesSent = $bytesSent;
        null !== $ops && $obj->ops = $ops;
        null !== $successfulOps && $obj->successfulOps = $successfulOps;

        return $obj;
    }

    /**
     * The number of bytes received.
     */
    public function withBytesReceived(int $bytesReceived): self
    {
        $obj = clone $this;
        $obj->bytesReceived = $bytesReceived;

        return $obj;
    }

    /**
     * The number of bytes sent.
     */
    public function withBytesSent(int $bytesSent): self
    {
        $obj = clone $this;
        $obj->bytesSent = $bytesSent;

        return $obj;
    }

    /**
     * The number of operations.
     */
    public function withOps(int $ops): self
    {
        $obj = clone $this;
        $obj->ops = $ops;

        return $obj;
    }

    /**
     * The number of successful operations.
     */
    public function withSuccessfulOps(int $successfulOps): self
    {
        $obj = clone $this;
        $obj->successfulOps = $successfulOps;

        return $obj;
    }
}
