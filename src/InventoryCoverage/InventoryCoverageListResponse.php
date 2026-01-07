<?php

declare(strict_types=1);

namespace Telnyx\InventoryCoverage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse\Data;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse\Meta;

/**
 * @phpstan-import-type DataShape from \Telnyx\InventoryCoverage\InventoryCoverageListResponse\Data
 * @phpstan-import-type MetaShape from \Telnyx\InventoryCoverage\InventoryCoverageListResponse\Meta
 *
 * @phpstan-type InventoryCoverageListResponseShape = array{
 *   data?: list<Data|DataShape>|null, meta?: null|Meta|MetaShape
 * }
 */
final class InventoryCoverageListResponse implements BaseModel
{
    /** @use SdkModel<InventoryCoverageListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?Meta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|DataShape>|null $data
     * @param Meta|MetaShape|null $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|MetaShape $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
