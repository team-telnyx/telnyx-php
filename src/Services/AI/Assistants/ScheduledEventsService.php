<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\ScheduledEvents\ConversationChannelType;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventCreateParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventDeleteParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListParams\Page;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventRetrieveParams;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledSMSEventResponse;
use Telnyx\Client;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\ScheduledEventsContract;

use const Telnyx\Core\OMIT as omit;

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
     * @param \DateTimeInterface $scheduledAtFixedDatetime The datetime at which the event should be scheduled. Formatted as ISO 8601.
     * @param string $telnyxAgentTarget the phone number, SIP URI, to schedule the call or text from
     * @param ConversationChannelType|value-of<ConversationChannelType> $telnyxConversationChannel
     * @param string $telnyxEndUserTarget the phone number, SIP URI, to schedule the call or text to
     * @param array<string,
     * string|int|bool,> $conversationMetadata Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
     * @param string $text Required for sms scheduled events. The text to be sent to the end user.
     */
    public function create(
        string $assistantID,
        $scheduledAtFixedDatetime,
        $telnyxAgentTarget,
        $telnyxConversationChannel,
        $telnyxEndUserTarget,
        $conversationMetadata = omit,
        $text = omit,
        ?RequestOptions $requestOptions = null,
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse {
        [$parsed, $options] = ScheduledEventCreateParams::parseRequest(
            [
                'scheduledAtFixedDatetime' => $scheduledAtFixedDatetime,
                'telnyxAgentTarget' => $telnyxAgentTarget,
                'telnyxConversationChannel' => $telnyxConversationChannel,
                'telnyxEndUserTarget' => $telnyxEndUserTarget,
                'conversationMetadata' => $conversationMetadata,
                'text' => $text,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/scheduled_events', $assistantID],
            body: (object) $parsed,
            options: $options,
            convert: ScheduledEventResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a scheduled event by event ID
     *
     * @param string $assistantID
     */
    public function retrieve(
        string $eventID,
        $assistantID,
        ?RequestOptions $requestOptions = null
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse {
        [$parsed, $options] = ScheduledEventRetrieveParams::parseRequest(
            ['assistantID' => $assistantID],
            $requestOptions
        );
        $assistantID = $parsed['assistantID'];
        unset($parsed['assistantID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: [
                'ai/assistants/%1$s/scheduled_events/%2$s', $assistantID, $eventID,
            ],
            options: $options,
            convert: ScheduledEventResponse::class,
        );
    }

    /**
     * @api
     *
     * Get scheduled events for an assistant with pagination and filtering
     *
     * @param ConversationChannelType|value-of<ConversationChannelType> $conversationChannel
     * @param \DateTimeInterface $fromDate
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param \DateTimeInterface $toDate
     *
     * @return ScheduledEventListResponse<HasRawResponse>
     */
    public function list(
        string $assistantID,
        $conversationChannel = omit,
        $fromDate = omit,
        $page = omit,
        $toDate = omit,
        ?RequestOptions $requestOptions = null,
    ): ScheduledEventListResponse {
        [$parsed, $options] = ScheduledEventListParams::parseRequest(
            [
                'conversationChannel' => $conversationChannel,
                'fromDate' => $fromDate,
                'page' => $page,
                'toDate' => $toDate,
            ],
            $requestOptions,
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/%1$s/scheduled_events', $assistantID],
            query: $parsed,
            options: $options,
            convert: ScheduledEventListResponse::class,
        );
    }

    /**
     * @api
     *
     * If the event is pending, this will cancel the event. Otherwise, this will simply remove the record of the event.
     *
     * @param string $assistantID
     */
    public function delete(
        string $eventID,
        $assistantID,
        ?RequestOptions $requestOptions = null
    ): mixed {
        [$parsed, $options] = ScheduledEventDeleteParams::parseRequest(
            ['assistantID' => $assistantID],
            $requestOptions
        );
        $assistantID = $parsed['assistantID'];
        unset($parsed['assistantID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: [
                'ai/assistants/%1$s/scheduled_events/%2$s', $assistantID, $eventID,
            ],
            options: $options,
            convert: 'mixed',
        );
    }
}
