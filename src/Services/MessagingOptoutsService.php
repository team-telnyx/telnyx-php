<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultPagination;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\CreatedAt;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\Filter;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\Page;
use Telnyx\MessagingOptouts\MessagingOptoutListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingOptoutsContract;

/**
 * @phpstan-import-type CreatedAtShape from \Telnyx\MessagingOptouts\MessagingOptoutListParams\CreatedAt
 * @phpstan-import-type FilterShape from \Telnyx\MessagingOptouts\MessagingOptoutListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\MessagingOptouts\MessagingOptoutListParams\Page
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessagingOptoutsService implements MessagingOptoutsContract
{
    /**
     * @api
     */
    public MessagingOptoutsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessagingOptoutsRawService($client);
    }

    /**
     * @api
     *
     * Retrieve a list of opt-out blocks.
     *
     * @param CreatedAt|CreatedAtShape $createdAt Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte]
     * @param Filter|FilterShape $filter Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id], filter[from]
     * @param Page|PageShape $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param string $redactionEnabled If receiving address (+E.164 formatted phone number) should be redacted
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultPagination<MessagingOptoutListResponse>
     *
     * @throws APIException
     */
    public function list(
        CreatedAt|array|null $createdAt = null,
        Filter|array|null $filter = null,
        Page|array|null $page = null,
        ?string $redactionEnabled = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultPagination {
        $params = Util::removeNulls(
            [
                'createdAt' => $createdAt,
                'filter' => $filter,
                'page' => $page,
                'redactionEnabled' => $redactionEnabled,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
