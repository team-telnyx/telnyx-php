<?php

declare(strict_types=1);

namespace Telnyx\UsageReports\UsageReportGetOptionsResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object following one of the schemas published in https://developers.telnyx.com/docs/api/v2/detail-records.
 *
 * @phpstan-type RecordTypeShape = array{
 *   product_dimensions?: list<string>|null,
 *   product_metrics?: list<string>|null,
 *   record_type?: string|null,
 * }
 */
final class RecordType implements BaseModel
{
    /** @use SdkModel<RecordTypeShape> */
    use SdkModel;

    /**
     * Telnyx Product Dimensions.
     *
     * @var list<string>|null $product_dimensions
     */
    #[Api(list: 'string', optional: true)]
    public ?array $product_dimensions;

    /**
     * Telnyx Product Metrics.
     *
     * @var list<string>|null $product_metrics
     */
    #[Api(list: 'string', optional: true)]
    public ?array $product_metrics;

    /**
     * Telnyx Product type.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $product_dimensions
     * @param list<string> $product_metrics
     */
    public static function with(
        ?array $product_dimensions = null,
        ?array $product_metrics = null,
        ?string $record_type = null,
    ): self {
        $obj = new self;

        null !== $product_dimensions && $obj->product_dimensions = $product_dimensions;
        null !== $product_metrics && $obj->product_metrics = $product_metrics;
        null !== $record_type && $obj->record_type = $record_type;

        return $obj;
    }

    /**
     * Telnyx Product Dimensions.
     *
     * @param list<string> $productDimensions
     */
    public function withProductDimensions(array $productDimensions): self
    {
        $obj = clone $this;
        $obj->product_dimensions = $productDimensions;

        return $obj;
    }

    /**
     * Telnyx Product Metrics.
     *
     * @param list<string> $productMetrics
     */
    public function withProductMetrics(array $productMetrics): self
    {
        $obj = clone $this;
        $obj->product_metrics = $productMetrics;

        return $obj;
    }

    /**
     * Telnyx Product type.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }
}
