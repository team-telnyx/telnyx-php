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
 *   aggregation_type: int,
 *   end_time?: \DateTimeInterface,
 *   managed_accounts?: list<string>,
 *   profiles?: list<string>,
 *   select_all_managed_accounts?: bool,
 *   start_time?: \DateTimeInterface,
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
    #[Required]
    public int $aggregation_type;

    #[Optional]
    public ?\DateTimeInterface $end_time;

    /**
     * List of managed accounts to include.
     *
     * @var list<string>|null $managed_accounts
     */
    #[Optional(list: 'string')]
    public ?array $managed_accounts;

    /**
     * List of messaging profile IDs to filter by.
     *
     * @var list<string>|null $profiles
     */
    #[Optional(list: 'string')]
    public ?array $profiles;

    #[Optional]
    public ?bool $select_all_managed_accounts;

    #[Optional]
    public ?\DateTimeInterface $start_time;

    /**
     * `new MessagingCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MessagingCreateParams::with(aggregation_type: ...)
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
     * @param list<string> $managed_accounts
     * @param list<string> $profiles
     */
    public static function with(
        int $aggregation_type,
        ?\DateTimeInterface $end_time = null,
        ?array $managed_accounts = null,
        ?array $profiles = null,
        ?bool $select_all_managed_accounts = null,
        ?\DateTimeInterface $start_time = null,
    ): self {
        $obj = new self;

        $obj['aggregation_type'] = $aggregation_type;

        null !== $end_time && $obj['end_time'] = $end_time;
        null !== $managed_accounts && $obj['managed_accounts'] = $managed_accounts;
        null !== $profiles && $obj['profiles'] = $profiles;
        null !== $select_all_managed_accounts && $obj['select_all_managed_accounts'] = $select_all_managed_accounts;
        null !== $start_time && $obj['start_time'] = $start_time;

        return $obj;
    }

    /**
     * Aggregation type: No aggregation = 0, By Messaging Profile = 1, By Tags = 2.
     */
    public function withAggregationType(int $aggregationType): self
    {
        $obj = clone $this;
        $obj['aggregation_type'] = $aggregationType;

        return $obj;
    }

    public function withEndTime(\DateTimeInterface $endTime): self
    {
        $obj = clone $this;
        $obj['end_time'] = $endTime;

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
        $obj['managed_accounts'] = $managedAccounts;

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
        $obj['select_all_managed_accounts'] = $selectAllManagedAccounts;

        return $obj;
    }

    public function withStartTime(\DateTimeInterface $startTime): self
    {
        $obj = clone $this;
        $obj['start_time'] = $startTime;

        return $obj;
    }
}
