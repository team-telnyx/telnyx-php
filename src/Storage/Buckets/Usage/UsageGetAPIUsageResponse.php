<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\Usage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Storage\Buckets\Usage\UsageGetAPIUsageResponse\Data
 *
 * @phpstan-type UsageGetAPIUsageResponseShape = array{data?: list<DataShape>|null}
 */
final class UsageGetAPIUsageResponse implements BaseModel
{
    /** @use SdkModel<UsageGetAPIUsageResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
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
     * @param list<DataShape>|null $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
