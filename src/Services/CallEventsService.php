<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\CallEvents\CallEventListParams;
use Telnyx\CallEvents\CallEventListResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CallEventsContract;

final class CallEventsService implements CallEventsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Filters call events by given filter parameters. Events are ordered by `occurred_at`. If filter for `leg_id` or `application_session_id` is not present, it only filters events from the last 24 hours.
     *
     * **Note**: Only one `filter[occurred_at]` can be passed.
     *
     * @param array{
     *   filter?: array{
     *     application_name?: array{contains?: string},
     *     application_session_id?: string,
     *     connection_id?: string,
     *     failed?: bool,
     *     from?: string,
     *     leg_id?: string,
     *     name?: string,
     *     occurred_at?: array{
     *       eq?: string, gt?: string, gte?: string, lt?: string, lte?: string
     *     },
     *     'outbound.outbound_voice_profile_id'?: string,
     *     product?: 'call_control'|'fax'|'texml',
     *     status?: 'init'|'in_progress'|'completed',
     *     to?: string,
     *     type?: 'command'|'webhook',
     *   },
     *   page?: array{
     *     after?: string, before?: string, limit?: int, number?: int, size?: int
     *   },
     * }|CallEventListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|CallEventListParams $params,
        ?RequestOptions $requestOptions = null
    ): CallEventListResponse {
        [$parsed, $options] = CallEventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'call_events',
            query: $parsed,
            options: $options,
            convert: CallEventListResponse::class,
        );
    }
}
