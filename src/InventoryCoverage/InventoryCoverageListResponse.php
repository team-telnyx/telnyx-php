<?php

declare(strict_types=1);

namespace Telnyx\InventoryCoverage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse\Data;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse\Data\CoverageType;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse\Data\NumberType;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse\Data\PhoneNumberType;
use Telnyx\InventoryCoverage\InventoryCoverageListResponse\Meta;

/**
 * @phpstan-type InventoryCoverageListResponseShape = array{
 *   data?: list<Data>|null, meta?: Meta|null
 * }
 */
final class InventoryCoverageListResponse implements BaseModel
{
    /** @use SdkModel<InventoryCoverageListResponseShape> */
    use SdkModel;

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
     * @param list<Data|array{
     *   administrative_area?: string|null,
     *   advance_requirements?: bool|null,
     *   count?: int|null,
     *   coverage_type?: value-of<CoverageType>|null,
     *   group?: string|null,
     *   group_type?: string|null,
     *   number_range?: int|null,
     *   number_type?: value-of<NumberType>|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   record_type?: string|null,
     * }> $data
     * @param Meta|array{total_results?: int|null} $meta
     */
    public static function with(
        ?array $data = null,
        Meta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   administrative_area?: string|null,
     *   advance_requirements?: bool|null,
     *   count?: int|null,
     *   coverage_type?: value-of<CoverageType>|null,
     *   group?: string|null,
     *   group_type?: string|null,
     *   number_range?: int|null,
     *   number_type?: value-of<NumberType>|null,
     *   phone_number_type?: value-of<PhoneNumberType>|null,
     *   record_type?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{total_results?: int|null} $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
