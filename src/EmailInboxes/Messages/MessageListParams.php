<?php

declare(strict_types=1);

namespace Telnyx\EmailInboxes\Messages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Lists inbound messages newest first. All access is scoped to the authenticated
 * account. `filter[search]` performs PostgreSQL full-text search over the subject,
 * plain-text body, and HTML body. Filters compose with stable cursor pagination.
 *
 * @see Telnyx\Services\EmailInboxes\MessagesService::list()
 *
 * @phpstan-type MessageListParamsShape = array{
 *   filterFrom?: string|null,
 *   filterLabel?: string|null,
 *   filterRead?: bool|null,
 *   filterReceivedAfter?: \DateTimeInterface|null,
 *   filterReceivedBefore?: \DateTimeInterface|null,
 *   filterSearch?: string|null,
 *   filterSubject?: string|null,
 *   filterUnread?: bool|null,
 *   pageAfter?: string|null,
 *   pageSize?: int|null,
 * }
 */
final class MessageListParams implements BaseModel
{
    /** @use SdkModel<MessageListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Case-insensitive literal substring of the sender address.
     */
    #[Optional]
    public ?string $filterFrom;

    /**
     * Returns only messages carrying this label. Matching is exact and case-sensitive. Reserved `telnyx:` labels can be filtered on even though they cannot be written by customers.
     */
    #[Optional]
    public ?string $filterLabel;

    /**
     * Whether the message has a read timestamp.
     */
    #[Optional]
    public ?bool $filterRead;

    /**
     * Inclusive ISO 8601 lower bound for the received timestamp.
     */
    #[Optional]
    public ?\DateTimeInterface $filterReceivedAfter;

    /**
     * Inclusive ISO 8601 upper bound for the received timestamp.
     */
    #[Optional]
    public ?\DateTimeInterface $filterReceivedBefore;

    /**
     * Full-text query over subject and body, up to 500 characters.
     */
    #[Optional]
    public ?string $filterSearch;

    /**
     * Case-insensitive literal substring of the subject.
     */
    #[Optional]
    public ?string $filterSubject;

    /**
     * Whether the message has no read timestamp. Set to `true` to return only unread messages.
     */
    #[Optional]
    public ?bool $filterUnread;

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
     */
    public static function with(
        ?string $filterFrom = null,
        ?string $filterLabel = null,
        ?bool $filterRead = null,
        ?\DateTimeInterface $filterReceivedAfter = null,
        ?\DateTimeInterface $filterReceivedBefore = null,
        ?string $filterSearch = null,
        ?string $filterSubject = null,
        ?bool $filterUnread = null,
        ?string $pageAfter = null,
        ?int $pageSize = null,
    ): self {
        $self = new self;

        null !== $filterFrom && $self['filterFrom'] = $filterFrom;
        null !== $filterLabel && $self['filterLabel'] = $filterLabel;
        null !== $filterRead && $self['filterRead'] = $filterRead;
        null !== $filterReceivedAfter && $self['filterReceivedAfter'] = $filterReceivedAfter;
        null !== $filterReceivedBefore && $self['filterReceivedBefore'] = $filterReceivedBefore;
        null !== $filterSearch && $self['filterSearch'] = $filterSearch;
        null !== $filterSubject && $self['filterSubject'] = $filterSubject;
        null !== $filterUnread && $self['filterUnread'] = $filterUnread;
        null !== $pageAfter && $self['pageAfter'] = $pageAfter;
        null !== $pageSize && $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Case-insensitive literal substring of the sender address.
     */
    public function withFilterFrom(string $filterFrom): self
    {
        $self = clone $this;
        $self['filterFrom'] = $filterFrom;

        return $self;
    }

    /**
     * Returns only messages carrying this label. Matching is exact and case-sensitive. Reserved `telnyx:` labels can be filtered on even though they cannot be written by customers.
     */
    public function withFilterLabel(string $filterLabel): self
    {
        $self = clone $this;
        $self['filterLabel'] = $filterLabel;

        return $self;
    }

    /**
     * Whether the message has a read timestamp.
     */
    public function withFilterRead(bool $filterRead): self
    {
        $self = clone $this;
        $self['filterRead'] = $filterRead;

        return $self;
    }

    /**
     * Inclusive ISO 8601 lower bound for the received timestamp.
     */
    public function withFilterReceivedAfter(
        \DateTimeInterface $filterReceivedAfter
    ): self {
        $self = clone $this;
        $self['filterReceivedAfter'] = $filterReceivedAfter;

        return $self;
    }

    /**
     * Inclusive ISO 8601 upper bound for the received timestamp.
     */
    public function withFilterReceivedBefore(
        \DateTimeInterface $filterReceivedBefore
    ): self {
        $self = clone $this;
        $self['filterReceivedBefore'] = $filterReceivedBefore;

        return $self;
    }

    /**
     * Full-text query over subject and body, up to 500 characters.
     */
    public function withFilterSearch(string $filterSearch): self
    {
        $self = clone $this;
        $self['filterSearch'] = $filterSearch;

        return $self;
    }

    /**
     * Case-insensitive literal substring of the subject.
     */
    public function withFilterSubject(string $filterSubject): self
    {
        $self = clone $this;
        $self['filterSubject'] = $filterSubject;

        return $self;
    }

    /**
     * Whether the message has no read timestamp. Set to `true` to return only unread messages.
     */
    public function withFilterUnread(bool $filterUnread): self
    {
        $self = clone $this;
        $self['filterUnread'] = $filterUnread;

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
