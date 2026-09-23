<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\EmailEvents\EmailEventGetStatsResponse;
use Telnyx\EmailEvents\EmailEventListResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type EventTypeShape from \Telnyx\EmailEvents\EmailEventListParams\EventType
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface EmailEventsContract
{
    /**
     * @api
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
    ): EmailEventListResponse;

    /**
     * @api
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
    ): EmailEventGetStatsResponse;
}
