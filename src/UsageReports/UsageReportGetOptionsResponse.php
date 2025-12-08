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
     *   product_dimensions?: list<string>|null,
     *   product_metrics?: list<string>|null,
     *   record_types?: list<RecordType>|null,
     * }> $data
     */
    public static function with(?array $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * Collection of product description.
     *
     * @param list<Data|array{
     *   product?: string|null,
     *   product_dimensions?: list<string>|null,
     *   product_metrics?: list<string>|null,
     *   record_types?: list<RecordType>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
