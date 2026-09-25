<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\EmailEvents\EmailEventGetStatsResponse;
use Telnyx\EmailEvents\EmailEventListParams;
use Telnyx\EmailEvents\EmailEventListResponse;
use Telnyx\EmailEvents\EmailEventRetrieveStatsParams;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\EmailEventsRawContract;

/**
 * Retrieve account-level email events and event statistics.
 *
 * @phpstan-import-type EventTypeShape from \Telnyx\EmailEvents\EmailEventListParams\EventType
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class EmailEventsRawService implements EmailEventsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Lists account-level email events sorted oldest first by `occurred_at asc, id asc`. Each row contains a legacy email.-prefixed event_type and an additive canonical_event_type. Gateway rejection renders email.failed with canonical email.gw_reject; ambiguous injection timeout renders email.injection_timeout in both; MTA expiration renders email.bounced with canonical email.expired. Message-scoped queued, sending, sandbox, cancelled, and daily_limit_exceeded rows fan out per durable recipient with stable derived IDs matching webhook delivery. Scheduled is the cardinality exception: account polling retains one message-scoped scheduled row with its stored event ID, while scheduled webhook publication fans out per recipient with derived IDs; reconcile scheduled events by message ID, event type, and occurrence time rather than event UUID. Recipient-scoped stored rows retain their stored UUIDs across polling and webhook delivery. Legacy names are derived from stored rows; an AdminBounce row stored as failed renders email.failed in polling while its webhook retains email.bounced, both with canonical email.failed.
     *
     * @param array{
     *   emailID?: string,
     *   eventType?: EventTypeShape,
     *   from?: \DateTimeInterface,
     *   pageSize?: int,
     *   pageCursor?: string,
     *   to?: \DateTimeInterface,
     * }|EmailEventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailEventListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|EmailEventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailEventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'email_events',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'emailID' => 'email_id',
                    'eventType' => 'event_type',
                    'pageSize' => 'page_size',
                    'pageCursor' => 'page[cursor]',
                ],
            ),
            options: $options,
            convert: EmailEventListResponse::class,
        );
    }

    /**
     * @api
     *
     * Returns counts and rates for email events over a time range. The default start time is 30 days ago.
     *
     * @param array{
     *   from?: \DateTimeInterface, to?: \DateTimeInterface
     * }|EmailEventRetrieveStatsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<EmailEventGetStatsResponse>
     *
     * @throws APIException
     */
    public function retrieveStats(
        array|EmailEventRetrieveStatsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = EmailEventRetrieveStatsParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'email_events/stats',
            query: $parsed,
            options: $options,
            convert: EmailEventGetStatsResponse::class,
        );
    }
}
