<?php

declare(strict_types=1);

namespace Telnyx\UsageReports\UsageReportGetOptionsResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object following one of the schemas published in https://developers.telnyx.com/docs/api/v2/detail-records.
 *
 * @phpstan-type record_type = array{
 *   productDimensions?: list<string>|null,
 *   productMetrics?: list<string>|null,
 *   recordType?: string|null,
 * }
 */
final class RecordType implements BaseModel
{
    /** @use SdkModel<record_type> */
    use SdkModel;

    /**
     * Telnyx Product Dimensions.
     *
     * @var list<string>|null $productDimensions
     */
    #[Api('product_dimensions', list: 'string', optional: true)]
    public ?array $productDimensions;

    /**
     * Telnyx Product Metrics.
     *
     * @var list<string>|null $productMetrics
     */
    #[Api('product_metrics', list: 'string', optional: true)]
    public ?array $productMetrics;

    /**
     * Telnyx Product type.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $productDimensions
     * @param list<string> $productMetrics
     */
    public static function with(
        ?array $productDimensions = null,
        ?array $productMetrics = null,
        ?string $recordType = null,
    ): self {
        $obj = new self;

        null !== $productDimensions && $obj->productDimensions = $productDimensions;
        null !== $productMetrics && $obj->productMetrics = $productMetrics;
        null !== $recordType && $obj->recordType = $recordType;

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
        $obj->productDimensions = $productDimensions;

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
        $obj->productMetrics = $productMetrics;

        return $obj;
    }

    /**
     * Telnyx Product type.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
