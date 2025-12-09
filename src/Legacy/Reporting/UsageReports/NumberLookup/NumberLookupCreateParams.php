<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\NumberLookup;

use Telnyx\Core\Attributes\Optional;
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
    #[Optional(enum: AggregationType::class)]
    public ?string $aggregationType;

    /**
     * End date for the usage report.
     */
    #[Optional]
    public ?\DateTimeInterface $endDate;

    /**
     * List of managed accounts to include in the report.
     *
     * @var list<string>|null $managedAccounts
     */
    #[Optional(list: 'string')]
    public ?array $managedAccounts;

    /**
     * Start date for the usage report.
     */
    #[Optional]
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
        $self = new self;

        null !== $aggregationType && $self['aggregationType'] = $aggregationType;
        null !== $endDate && $self['endDate'] = $endDate;
        null !== $managedAccounts && $self['managedAccounts'] = $managedAccounts;
        null !== $startDate && $self['startDate'] = $startDate;

        return $self;
    }

    /**
     * Type of aggregation for the report.
     *
     * @param AggregationType|value-of<AggregationType> $aggregationType
     */
    public function withAggregationType(
        AggregationType|string $aggregationType
    ): self {
        $self = clone $this;
        $self['aggregationType'] = $aggregationType;

        return $self;
    }

    /**
     * End date for the usage report.
     */
    public function withEndDate(\DateTimeInterface $endDate): self
    {
        $self = clone $this;
        $self['endDate'] = $endDate;

        return $self;
    }

    /**
     * List of managed accounts to include in the report.
     *
     * @param list<string> $managedAccounts
     */
    public function withManagedAccounts(array $managedAccounts): self
    {
        $self = clone $this;
        $self['managedAccounts'] = $managedAccounts;

        return $self;
    }

    /**
     * Start date for the usage report.
     */
    public function withStartDate(\DateTimeInterface $startDate): self
    {
        $self = clone $this;
        $self['startDate'] = $startDate;

        return $self;
    }
}
