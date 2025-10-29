<?php

declare(strict_types=1);

namespace Telnyx\UsageReports\UsageReportGetOptionsResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\UsageReports\UsageReportGetOptionsResponse\Data\RecordType;

/**
 * An object following one of the schemas published in https://developers.telnyx.com/docs/api/v2/detail-records.
 *
 * @phpstan-type DataShape = array{
 *   product?: string,
 *   productDimensions?: list<string>,
 *   productMetrics?: list<string>,
 *   recordTypes?: list<RecordType>,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Telnyx Product.
     */
    #[Api(optional: true)]
    public ?string $product;

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
     * Subproducts if applicable.
     *
     * @var list<RecordType>|null $recordTypes
     */
    #[Api('record_types', list: RecordType::class, optional: true)]
    public ?array $recordTypes;

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
     * @param list<RecordType> $recordTypes
     */
    public static function with(
        ?string $product = null,
        ?array $productDimensions = null,
        ?array $productMetrics = null,
        ?array $recordTypes = null,
    ): self {
        $obj = new self;

        null !== $product && $obj->product = $product;
        null !== $productDimensions && $obj->productDimensions = $productDimensions;
        null !== $productMetrics && $obj->productMetrics = $productMetrics;
        null !== $recordTypes && $obj->recordTypes = $recordTypes;

        return $obj;
    }

    /**
     * Telnyx Product.
     */
    public function withProduct(string $product): self
    {
        $obj = clone $this;
        $obj->product = $product;

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
     * Subproducts if applicable.
     *
     * @param list<RecordType> $recordTypes
     */
    public function withRecordTypes(array $recordTypes): self
    {
        $obj = clone $this;
        $obj->recordTypes = $recordTypes;

        return $obj;
    }
}
