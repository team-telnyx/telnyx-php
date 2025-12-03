<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationSettings\NotificationSetting;
use Telnyx\NotificationSettings\NotificationSettingCreateParams;
use Telnyx\NotificationSettings\NotificationSettingDeleteResponse;
use Telnyx\NotificationSettings\NotificationSettingGetResponse;
use Telnyx\NotificationSettings\NotificationSettingListParams;
use Telnyx\NotificationSettings\NotificationSettingNewResponse;
use Telnyx\RequestOptions;

interface NotificationSettingsContract
{
    /**
     * @api
     *
     * @param array<mixed>|NotificationSettingCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NotificationSettingCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationSettingNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationSettingGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|NotificationSettingListParams $params
     *
     * @return DefaultPagination<NotificationSetting>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationSettingListParams $params,
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
    ): NotificationSettingDeleteResponse;
}
