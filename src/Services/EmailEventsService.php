<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\EmailEvents\EmailEventGetStatsResponse;
use Telnyx\EmailEvents\EmailEventListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailEventsContract;

/**
 * Retrieve account-level email events and event statistics.
 *
 * @phpstan-import-type EventTypeShape from \Telnyx\EmailEvents\EmailEventListParams\EventType
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailEventsService implements EmailEventsContract
{
    /**
     * @api
     */
    public EmailEventsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new EmailEventsRawService($client);
    }

    /**
     * @api
     *
     * Lists account-level email events sorted oldest first by `occurred_at asc, id asc`. Each row contains a legacy email.-prefixed event_type and an additive canonical_event_type. Gateway rejection renders email.failed with canonical email.gw_reject; ambiguous injection timeout renders email.injection_timeout in both; MTA expiration renders email.bounced with canonical email.expired. Message-scoped queued, sending, sandbox, cancelled, and daily_limit_exceeded rows fan out per durable recipient with stable derived IDs matching webhook delivery. Scheduled is the cardinality exception: account polling retains one message-scoped scheduled row with its stored event ID, while scheduled webhook publication fans out per recipient with derived IDs; reconcile scheduled events by message ID, event type, and occurrence time rather than event UUID. Recipient-scoped stored rows retain their stored UUIDs across polling and webhook delivery. Legacy names are derived from stored rows; an AdminBounce row stored as failed renders email.failed in polling while its webhook retains email.bounced, both with canonical email.failed.
     *
     * @param string $emailID Filter events for a specific email message UUID. Invalid UUID values are silently ignored (no filter applied).
     * @param EventTypeShape $eventType Comma-separated list of event types to include. Also accepts repeated
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
     * @param \DateTimeInterface $from Inclusive ISO 8601 start timestamp. Defaults to 30 days ago when omitted.
     * @param int $pageSize Number of results to return. Defaults to 25; maximum is 100. Invalid values are clamped to the valid range.
     * @param string $pageCursor Opaque URL-safe Base64 cursor returned by a previous event list response. The legacy `page[after]` and flat `page_cursor` forms are also accepted.
     * @param \DateTimeInterface $to Inclusive ISO 8601 end timestamp. When `from` is provided without `to`, defaults to `from + 30 days`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        ?string $emailID = null,
        string|array|null $eventType = null,
        ?\DateTimeInterface $from = null,
        int $pageSize = 25,
        ?string $pageCursor = null,
        ?\DateTimeInterface $to = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailEventListResponse {
        $params = array_filter(
            [
                'emailID' => $emailID ?? Omitted::VALUE,
                'eventType' => $eventType ?? Omitted::VALUE,
                'from' => $from ?? Omitted::VALUE,
                'pageSize' => $pageSize,
                'pageCursor' => $pageCursor ?? Omitted::VALUE,
                'to' => $to ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns counts and rates for email events over a time range. The default start time is 30 days ago.
     *
     * @param \DateTimeInterface $from Inclusive ISO 8601 start timestamp. Defaults to 30 days ago when omitted.
     * @param \DateTimeInterface $to Inclusive ISO 8601 end timestamp. When `from` is provided without `to`, defaults to `from + 30 days`.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieveStats(
        ?\DateTimeInterface $from = null,
        ?\DateTimeInterface $to = null,
        RequestOptions|array|null $requestOptions = null,
    ): EmailEventGetStatsResponse {
        $params = array_filter(
            ['from' => $from ?? Omitted::VALUE, 'to' => $to ?? Omitted::VALUE],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieveStats(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
