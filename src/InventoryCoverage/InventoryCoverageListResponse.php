<?php

declare(strict_types=1);

namespace Telnyx\InventoryCoverage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse\Data;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse\Meta;

/**
 * @phpstan-type InventoryCoverageListResponseShape = array{
 *   data?: list<Data>, meta?: Meta
 * }
 */
final class InventoryCoverageListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<InventoryCoverageListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     * @param list<Data> $data
     */
    public static function with(?array $data = null, ?Meta $meta = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<Data> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
