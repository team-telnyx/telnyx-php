<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\ScheduledEvents\ConversationChannelType;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListParams\Page;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledSMSEventResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ScheduledEventsContract
{
    /**
     * @api
     *
     * @param \DateTimeInterface $scheduledAtFixedDatetime The datetime at which the event should be scheduled. Formatted as ISO 8601.
     * @param string $telnyxAgentTarget the phone number, SIP URI, to schedule the call or text from
     * @param ConversationChannelType|value-of<ConversationChannelType> $telnyxConversationChannel
     * @param string $telnyxEndUserTarget the phone number, SIP URI, to schedule the call or text to
     * @param array<string,
     * string|int|bool,> $conversationMetadata Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
     * @param string $text Required for sms scheduled events. The text to be sent to the end user.
     *
     * @throws APIException
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
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function createRaw(
        string $assistantID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse;

    /**
     * @api
     *
     * @param string $assistantID
     *
     * @throws APIException
     */
    public function retrieve(
        string $eventID,
        $assistantID,
        ?RequestOptions $requestOptions = null
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $eventID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse;

    /**
     * @api
     *
     * @param ConversationChannelType|value-of<ConversationChannelType> $conversationChannel
     * @param \DateTimeInterface $fromDate
     * @param Page $page Consolidated page parameter (deepObject style). Originally: page[size], page[number]
     * @param \DateTimeInterface $toDate
     *
     * @throws APIException
     */
    public function list(
        string $assistantID,
        $conversationChannel = omit,
        $fromDate = omit,
        $page = omit,
        $toDate = omit,
        ?RequestOptions $requestOptions = null,
    ): ScheduledEventListResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function listRaw(
        string $assistantID,
        array $params,
        ?RequestOptions $requestOptions = null,
    ): ScheduledEventListResponse;

    /**
     * @api
     *
     * @param string $assistantID
     *
     * @throws APIException
     */
    public function delete(
        string $eventID,
        $assistantID,
        ?RequestOptions $requestOptions = null
    ): mixed;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $eventID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): mixed;
}
