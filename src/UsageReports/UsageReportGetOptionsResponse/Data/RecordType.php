<?php

declare(strict_types=1);

namespace Telnyx\UsageReports\UsageReportGetOptionsResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object following one of the schemas published in https://developers.telnyx.com/docs/api/v2/detail-records.
 *
 * @phpstan-type RecordTypeShape = array{
 *   productDimensions?: list<string>|null,
 *   productMetrics?: list<string>|null,
 *   recordType?: string|null,
 * }
 */
final class RecordType implements BaseModel
{
    /** @use SdkModel<RecordTypeShape> */
    use SdkModel;

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
     * Telnyx Product type.
     */
    #[Optional('record_type')]
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
        $self = new self;

        null !== $productDimensions && $self['productDimensions'] = $productDimensions;
        null !== $productMetrics && $self['productMetrics'] = $productMetrics;
        null !== $recordType && $self['recordType'] = $recordType;

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
     * Telnyx Product type.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
