<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\CreatedAt;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\Filter;
use Telnyx\MessagingOptouts\MessagingOptoutListParams\Page;
use Telnyx\MessagingOptouts\MessagingOptoutListResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface MessagingOptoutsContract
{
    /**
     * @api
     *
     * @param CreatedAt $createdAt Consolidated created_at parameter (deepObject style). Originally: created_at[gte], created_at[lte]
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id], filter[from]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     * @param string $redactionEnabled If receiving address (+E.164 formatted phone number) should be redacted
     *
     * @return MessagingOptoutListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $createdAt = omit,
        $filter = omit,
        $page = omit,
        $redactionEnabled = omit,
        ?RequestOptions $requestOptions = null,
    ): MessagingOptoutListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return MessagingOptoutListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): MessagingOptoutListResponse;
}
