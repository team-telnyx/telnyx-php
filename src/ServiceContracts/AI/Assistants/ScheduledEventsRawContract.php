<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventCreateParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventDeleteParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventRetrieveParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledSMSEventResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ScheduledEventsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|ScheduledEventCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse>
     *
     * @throws APIException
     */
    public function create(
        string $assistantID,
        array|ScheduledEventCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ScheduledEventRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $eventID,
        array|ScheduledEventRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ScheduledEventListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse,>,>
     *
     * @throws APIException
     */
    public function list(
        string $assistantID,
        array|ScheduledEventListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|ScheduledEventDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $eventID,
        array|ScheduledEventDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
