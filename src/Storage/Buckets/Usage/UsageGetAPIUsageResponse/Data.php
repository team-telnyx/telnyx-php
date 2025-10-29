<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data\Category1 as Category;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data\Total;

/**
 * @phpstan-type DataShape = array{
 *   categories?: list<Category>, timestamp?: \DateTimeInterface, total?: Total
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /** @var list<Category>|null $categories */
    #[Api(list: Category::class, optional: true)]
    public ?array $categories;

    /**
     * The time the usage was recorded.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $timestamp;

    #[Api(optional: true)]
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
     * @param list<Category> $categories
     */
    public static function with(
        ?array $categories = null,
        ?\DateTimeInterface $timestamp = null,
        ?Total $total = null,
    ): self {
        $obj = new self;

        null !== $categories && $obj->categories = $categories;
        null !== $timestamp && $obj->timestamp = $timestamp;
        null !== $total && $obj->total = $total;

        return $obj;
    }

    /**
     * @param list<Category> $categories
     */
    public function withCategories(array $categories): self
    {
        $obj = clone $this;
        $obj->categories = $categories;

        return $obj;
    }

    /**
     * The time the usage was recorded.
     */
    public function withTimestamp(\DateTimeInterface $timestamp): self
    {
        $obj = clone $this;
        $obj->timestamp = $timestamp;

        return $obj;
    }

    public function withTotal(Total $total): self
    {
        $obj = clone $this;
        $obj->total = $total;

        return $obj;
    }
}
