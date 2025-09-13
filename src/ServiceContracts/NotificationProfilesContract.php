<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\NotificationProfiles\NotificationProfileDeleteResponse;
use Telnyx\NotificationProfiles\NotificationProfileGetResponse;
use Telnyx\NotificationProfiles\NotificationProfileListParams\Page;
use Telnyx\NotificationProfiles\NotificationProfileListResponse;
use Telnyx\NotificationProfiles\NotificationProfileNewResponse;
use Telnyx\NotificationProfiles\NotificationProfileUpdateResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface NotificationProfilesContract
{
    /**
     * @api
     *
     * @param string $name a human readable name
     *
     * @return NotificationProfileNewResponse<HasRawResponse>
     */
    public function create(
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileNewResponse;

    /**
     * @api
     *
     * @return NotificationProfileGetResponse<HasRawResponse>
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileGetResponse;

    /**
     * @api
     *
     * @param string $name a human readable name
     *
     * @return NotificationProfileUpdateResponse<HasRawResponse>
     */
    public function update(
        string $id,
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileUpdateResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return NotificationProfileListResponse<HasRawResponse>
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileListResponse;

    /**
     * @api
     *
     * @return NotificationProfileDeleteResponse<HasRawResponse>
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileDeleteResponse;
}
