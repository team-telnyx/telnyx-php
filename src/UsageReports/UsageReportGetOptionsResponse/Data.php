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
 *   productDimensions?: list<string>|null,
 *   productMetrics?: list<string>|null,
 *   recordTypes?: list<RecordType>|null,
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
     * @var list<string>|null $productDimensions
     */
    #[Optional('product_dimensions', list: 'string')]
    public ?array $productDimensions;

    /**
     * Telnyx Product Metrics.
     *
     * @var list<string>|null $productMetrics
     */
    #[Optional('product_metrics', list: 'string')]
    public ?array $productMetrics;

    /**
     * Subproducts if applicable.
     *
     * @var list<RecordType>|null $recordTypes
     */
    #[Optional('record_types', list: RecordType::class)]
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
     * @param list<RecordType|array{
     *   productDimensions?: list<string>|null,
     *   productMetrics?: list<string>|null,
     *   recordType?: string|null,
     * }> $recordTypes
     */
    public static function with(
        ?string $product = null,
        ?array $productDimensions = null,
        ?array $productMetrics = null,
        ?array $recordTypes = null,
    ): self {
        $self = new self;

        null !== $product && $self['product'] = $product;
        null !== $productDimensions && $self['productDimensions'] = $productDimensions;
        null !== $productMetrics && $self['productMetrics'] = $productMetrics;
        null !== $recordTypes && $self['recordTypes'] = $recordTypes;

        return $self;
    }

    /**
     * Telnyx Product.
     */
    public function withProduct(string $product): self
    {
        $self = clone $this;
        $self['product'] = $product;

        return $self;
    }

    /**
     * Telnyx Product Dimensions.
     *
     * @param list<string> $productDimensions
     */
    public function withProductDimensions(array $productDimensions): self
    {
        $self = clone $this;
        $self['productDimensions'] = $productDimensions;

        return $self;
    }

    /**
     * Telnyx Product Metrics.
     *
     * @param list<string> $productMetrics
     */
    public function withProductMetrics(array $productMetrics): self
    {
        $self = clone $this;
        $self['productMetrics'] = $productMetrics;

        return $self;
    }

    /**
     * Subproducts if applicable.
     *
     * @param list<RecordType|array{
     *   productDimensions?: list<string>|null,
     *   productMetrics?: list<string>|null,
     *   recordType?: string|null,
     * }> $recordTypes
     */
    public function withRecordTypes(array $recordTypes): self
    {
        $self = clone $this;
        $self['recordTypes'] = $recordTypes;

        return $self;
    }
}
