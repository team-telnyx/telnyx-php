<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
     */
    public function create(
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileNewResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return NotificationProfileNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileNewResponse;

    /**
     * @api
     *
     * @return NotificationProfileGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileGetResponse;

    /**
     * @api
     *
     * @return NotificationProfileGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileGetResponse;

    /**
     * @api
     *
     * @param string $name a human readable name
     *
     * @return NotificationProfileUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        $name = omit,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileUpdateResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return NotificationProfileUpdateResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function updateRaw(
        string $id,
        array $params,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileUpdateResponse;

    /**
     * @api
     *
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[number], page[size]
     *
     * @return NotificationProfileListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        $page = omit,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return NotificationProfileListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileListResponse;

    /**
     * @api
     *
     * @return NotificationProfileDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileDeleteResponse;

    /**
     * @api
     *
     * @return NotificationProfileDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileDeleteResponse;
}
