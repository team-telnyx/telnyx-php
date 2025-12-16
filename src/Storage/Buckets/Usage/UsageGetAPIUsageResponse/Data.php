<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data\Category1 as Category;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data\Total;

/**
 * @phpstan-import-type Category1Shape from \Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data\Category1
 * @phpstan-import-type TotalShape from \Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data\Total
 *
 * @phpstan-type DataShape = array{
 *   categories?: list<Category1Shape>|null,
 *   timestamp?: \DateTimeInterface|null,
 *   total?: null|Total|TotalShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<Category>|null $categories */
    #[Optional(list: Category::class)]
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
     * @param list<Category1Shape> $categories
     * @param TotalShape $total
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
     * @param list<Category1Shape> $categories
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
     * @param TotalShape $total
     */
    public function withTotal(Total|array $total): self
    {
        $self = clone $this;
        $self['total'] = $total;

        return $self;
    }
}
