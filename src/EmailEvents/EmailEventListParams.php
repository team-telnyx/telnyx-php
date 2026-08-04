<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailEvents\EmailEventListParams\EventType;

/**
 * Lists account-level email events sorted oldest first by `occurred_at asc, id asc`.
 *
 * @see Telnyx\Services\EmailEventsService::list()
 *
 * @phpstan-import-type EventTypeVariants from \Telnyx\EmailEvents\EmailEventListParams\EventType
 * @phpstan-import-type EventTypeShape from \Telnyx\EmailEvents\EmailEventListParams\EventType
 *
 * @phpstan-type EmailEventListParamsShape = array{
 *   emailID?: string|null,
 *   eventType?: EventTypeShape|null,
 *   from?: \DateTimeInterface|null,
 *   pageCursor?: string|null,
 *   pageSize?: int|null,
 *   to?: \DateTimeInterface|null,
 * }
 */
final class EmailEventListParams implements BaseModel
{
    /** @use SdkModel<EmailEventListParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Filter events for a specific email message UUID. Invalid UUID values are silently ignored (no filter applied).
     */
    #[Optional]
    public ?string $emailID;

    /**
     * Comma-separated list of event types to include. Also accepts repeated query parameters (e.g. event_type=delivered&event_type=bounced). Unknown values return no matches.
     *
     * @var EventTypeVariants|null $eventType
     */
    #[Optional(union: EventType::class)]
    public string|array|null $eventType;

    /**
     * Inclusive ISO 8601 start timestamp. Defaults to 30 days ago when omitted.
     */
    #[Optional]
    public ?\DateTimeInterface $from;

    /**
     * Opaque URL-safe Base64 cursor returned by a previous list response.
     */
    #[Optional]
    public ?string $pageCursor;

    /**
     * Number of results to return. Defaults to 25; maximum is 100. Invalid values are clamped to the valid range.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Inclusive ISO 8601 end timestamp. When `from` is provided without `to`, defaults to `from + 30 days`.
     */
    #[Optional]
    public ?\DateTimeInterface $to;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param EventTypeShape|null $eventType
     */
    public static function with(
        ?string $emailID = null,
        string|array|null $eventType = null,
        ?\DateTimeInterface $from = null,
        ?string $pageCursor = null,
        ?int $pageSize = null,
        ?\DateTimeInterface $to = null,
    ): self {
        $self = new self;

        null !== $emailID && $self['emailID'] = $emailID;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $from && $self['from'] = $from;
        null !== $pageCursor && $self['pageCursor'] = $pageCursor;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $to && $self['to'] = $to;

        return $self;
    }

    /**
     * Filter events for a specific email message UUID. Invalid UUID values are silently ignored (no filter applied).
     */
    public function withEmailID(string $emailID): self
    {
        $self = clone $this;
        $self['emailID'] = $emailID;

        return $self;
    }

    /**
     * Comma-separated list of event types to include. Also accepts repeated query parameters (e.g. event_type=delivered&event_type=bounced). Unknown values return no matches.
     *
     * @param EventTypeShape $eventType
     */
    public function withEventType(string|array $eventType): self
    {
        $self = clone $this;
        $self['eventType'] = $eventType;

        return $self;
    }

    /**
     * Inclusive ISO 8601 start timestamp. Defaults to 30 days ago when omitted.
     */
    public function withFrom(\DateTimeInterface $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * Opaque URL-safe Base64 cursor returned by a previous list response.
     */
    public function withPageCursor(string $pageCursor): self
    {
        $self = clone $this;
        $self['pageCursor'] = $pageCursor;

        return $self;
    }

    /**
     * Number of results to return. Defaults to 25; maximum is 100. Invalid values are clamped to the valid range.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Inclusive ISO 8601 end timestamp. When `from` is provided without `to`, defaults to `from + 30 days`.
     */
    public function withTo(\DateTimeInterface $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }
}
