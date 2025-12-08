<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data\Category1 as Category;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data\Total;

/**
 * @phpstan-type UsageGetAPIUsageResponseShape = array{data?: list<Data>|null}
 */
final class UsageGetAPIUsageResponse implements BaseModel
{
    /** @use SdkModel<UsageGetAPIUsageResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
     *   categories?: list<Category>|null,
     *   timestamp?: \DateTimeInterface|null,
     *   total?: Total|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   categories?: list<Category>|null,
     *   timestamp?: \DateTimeInterface|null,
     *   total?: Total|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
