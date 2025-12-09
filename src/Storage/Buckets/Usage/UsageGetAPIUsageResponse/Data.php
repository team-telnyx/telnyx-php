<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data\Category1;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data\Category1\Category;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data\Total;

/**
 * @phpstan-type DataShape = array{
 *   categories?: list<Category1>|null,
 *   timestamp?: \DateTimeInterface|null,
 *   total?: Total|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<Category1>|null $categories */
    #[Optional(list: Category1::class)]
    public ?array $categories;

    /**
     * The time the usage was recorded.
     */
    #[Optional]
    public ?\DateTimeInterface $timestamp;

    #[Optional]
    public ?Total $total;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Category1|array{
     *   bytesReceived?: int|null,
     *   bytesSent?: int|null,
     *   category?: value-of<Category>|null,
     *   ops?: int|null,
     *   successfulOps?: int|null,
     * }> $categories
     * @param Total|array{
     *   bytesReceived?: int|null,
     *   bytesSent?: int|null,
     *   ops?: int|null,
     *   successfulOps?: int|null,
     * } $total
     */
    public static function with(
        ?array $categories = null,
        ?\DateTimeInterface $timestamp = null,
        Total|array|null $total = null,
    ): self {
        $self = new self;

        null !== $categories && $self['categories'] = $categories;
        null !== $timestamp && $self['timestamp'] = $timestamp;
        null !== $total && $self['total'] = $total;

        return $self;
    }

    /**
     * @param list<Category1|array{
     *   bytesReceived?: int|null,
     *   bytesSent?: int|null,
     *   category?: value-of<Category>|null,
     *   ops?: int|null,
     *   successfulOps?: int|null,
     * }> $categories
     */
    public function withCategories(array $categories): self
    {
        $self = clone $this;
        $self['categories'] = $categories;

        return $self;
    }

    /**
     * The time the usage was recorded.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $self = clone $this;
        $self['timestamp'] = $timestamp;

        return $self;
    }

    /**
     * @param Total|array{
     *   bytesReceived?: int|null,
     *   bytesSent?: int|null,
     *   ops?: int|null,
     *   successfulOps?: int|null,
     * } $total
     */
    public function withTotal(Total|array $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
