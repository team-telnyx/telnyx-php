<?php

declare(strict_types=1);

namespace Telnyx\EmailThreads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns a thread and a bounded page of its inbound and outbound messages,
 * interleaved in chronological order. The `inbox_id` returned by the list
 * endpoint is required because a thread ID can occur in multiple inboxes.
 * Only messages matching that `(inbox_id, thread_id)` pair are returned. Threads outside the account
 * return an opaque 404.
 *
 * @see Telnyx\Services\EmailThreadsService::retrieve()
 *
 * @phpstan-type EmailThreadRetrieveParamsShape = array{
 *   inboxID: string, pageAfter?: string|null, pageSize?: int|null
 * }
 */
final class EmailThreadRetrieveParams implements BaseModel
{
    /** @use SdkModel<EmailThreadRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Inbox UUID that, together with `thread_id`, identifies the thread.
     */
    #[Required]
    public string $inboxID;

    /**
     * Opaque message cursor returned by the previous thread-detail page.
     */
    #[Optional]
    public ?string $pageAfter;

    /**
     * Number of thread messages to return. Defaults to 25; maximum is 100.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * `new EmailThreadRetrieveParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmailThreadRetrieveParams::with(inboxID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmailThreadRetrieveParams)->withInboxID(...)
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
     */
    public static function with(
        string $inboxID,
        ?string $pageAfter = null,
        ?int $pageSize = null
    ): self {
        $self = new self;

        $self['inboxID'] = $inboxID;

        null !== $pageAfter && $self['pageAfter'] = $pageAfter;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Inbox UUID that, together with `thread_id`, identifies the thread.
     */
    public function withInboxID(string $inboxID): self
    {
        $self = clone $this;
        $self['inboxID'] = $inboxID;

        return $self;
    }

    /**
     * Opaque message cursor returned by the previous thread-detail page.
     */
    public function withPageAfter(string $pageAfter): self
    {
        $self = clone $this;
        $self['pageAfter'] = $pageAfter;

        return $self;
    }

    /**
     * Number of thread messages to return. Defaults to 25; maximum is 100.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }
}
