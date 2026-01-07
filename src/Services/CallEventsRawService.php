<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\CallEvents\CallEventListParams;
use Telnyx\CallEvents\CallEventListParams\Filter;
use Telnyx\CallEvents\CallEventListParams\Page;
use Telnyx\CallEvents\CallEventListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CallEventsRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\CallEvents\CallEventListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\CallEvents\CallEventListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     *   filter?: Filter|FilterShape, page?: Page|PageShape
     * }|CallEventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<CallEventListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|CallEventListParams $params,
        RequestOptions|array|null $requestOptions = null,
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
