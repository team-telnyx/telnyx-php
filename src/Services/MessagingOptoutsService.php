<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\MessagingOptouts\MessagingOptoutListParams;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\CreatedAt;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\Filter;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\Page;
use Telnyx\MessagingOptouts\MessagingOptoutListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingOptoutsContract;

use const Telnyx\Core\OMIT as omit;

final class MessagingOptoutsService implements MessagingOptoutsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieve a list of opt-out blocks.
     *
     * @param CreatedAt $createdAt Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte]
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id], filter[from]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param string $redactionEnabled If receiving address (+E.164 formatted phone number) should be redacted
     */
    public function list(
        $createdAt = omit,
        $filter = omit,
        $page = omit,
        $redactionEnabled = omit,
        ?RequestOptions $requestOptions = null,
    ): MessagingOptoutListResponse {
        [$parsed, $options] = MessagingOptoutListParams::parseRequest(
            [
                'createdAt' => $createdAt,
                'filter' => $filter,
                'page' => $page,
                'redactionEnabled' => $redactionEnabled,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'messaging_optouts',
            query: $parsed,
            options: $options,
            convert: MessagingOptoutListResponse::class,
        );
    }
}
