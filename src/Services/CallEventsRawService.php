<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\CallEvents\CallEventListParams;
use Telnyx\CallEvents\CallEventListParams\Filter\Product;
use Telnyx\CallEvents\CallEventListParams\Filter\Status;
use Telnyx\CallEvents\CallEventListParams\Filter\Type;
use Telnyx\CallEvents\CallEventListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CallEventsRawContract;

final class CallEventsRawService implements CallEventsRawContract
{
    // @phpstan-ignore-next-line
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
     *     applicationName?: array{contains?: string},
     *     applicationSessionID?: string,
     *     connectionID?: string,
     *     failed?: bool,
     *     from?: string,
     *     legID?: string,
     *     name?: string,
     *     occurredAt?: array{
     *       eq?: string, gt?: string, gte?: string, lt?: string, lte?: string
     *     },
     *     outboundOutboundVoiceProfileID?: string,
     *     product?: 'call_control'|'fax'|'texml'|Product,
     *     status?: 'init'|'in_progress'|'completed'|Status,
     *     to?: string,
     *     type?: 'command'|'webhook'|Type,
     *   },
     *   page?: array{
     *     after?: string, before?: string, limit?: int, number?: int, size?: int
     *   },
     * }|CallEventListParams $params
     *
     * @return BaseResponse<DefaultPagination<CallEventListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|CallEventListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = CallEventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'call_events',
            query: $parsed,
            options: $options,
            convert: CallEventListResponse::class,
            page: DefaultPagination::class,
        );
    }
}
