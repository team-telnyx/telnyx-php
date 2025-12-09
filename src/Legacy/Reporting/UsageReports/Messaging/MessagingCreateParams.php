<?php

declare(strict_types=1);

namespace Telnyx\Legacy\Reporting\UsageReports\Messaging;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new legacy usage V2 MDR report request with the specified filters.
 *
 * @see Telnyx\Services\Legacy\Reporting\UsageReports\MessagingService::create()
 *
 * @phpstan-type MessagingCreateParamsShape = array{
 *   aggregationType: int,
 *   endTime?: \DateTimeInterface,
 *   managedAccounts?: list<string>,
 *   profiles?: list<string>,
 *   selectAllManagedAccounts?: bool,
 *   startTime?: \DateTimeInterface,
 * }
 */
final class MessagingCreateParams implements BaseModel
{
    /** @use SdkModel<MessagingCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Aggregation type: No aggregation = 0, By Messaging Profile = 1, By Tags = 2.
     */
    #[Required('aggregation_type')]
    public int $aggregationType;

    #[Optional('end_time')]
    public ?\DateTimeInterface $endTime;

    /**
     * List of managed accounts to include.
     *
     * @var list<string>|null $managedAccounts
     */
    #[Optional('managed_accounts', list: 'string')]
    public ?array $managedAccounts;

    /**
     * List of messaging profile IDs to filter by.
     *
     * @var list<string>|null $profiles
     */
    #[Optional(list: 'string')]
    public ?array $profiles;

    #[Optional('select_all_managed_accounts')]
    public ?bool $selectAllManagedAccounts;

    #[Optional('start_time')]
    public ?\DateTimeInterface $startTime;

    /**
     * `new MessagingCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessagingCreateParams::with(aggregationType: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MessagingCreateParams)->withAggregationType(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $managedAccounts
     * @param list<string> $profiles
     */
    public static function with(
        int $aggregationType,
        ?\DateTimeInterface $endTime = null,
        ?array $managedAccounts = null,
        ?array $profiles = null,
        ?bool $selectAllManagedAccounts = null,
        ?\DateTimeInterface $startTime = null,
    ): self {
        $obj = new self;

        $obj['aggregationType'] = $aggregationType;

        null !== $endTime && $obj['endTime'] = $endTime;
        null !== $managedAccounts && $obj['managedAccounts'] = $managedAccounts;
        null !== $profiles && $obj['profiles'] = $profiles;
        null !== $selectAllManagedAccounts && $obj['selectAllManagedAccounts'] = $selectAllManagedAccounts;
        null !== $startTime && $obj['startTime'] = $startTime;

        return $obj;
    }

    /**
     * Aggregation type: No aggregation = 0, By Messaging Profile = 1, By Tags = 2.
     */
    public function withAggregationType(int $aggregationType): self
    {
        $obj = clone $this;
        $obj['aggregationType'] = $aggregationType;

        return $obj;
    }

    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $obj = clone $this;
        $obj['endTime'] = $endTime;

        return $obj;
    }

    /**
     * List of managed accounts to include.
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
     * List of messaging profile IDs to filter by.
     *
     * @param list<string> $profiles
     */
    public function withProfiles(array $profiles): self
    {
        $obj = clone $this;
        $obj['profiles'] = $profiles;

        return $obj;
    }

    public function withSelectAllManagedAccounts(
        bool $selectAllManagedAccounts
    ): self {
        $obj = clone $this;
        $obj['selectAllManagedAccounts'] = $selectAllManagedAccounts;

        return $obj;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj['startTime'] = $startTime;

        return $obj;
    }
}
