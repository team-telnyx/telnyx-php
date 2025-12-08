<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\ScheduledEvents\ConversationChannelType;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventCreateParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventDeleteParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventRetrieveParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledSMSEventResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\ScheduledEventsContract;

final class ScheduledEventsService implements ScheduledEventsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a scheduled event for an assistant
     *
     * @param array{
     *   scheduled_at_fixed_datetime: string|\DateTimeInterface,
     *   telnyx_agent_target: string,
     *   telnyx_conversation_channel: 'phone_call'|'sms_chat'|ConversationChannelType,
     *   telnyx_end_user_target: string,
     *   conversation_metadata?: array<string,string|int|bool>,
     *   text?: string,
     * }|ScheduledEventCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        string $assistantID,
        array|ScheduledEventCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse {
        [$parsed, $options] = ScheduledEventCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse,> */
        $response = $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/scheduled_events', $assistantID],
            body: (object) $parsed,
            options: $options,
            convert: ScheduledEventResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a scheduled event by event ID
     *
     * @param array{assistant_id: string}|ScheduledEventRetrieveParams $params
     *
     * @throws APIException
     */
    public function retrieve(
        string $eventID,
        array|ScheduledEventRetrieveParams $params,
        ?RequestOptions $requestOptions = null,
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse {
        [$parsed, $options] = ScheduledEventRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $assistantID = $parsed['assistant_id'];
        unset($parsed['assistant_id']);

        /** @var BaseResponse<ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse,> */
        $response = $this->client->request(
            method: 'get',
            path: [
                'ai/assistants/%1$s/scheduled_events/%2$s', $assistantID, $eventID,
            ],
            options: $options,
            convert: ScheduledEventResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Get scheduled events for an assistant with pagination and filtering
     *
     * @param array{
     *   conversation_channel?: 'phone_call'|'sms_chat'|ConversationChannelType,
     *   from_date?: string|\DateTimeInterface,
     *   page?: array{number?: int, size?: int},
     *   to_date?: string|\DateTimeInterface,
     * }|ScheduledEventListParams $params
     *
     * @throws APIException
     */
    public function list(
        string $assistantID,
        array|ScheduledEventListParams $params,
        ?RequestOptions $requestOptions = null,
    ): ScheduledEventListResponse {
        [$parsed, $options] = ScheduledEventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<ScheduledEventListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['ai/assistants/%1$s/scheduled_events', $assistantID],
            query: $parsed,
            options: $options,
            convert: ScheduledEventListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * If the event is pending, this will cancel the event. Otherwise, this will simply remove the record of the event.
     *
     * @param array{assistant_id: string}|ScheduledEventDeleteParams $params
     *
     * @throws APIException
     */
    public function delete(
        string $eventID,
        array|ScheduledEventDeleteParams $params,
        ?RequestOptions $requestOptions = null,
    ): mixed {
        [$parsed, $options] = ScheduledEventDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $assistantID = $parsed['assistant_id'];
        unset($parsed['assistant_id']);

        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: [
                'ai/assistants/%1$s/scheduled_events/%2$s', $assistantID, $eventID,
            ],
            options: $options,
            convert: null,
        );

        return $response->parse();
    }
}
