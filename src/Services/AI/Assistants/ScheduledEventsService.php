<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\ScheduledEvents\ConversationChannelType;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledSMSEventResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\ScheduledEventsContract;

final class ScheduledEventsService implements ScheduledEventsContract
{
    /**
     * @api
     */
    public ScheduledEventsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ScheduledEventsRawService($client);
    }

    /**
     * @api
     *
     * Create a scheduled event for an assistant
     *
     * @param string|\DateTimeInterface $scheduledAtFixedDatetime The datetime at which the event should be scheduled. Formatted as ISO 8601.
     * @param string $telnyxAgentTarget the phone number, SIP URI, to schedule the call or text from
     * @param 'phone_call'|'sms_chat'|ConversationChannelType $telnyxConversationChannel
     * @param string $telnyxEndUserTarget the phone number, SIP URI, to schedule the call or text to
     * @param array<string,string|int|bool> $conversationMetadata Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
     * @param string $text Required for sms scheduled events. The text to be sent to the end user.
     *
     * @throws APIException
     */
    public function create(
        string $assistantID,
        string|\DateTimeInterface $scheduledAtFixedDatetime,
        string $telnyxAgentTarget,
        string|ConversationChannelType $telnyxConversationChannel,
        string $telnyxEndUserTarget,
        ?array $conversationMetadata = null,
        ?string $text = null,
        ?RequestOptions $requestOptions = null,
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse {
        $params = Util::removeNulls(
            [
                'scheduledAtFixedDatetime' => $scheduledAtFixedDatetime,
                'telnyxAgentTarget' => $telnyxAgentTarget,
                'telnyxConversationChannel' => $telnyxConversationChannel,
                'telnyxEndUserTarget' => $telnyxEndUserTarget,
                'conversationMetadata' => $conversationMetadata,
                'text' => $text,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create($assistantID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a scheduled event by event ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $eventID,
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse {
        $params = Util::removeNulls(['assistantID' => $assistantID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($eventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Get scheduled events for an assistant with pagination and filtering
     *
     * @param 'phone_call'|'sms_chat'|ConversationChannelType $conversationChannel
     * @param array{
     *   number?: int, size?: int
     * } $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     *
     * @throws APIException
     */
    public function list(
        string $assistantID,
        string|ConversationChannelType|null $conversationChannel = null,
        string|\DateTimeInterface|null $fromDate = null,
        ?array $page = null,
        string|\DateTimeInterface|null $toDate = null,
        ?RequestOptions $requestOptions = null,
    ): ScheduledEventListResponse {
        $params = Util::removeNulls(
            [
                'conversationChannel' => $conversationChannel,
                'fromDate' => $fromDate,
                'page' => $page,
                'toDate' => $toDate,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list($assistantID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * If the event is pending, this will cancel the event. Otherwise, this will simply remove the record of the event.
     *
     * @throws APIException
     */
    public function delete(
        string $eventID,
        string $assistantID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        $params = Util::removeNulls(['assistantID' => $assistantID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($eventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
