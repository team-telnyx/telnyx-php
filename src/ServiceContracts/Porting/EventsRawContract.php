<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Porting;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\Porting\Events\EventGetResponse;
use Telnyx\Porting\Events\EventListParams;
use Telnyx\Porting\Events\EventListResponse\PortingEventDeletedPayload;
use Telnyx\Porting\Events\EventListResponse\PortingEventMessagingChangedPayload;
use Telnyx\Porting\Events\EventListResponse\PortingEventNewCommentEvent;
use Telnyx\Porting\Events\EventListResponse\PortingEventSplitEvent;
use Telnyx\Porting\Events\EventListResponse\PortingEventStatusChangedEvent;
use Telnyx\Porting\Events\EventListResponse\PortingEventWithoutWebhook;
use Telnyx\RequestOptions;

interface EventsRawContract
{
    /**
     * @api
     *
     * @param string $id identifies the porting event
     *
     * @return BaseResponse<EventGetResponse>
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
     * @param array<string,mixed>|EventListParams $params
     *
     * @return BaseResponse<DefaultPagination<PortingEventDeletedPayload|PortingEventMessagingChangedPayload|PortingEventStatusChangedEvent|PortingEventNewCommentEvent|PortingEventSplitEvent|PortingEventWithoutWebhook,>,>
     *
     * @throws APIException
     */
    public function list(
        array|EventListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id identifies the porting event
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function republish(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse;
}
