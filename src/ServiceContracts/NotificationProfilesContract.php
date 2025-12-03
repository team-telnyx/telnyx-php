<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationProfiles\NotificationProfile;
use Telnyx\NotificationProfiles\NotificationProfileCreateParams;
use Telnyx\NotificationProfiles\NotificationProfileDeleteResponse;
use Telnyx\NotificationProfiles\NotificationProfileGetResponse;
use Telnyx\NotificationProfiles\NotificationProfileListParams;
use Telnyx\NotificationProfiles\NotificationProfileNewResponse;
use Telnyx\NotificationProfiles\NotificationProfileUpdateParams;
use Telnyx\NotificationProfiles\NotificationProfileUpdateResponse;
use Telnyx\RequestOptions;

interface NotificationProfilesContract
{
    /**
     * @api
     *
     * @param array<mixed>|NotificationProfileCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NotificationProfileCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationProfileNewResponse;

    /**
     * @api
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
     * @param array<mixed>|NotificationProfileUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $notificationProfileID,
        array|NotificationProfileUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationProfileUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|NotificationProfileListParams $params
     *
     * @return DefaultPagination<NotificationProfile>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationProfileListParams $params,
        ?RequestOptions $requestOptions = null,
    ): DefaultPagination;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationProfileDeleteResponse;
}
