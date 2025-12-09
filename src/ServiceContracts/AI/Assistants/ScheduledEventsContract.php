<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\ScheduledEvents\ConversationChannelType;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledSMSEventResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

interface ScheduledEventsContract
{
    /**
     * @api
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
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $eventID,
        string $assistantID,
        ?RequestOptions $requestOptions = null,
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse;

    /**
     * @api
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
    ): ScheduledEventListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $eventID,
        string $assistantID,
        ?RequestOptions $requestOptions = null,
    ): mixed;
}
