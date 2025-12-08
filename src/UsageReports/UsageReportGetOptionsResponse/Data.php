<?php

declare(strict_types=1);

namespace Telnyx\UsageReports\UsageReportGetOptionsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\UsageReports\UsageReportGetOptionsResponse\Data\RecordType;

/**
 * An object following one of the schemas published in https://developers.telnyx.com/docs/api/v2/detail-records.
 *
 * @phpstan-type DataShape = array{
 *   product?: string|null,
 *   product_dimensions?: list<string>|null,
 *   product_metrics?: list<string>|null,
 *   record_types?: list<RecordType>|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Telnyx Product.
     */
    #[Optional]
    public ?string $product;

    /**
     * Telnyx Product Dimensions.
     *
     * @var list<string>|null $product_dimensions
     */
    #[Optional(list: 'string')]
    public ?array $product_dimensions;

    /**
     * Telnyx Product Metrics.
     *
     * @var list<string>|null $product_metrics
     */
    #[Optional(list: 'string')]
    public ?array $product_metrics;

    /**
     * Subproducts if applicable.
     *
     * @var list<RecordType>|null $record_types
     */
    #[Optional(list: RecordType::class)]
    public ?array $record_types;

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
     * @param list<RecordType|array{
     *   product_dimensions?: list<string>|null,
     *   product_metrics?: list<string>|null,
     *   record_type?: string|null,
     * }> $record_types
     */
    public static function with(
        ?string $product = null,
        ?array $product_dimensions = null,
        ?array $product_metrics = null,
        ?array $record_types = null,
    ): self {
        $obj = new self;

        null !== $product && $obj['product'] = $product;
        null !== $product_dimensions && $obj['product_dimensions'] = $product_dimensions;
        null !== $product_metrics && $obj['product_metrics'] = $product_metrics;
        null !== $record_types && $obj['record_types'] = $record_types;

        return $obj;
    }

    /**
     * Telnyx Product.
     */
    public function withProduct(string $product): self
    {
        $obj = clone $this;
        $obj['product'] = $product;

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
        $obj['product_dimensions'] = $productDimensions;

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
        $obj['product_metrics'] = $productMetrics;

        return $obj;
    }

    /**
     * Subproducts if applicable.
     *
     * @param list<RecordType|array{
     *   product_dimensions?: list<string>|null,
     *   product_metrics?: list<string>|null,
     *   record_type?: string|null,
     * }> $recordTypes
     */
    public function withRecordTypes(array $recordTypes): self
    {
        $obj = clone $this;
        $obj['record_types'] = $recordTypes;

        return $obj;
    }
}
