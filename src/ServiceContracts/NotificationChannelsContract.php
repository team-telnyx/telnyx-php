<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\NotificationChannels\NotificationChannelCreateParams;
use Telnyx\NotificationChannels\NotificationChannelDeleteResponse;
use Telnyx\NotificationChannels\NotificationChannelGetResponse;
use Telnyx\NotificationChannels\NotificationChannelListParams;
use Telnyx\NotificationChannels\NotificationChannelListResponse;
use Telnyx\NotificationChannels\NotificationChannelNewResponse;
use Telnyx\NotificationChannels\NotificationChannelUpdateParams;
use Telnyx\NotificationChannels\NotificationChannelUpdateResponse;
use Telnyx\RequestOptions;

interface NotificationChannelsContract
{
    /**
     * @api
     *
     * @param array<mixed>|NotificationChannelCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|NotificationChannelCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationChannelNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationChannelGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|NotificationChannelUpdateParams $params
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|NotificationChannelUpdateParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationChannelUpdateResponse;

    /**
     * @api
     *
     * @param array<mixed>|NotificationChannelListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|NotificationChannelListParams $params,
        ?RequestOptions $requestOptions = null,
    ): NotificationChannelListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): NotificationChannelDeleteResponse;
}
