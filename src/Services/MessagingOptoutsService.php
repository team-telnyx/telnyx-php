<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\MessagingOptouts\MessagingOptoutListResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\MessagingOptoutsContract;

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
     * @param array{
     *   gte?: string|\DateTimeInterface, lte?: string|\DateTimeInterface
     * } $createdAt Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte]
     * @param array{
     *   from?: string, messagingProfileID?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id], filter[from]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param string $redactionEnabled If receiving address (+E.164 formatted phone number) should be redacted
     *
     * @throws APIException
     */
    public function list(
        ?array $createdAt = null,
        ?array $filter = null,
        ?array $page = null,
        ?string $redactionEnabled = null,
        ?RequestOptions $requestOptions = null,
    ): MessagingOptoutListResponse {
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
