<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupGetResponse\Data;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupGetResponse\Data\Result;

/**
 * @phpstan-type NumberLookupGetResponseShape = array{data?: Data|null}
 */
final class NumberLookupGetResponse implements BaseModel
{
    /** @use SdkModel<NumberLookupGetResponseShape> */
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
     *   aggregationType?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endDate?: string|null,
     *   managedAccounts?: list<string>|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: list<Result>|null,
     *   startDate?: string|null,
     *   status?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * Telco data usage report response.
     *
     * @param Data|array{
     *   id?: string|null,
     *   aggregationType?: string|null,
     *   createdAt?: \DateTimeInterface|null,
     *   endDate?: string|null,
     *   managedAccounts?: list<string>|null,
     *   recordType?: string|null,
     *   reportURL?: string|null,
     *   result?: list<Result>|null,
     *   startDate?: string|null,
     *   status?: string|null,
     *   updatedAt?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
