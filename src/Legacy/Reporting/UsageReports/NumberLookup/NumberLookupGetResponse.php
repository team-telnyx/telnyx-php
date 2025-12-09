<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type NumberLookupGetResponseShape = array{
 *   data?: TelcoDataUsageReportResponse|null
 * }
 */
final class NumberLookupGetResponse implements BaseModel
{
    /** @use SdkModel<NumberLookupGetResponseShape> */
    use SdkModel;

    /**
     * Telco data usage report response.
     */
    #[Optional]
    public ?TelcoDataUsageReportResponse $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TelcoDataUsageReportResponse|array{
     *   id?: string|null,
     *   aggregationType?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endDate?: \DateTimeInterface|null,
     *   managedAccounts?: list<string>|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: list<TelcoDataUsageRecord>|null,
     *   startDate?: \DateTimeInterface|null,
     *   status?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(
        TelcoDataUsageReportResponse|array|null $data = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * Telco data usage report response.
     *
     * @param TelcoDataUsageReportResponse|array{
     *   id?: string|null,
     *   aggregationType?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endDate?: \DateTimeInterface|null,
     *   managedAccounts?: list<string>|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: list<TelcoDataUsageRecord>|null,
     *   startDate?: \DateTimeInterface|null,
     *   status?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(TelcoDataUsageReportResponse|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
