<?php

declare(strict_types=1);

namespace Telnyx\UsageReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\UsageReports\UsageReportGetOptionsResponse\Data;
use Telnyx\UsageReports\UsageReportGetOptionsResponse\Data\RecordType;

/**
 * An object following one of the schemas published in https://developers.telnyx.com/docs/api/v2/detail-records.
 *
 * @phpstan-type UsageReportGetOptionsResponseShape = array{data?: list<Data>|null}
 */
final class UsageReportGetOptionsResponse implements BaseModel
{
    /** @use SdkModel<UsageReportGetOptionsResponseShape> */
    use SdkModel;

    /**
     * Collection of product description.
     *
     * @var list<Data>|null $data
     */
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
     * @param list<Data|array{
     *   product?: string|null,
     *   productDimensions?: list<string>|null,
     *   productMetrics?: list<string>|null,
     *   recordTypes?: list<RecordType>|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * Collection of product description.
     *
     * @param list<Data|array{
     *   product?: string|null,
     *   productDimensions?: list<string>|null,
     *   productMetrics?: list<string>|null,
     *   recordTypes?: list<RecordType>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
