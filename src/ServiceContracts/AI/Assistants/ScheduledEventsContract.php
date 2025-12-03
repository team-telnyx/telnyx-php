<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventCreateParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventDeleteParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventRetrieveParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledSMSEventResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ScheduledEventsContract
{
    /**
     * @api
     *
     * @param array<mixed>|ScheduledEventCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $assistantID,
        array|ScheduledEventCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse;

    /**
     * @api
     *
     * @param array<mixed>|ScheduledEventRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $eventID,
        array|ScheduledEventRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse;

    /**
     * @api
     *
     * @param array<mixed>|ScheduledEventListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $assistantID,
        array|ScheduledEventListParams $params,
        ?RequestOptions $requestOptions = null,
    ): ScheduledEventListResponse;

    /**
     * @api
     *
     * @param array<mixed>|ScheduledEventDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $eventID,
        array|ScheduledEventDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
