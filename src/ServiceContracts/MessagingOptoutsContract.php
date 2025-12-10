<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\MessagingOptouts\MessagingOptoutListResponse;
use Telnyx\RequestOptions;

interface MessagingOptoutsContract
{
    /**
     * @api
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
    ): MessagingOptoutListResponse;
}
