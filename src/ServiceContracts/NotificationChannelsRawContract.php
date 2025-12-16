<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\NotificationChannels\NotificationChannel;
use Telnyx\NotificationChannels\NotificationChannelCreateParams;
use Telnyx\NotificationChannels\NotificationChannelDeleteResponse;
use Telnyx\NotificationChannels\NotificationChannelGetResponse;
use Telnyx\NotificationChannels\NotificationChannelListParams;
use Telnyx\NotificationChannels\NotificationChannelNewResponse;
use Telnyx\NotificationChannels\NotificationChannelUpdateParams;
use Telnyx\NotificationChannels\NotificationChannelUpdateResponse;
use Telnyx\RequestOptions;

interface NotificationChannelsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|NotificationChannelCreateParams $params
     *
     * @return BaseResponse<NotificationChannelNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|NotificationChannelCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the id of the resource
     *
     * @return BaseResponse<NotificationChannelGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $notificationChannelID the id of the resource
     * @param array<string,mixed>|NotificationChannelUpdateParams $params
     *
     * @return BaseResponse<NotificationChannelUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $notificationChannelID,
        array|NotificationChannelUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|NotificationChannelListParams $params
     *
     * @return BaseResponse<DefaultPagination<NotificationChannel>>
     *
     * @throws APIException
     */
    public function list(
        array|NotificationChannelListParams $params,
        ?RequestOptions $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the id of the resource
     *
     * @return BaseResponse<NotificationChannelDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
