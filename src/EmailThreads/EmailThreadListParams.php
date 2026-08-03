<?php

declare(strict_types=1);

namespace Telnyx\EmailThreads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists thread summaries for the whole account, newest first, using stable
 * cursor pagination. An agent operating many inboxes gets every
 * conversation in one call instead of one call per inbox. Each thread
 * carries its own `inbox_id` so a reply can be routed back to the right
 * inbox. Use `filter[inbox_id]` (repeatable) to narrow the result to
 * specific inboxes. Because a thread ID can be delivered to multiple
 * inboxes, each result is identified by its `(inbox_id, id)` pair.
 *
 * @see Telnyx\Services\EmailThreadsService::list()
 *
 * @phpstan-type EmailThreadListParamsShape = array{
 *   filterInboxID?: list<string>|null,
 *   filterLabel?: string|null,
 *   pageAfter?: string|null,
 *   pageSize?: int|null,
 * }
 */
final class EmailThreadListParams implements BaseModel
{
    /** @use SdkModel<EmailThreadListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Restrict results to one or more inboxes. Repeat the parameter
     * (`filter[inbox_id][]=...&filter[inbox_id][]=...`) or pass a
     * comma-separated list. Omit to list every inbox in the account.
     * Inboxes outside the account are silently excluded. If the filter
     * is present, it must contain at least one non-empty UUID.
     *
     * @var list<string>|null $filterInboxID
     */
    #[Optional(list: 'string')]
    public ?array $filterInboxID;

    /**
     * Returns only threads carrying this label. Matching is exact and case-sensitive. Thread labels are independent of the labels on the thread's messages.
     */
    #[Optional]
    public ?string $filterLabel;

    /**
     * Opaque cursor returned by the previous page.
     */
    #[Optional]
    public ?string $pageAfter;

    /**
     * Number of results to return. Defaults to 25; maximum is 100.
     */
    #[Optional]
    public ?int $pageSize;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $filterInboxID
     */
    public static function with(
        ?array $filterInboxID = null,
        ?string $filterLabel = null,
        ?string $pageAfter = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterInboxID && $self['filterInboxID'] = $filterInboxID;
        null !== $filterLabel && $self['filterLabel'] = $filterLabel;
        null !== $pageAfter && $self['pageAfter'] = $pageAfter;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Restrict results to one or more inboxes. Repeat the parameter
     * (`filter[inbox_id][]=...&filter[inbox_id][]=...`) or pass a
     * comma-separated list. Omit to list every inbox in the account.
     * Inboxes outside the account are silently excluded. If the filter
     * is present, it must contain at least one non-empty UUID.
     *
     * @param list<string> $filterInboxID
     */
    public function withFilterInboxID(array $filterInboxID): self
    {
        $self = clone $this;
        $self['filterInboxID'] = $filterInboxID;

        return $self;
    }

    /**
     * Returns only threads carrying this label. Matching is exact and case-sensitive. Thread labels are independent of the labels on the thread's messages.
     */
    public function withFilterLabel(string $filterLabel): self
    {
        $self = clone $this;
        $self['filterLabel'] = $filterLabel;

        return $self;
    }

    /**
     * Opaque cursor returned by the previous page.
     */
    public function withPageAfter(string $pageAfter): self
    {
        $self = clone $this;
        $self['pageAfter'] = $pageAfter;

        return $self;
    }

    /**
     * Number of results to return. Defaults to 25; maximum is 100.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
