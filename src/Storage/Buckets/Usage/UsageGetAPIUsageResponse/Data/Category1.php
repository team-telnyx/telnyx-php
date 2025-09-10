<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data\Category1\Category;

/**
 * @phpstan-type category1_alias = array{
 *   bytesReceived?: int|null,
 *   bytesSent?: int|null,
 *   category?: value-of<Category>|null,
 *   ops?: int|null,
 *   successfulOps?: int|null,
 * }
 */
final class Category1 implements BaseModel
{
    /** @use SdkModel<category1_alias> */
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
     * The category of the bucket operation.
     *
     * @var value-of<Category>|null $category
     */
    #[Api(enum: Category::class, optional: true)]
    public ?string $category;

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
     *
     * @param Category|value-of<Category> $category
     */
    public static function with(
        ?int $bytesReceived = null,
        ?int $bytesSent = null,
        Category|string|null $category = null,
        ?int $ops = null,
        ?int $successfulOps = null,
    ): self {
        $obj = new self;

        null !== $bytesReceived && $obj->bytesReceived = $bytesReceived;
        null !== $bytesSent && $obj->bytesSent = $bytesSent;
        null !== $category && $obj->category = $category instanceof Category ? $category->value : $category;
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
     * The category of the bucket operation.
     *
     * @param Category|value-of<Category> $category
     */
    public function withCategory(Category|string $category): self
    {
        $obj = clone $this;
        $obj->category = $category instanceof Category ? $category->value : $category;

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
