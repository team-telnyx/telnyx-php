<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\CreatedAt;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\Filter;
use Telnyx\MessagingOptouts\MessagingOptoutListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingOptoutsContract;

/**
 * @phpstan-import-type CreatedAtShape from \Telnyx\MessagingOptouts\MessagingOptoutListParams\CreatedAt
 * @phpstan-import-type FilterShape from \Telnyx\MessagingOptouts\MessagingOptoutListParams\Filter
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
     * @param string $redactionEnabled If receiving address (+E.164 formatted phone number) should be redacted
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MessagingOptoutListResponse>
     *
     * @throws APIException
     */
    public function list(
        CreatedAt|array|null $createdAt = null,
        Filter|array|null $filter = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?string $redactionEnabled = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'createdAt' => $createdAt,
                'filter' => $filter,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
                'redactionEnabled' => $redactionEnabled,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
