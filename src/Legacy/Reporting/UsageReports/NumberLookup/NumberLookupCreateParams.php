<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Legacy\Reporting\UsageReports\NumberLookup\NumberLookupCreateParams\AggregationType;

/**
 * Submit a new telco data usage report.
 *
 * @see Telnyx\Services\Legacy\Reporting\UsageReports\NumberLookupService::create()
 *
 * @phpstan-type NumberLookupCreateParamsShape = array{
 *   aggregationType?: AggregationType|value-of<AggregationType>,
 *   endDate?: \DateTimeInterface,
 *   managedAccounts?: list<string>,
 *   startDate?: \DateTimeInterface,
 * }
 */
final class NumberLookupCreateParams implements BaseModel
{
    /** @use SdkModel<NumberLookupCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Type of aggregation for the report.
     *
     * @var value-of<AggregationType>|null $aggregationType
     */
    #[Api(enum: AggregationType::class, optional: true)]
    public ?string $aggregationType;

    /**
     * End date for the usage report.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $endDate;

    /**
     * List of managed accounts to include in the report.
     *
     * @var list<string>|null $managedAccounts
     */
    #[Api(list: 'string', optional: true)]
    public ?array $managedAccounts;

    /**
     * Start date for the usage report.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $startDate;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param AggregationType|value-of<AggregationType> $aggregationType
     * @param list<string> $managedAccounts
     */
    public static function with(
        AggregationType|string|null $aggregationType = null,
        ?\DateTimeInterface $endDate = null,
        ?array $managedAccounts = null,
        ?\DateTimeInterface $startDate = null,
    ): self {
        $obj = new self;

        null !== $aggregationType && $obj['aggregationType'] = $aggregationType;
        null !== $endDate && $obj['endDate'] = $endDate;
        null !== $managedAccounts && $obj['managedAccounts'] = $managedAccounts;
        null !== $startDate && $obj['startDate'] = $startDate;

        return $obj;
    }

    /**
     * Type of aggregation for the report.
     *
     * @param AggregationType|value-of<AggregationType> $aggregationType
     */
    public function withAggregationType(
        AggregationType|string $aggregationType
    ): self {
        $obj = clone $this;
        $obj['aggregationType'] = $aggregationType;

        return $obj;
    }

    /**
     * End date for the usage report.
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $obj = clone $this;
        $obj['endDate'] = $endDate;

        return $obj;
    }

    /**
     * List of managed accounts to include in the report.
     *
     * @param list<string> $managedAccounts
     */
    public function withManagedAccounts(array $managedAccounts): self
    {
        $obj = clone $this;
        $obj['managedAccounts'] = $managedAccounts;

        return $obj;
    }

    /**
     * Start date for the usage report.
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $obj = clone $this;
        $obj['startDate'] = $startDate;

        return $obj;
    }
}
