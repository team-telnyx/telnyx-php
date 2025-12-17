<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data\Category1\Category;

/**
 * @phpstan-type Category1Shape = array{
 *   bytesReceived?: int|null,
 *   bytesSent?: int|null,
 *   category?: null|Category|value-of<Category>,
 *   ops?: int|null,
 *   successfulOps?: int|null,
 * }
 */
final class Category1 implements BaseModel
{
    /** @use SdkModel<Category1Shape> */
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
     * The category of the bucket operation.
     *
     * @var value-of<Category>|null $category
     */
    #[Optional(enum: Category::class)]
    public ?string $category;

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
     *
     * @param Category|value-of<Category>|null $category
     */
    public static function with(
        ?int $bytesReceived = null,
        ?int $bytesSent = null,
        Category|string|null $category = null,
        ?int $ops = null,
        ?int $successfulOps = null,
    ): self {
        $self = new self;

        null !== $bytesReceived && $self['bytesReceived'] = $bytesReceived;
        null !== $bytesSent && $self['bytesSent'] = $bytesSent;
        null !== $category && $self['category'] = $category;
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
     * The category of the bucket operation.
     *
     * @param Category|value-of<Category> $category
     */
    public function withCategory(Category|string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

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
