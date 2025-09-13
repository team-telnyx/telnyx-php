<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ShortCodes\ShortCodeGetResponse;
use Telnyx\ShortCodes\ShortCodeListParams\Filter;
use Telnyx\ShortCodes\ShortCodeListParams\Page;
use Telnyx\ShortCodes\ShortCodeListResponse;
use Telnyx\ShortCodes\ShortCodeUpdateResponse;

use const Telnyx\Core\OMIT as omit;

interface ShortCodesContract
{
    /**
     * @api
     *
     * @return ShortCodeGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): ShortCodeGetResponse;

    /**
     * @api
     *
     * @param string $messagingProfileID unique identifier for a messaging profile
     *
     * @return ShortCodeUpdateResponse<HasRawResponse>
     */
    public function update(
        string $id,
        $messagingProfileID,
        ?RequestOptions $requestOptions = null
    ): ShortCodeUpdateResponse;

    /**
     * @api
     *
     * @param Filter $filter Consolidated filter parameter (deepObject style). Originally: filter[messaging_profile_id]
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return ShortCodeListResponse<HasRawResponse>
     */
    public function list(
        $filter = omit,
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): ShortCodeListResponse;
}
