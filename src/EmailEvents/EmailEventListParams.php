<?php

declare(strict_types=1);

namespace Telnyx\EmailEvents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailEvents\EmailEventListParams\EventType;

/**
 * Lists account-level email events sorted oldest first by `occurred_at asc, id asc`. Each row contains a legacy email.-prefixed event_type and an additive canonical_event_type. Gateway rejection renders email.failed with canonical email.gw_reject; ambiguous injection timeout renders email.injection_timeout in both; MTA expiration renders email.bounced with canonical email.expired. Message-scoped queued, sending, sandbox, cancelled, and daily_limit_exceeded rows fan out per durable recipient with stable derived IDs matching webhook delivery. Scheduled is the cardinality exception: account polling retains one message-scoped scheduled row with its stored event ID, while scheduled webhook publication fans out per recipient with derived IDs; reconcile scheduled events by message ID, event type, and occurrence time rather than event UUID. Recipient-scoped stored rows retain their stored UUIDs across polling and webhook delivery. Legacy names are derived from stored rows; an AdminBounce row stored as failed renders email.failed in polling while its webhook retains email.bounced, both with canonical email.failed.
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
 *   pageSize?: int|null,
 *   pageCursor?: string|null,
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
     * Comma-separated list of event types to include. Also accepts repeated
     * query parameters (e.g. event_type=delivered&event_type=bounced).
     * Unknown values return no matches.
     *
     * Dual-name compatibility: values are accepted
     * bare or `email.`-prefixed. A legacy value keeps matching the
     * rows it matched pre-rename — no widening: `failed` also
     * matches the rows that now store the canonical names of the
     * outcomes it covered (`gw_reject`, `injection_timeout`,
     * `expired`); `bounced` matches stored `bounced` rows only
     * (recipient-scoped Expirations stored `failed` pre-rename and
     * never matched `bounced`, so `expired` is deliberately not a
     * `bounced` expansion). A canonical value matches its own rows
     * plus legacy rows whose recorded payload evidence proves that
     * outcome (`expired` also surfaces legacy `bounced` rows with
     * `bounce_category: transient`). The additive
     * `canonical_event_type` field in each response row names the
     * canonical outcome.
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
     * Number of results to return. Defaults to 25; maximum is 100. Invalid values are clamped to the valid range.
     */
    #[Optional]
    public ?int $pageSize;

    /**
     * Opaque URL-safe Base64 cursor returned by a previous event list response. The legacy `page[after]` and flat `page_cursor` forms are also accepted.
     */
    #[Optional]
    public ?string $pageCursor;

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
        ?int $pageSize = null,
        ?string $pageCursor = null,
        ?\DateTimeInterface $to = null,
    ): self {
        $self = new self;

        null !== $emailID && $self['emailID'] = $emailID;
        null !== $eventType && $self['eventType'] = $eventType;
        null !== $from && $self['from'] = $from;
        null !== $pageSize && $self['pageSize'] = $pageSize;
        null !== $pageCursor && $self['pageCursor'] = $pageCursor;
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
     * Comma-separated list of event types to include. Also accepts repeated
     * query parameters (e.g. event_type=delivered&event_type=bounced).
     * Unknown values return no matches.
     *
     * Dual-name compatibility: values are accepted
     * bare or `email.`-prefixed. A legacy value keeps matching the
     * rows it matched pre-rename — no widening: `failed` also
     * matches the rows that now store the canonical names of the
     * outcomes it covered (`gw_reject`, `injection_timeout`,
     * `expired`); `bounced` matches stored `bounced` rows only
     * (recipient-scoped Expirations stored `failed` pre-rename and
     * never matched `bounced`, so `expired` is deliberately not a
     * `bounced` expansion). A canonical value matches its own rows
     * plus legacy rows whose recorded payload evidence proves that
     * outcome (`expired` also surfaces legacy `bounced` rows with
     * `bounce_category: transient`). The additive
     * `canonical_event_type` field in each response row names the
     * canonical outcome.
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
     * Number of results to return. Defaults to 25; maximum is 100. Invalid values are clamped to the valid range.
     */
    public function withPageSize(int $pageSize): self
    {
        $self = clone $this;
        $self['pageSize'] = $pageSize;

        return $self;
    }

    /**
     * Opaque URL-safe Base64 cursor returned by a previous event list response. The legacy `page[after]` and flat `page_cursor` forms are also accepted.
     */
    public function withPageCursor(string $pageCursor): self
    {
        $self = clone $this;
        $self['pageCursor'] = $pageCursor;

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
