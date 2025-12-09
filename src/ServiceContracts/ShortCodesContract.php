<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ShortCodes\ShortCodeGetResponse;
use Telnyx\ShortCodes\ShortCodeListResponse;
use Telnyx\ShortCodes\ShortCodeUpdateResponse;

interface ShortCodesContract
{
    /**
     * @api
     *
     * @param string $id The id of the short code
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ShortCodeGetResponse;

    /**
     * @api
     *
     * @param string $id The id of the short code
     * @param string $messagingProfileID unique identifier for a messaging profile
     * @param list<string> $tags
     *
     * @throws APIException
     */
    public function update(
        string $id,
        string $messagingProfileID,
        ?array $tags = null,
        ?RequestOptions $requestOptions = null,
    ): ShortCodeUpdateResponse;

    /**
     * @api
     *
     * @param array{
     *   messagingProfileID?: string
     * } $filter Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id]
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @throws APIException
     */
    public function list(
        ?array $filter = null,
        ?array $page = null,
        ?RequestOptions $requestOptions = null,
    ): ShortCodeListResponse;
}
