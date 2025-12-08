<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupNewResponse\Data;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupNewResponse\Data\Result;

/**
 * @phpstan-type NumberLookupNewResponseShape = array{data?: Data|null}
 */
final class NumberLookupNewResponse implements BaseModel
{
    /** @use SdkModel<NumberLookupNewResponseShape> */
    use SdkModel;

    /**
     * Telco data usage report response.
     */
    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   aggregation_type?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_date?: \DateTimeInterface|null,
     *   managed_accounts?: list<string>|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: list<Result>|null,
     *   start_date?: \DateTimeInterface|null,
     *   status?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * Telco data usage report response.
     *
     * @param Data|array{
     *   id?: string|null,
     *   aggregation_type?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   end_date?: \DateTimeInterface|null,
     *   managed_accounts?: list<string>|null,
     *   record_type?: string|null,
     *   report_url?: string|null,
     *   result?: list<Result>|null,
     *   start_date?: \DateTimeInterface|null,
     *   status?: string|null,
     *   updated_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
