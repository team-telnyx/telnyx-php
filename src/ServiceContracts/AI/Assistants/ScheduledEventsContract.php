<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\ScheduledEvents\ConversationChannelType;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledCallSettings;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledSMSEventResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ScheduledCallSettingsShape from \Telnyx\AI\Assistants\ScheduledEvents\ScheduledCallSettings
 * @phpstan-import-type ConversationMetadataShape from \Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventCreateParams\ConversationMetadata
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ScheduledEventsContract
{
    /**
     * @api
     *
     * @param string $assistantID unique identifier of the assistant
     * @param \DateTimeInterface $scheduledAtFixedDatetime The datetime at which the event should be scheduled. Formatted as ISO 8601.
     * @param string $telnyxAgentTarget the phone number, SIP URI, to schedule the call or text from
     * @param ConversationChannelType|value-of<ConversationChannelType> $telnyxConversationChannel
     * @param string $telnyxEndUserTarget the phone number, SIP URI, to schedule the call or text to
     * @param ScheduledCallSettings|ScheduledCallSettingsShape $callSettings Per-call telephony overrides applied when a scheduled phone-call event
     * dispatches. Phone-call events only. New per-call dispatch options should be
     * added here rather than as top-level event fields.
     * @param array<string,ConversationMetadataShape> $conversationMetadata Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
     * @param array<string,string> $dynamicVariables A map of dynamic variable names to values. These variables can be referenced in the assistant's instructions and messages using {{variable_name}} syntax.
     * @param int $maxRetriesClientErrors Configure number of retries on client errors: busy, no-answer, failed, canceled (caller hung up before the callee answered)
     * @param string $text Required for sms scheduled events. The text to be sent to the end user.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        string $assistantID,
        \DateTimeInterface $scheduledAtFixedDatetime,
        string $telnyxAgentTarget,
        ConversationChannelType|string $telnyxConversationChannel,
        string $telnyxEndUserTarget,
        ScheduledCallSettings|array|null $callSettings = null,
        ?array $conversationMetadata = null,
        ?array $dynamicVariables = null,
        int $maxRetriesClientErrors = 0,
        ?int $retryIntervalSecs = null,
        ?string $text = null,
        RequestOptions|array|null $requestOptions = null,
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse;

    /**
     * @api
     *
     * @param string $eventID unique identifier of the event
     * @param string $assistantID unique identifier of the assistant
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $eventID,
        string $assistantID,
        RequestOptions|array|null $requestOptions = null,
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse;

    /**
     * @api
     *
     * @param string $assistantID unique identifier of the assistant
     * @param ConversationChannelType|value-of<ConversationChannelType> $conversationChannel filter results by conversation channel
     * @param \DateTimeInterface $fromDate start of the date range filter (inclusive, ISO 8601)
     * @param \DateTimeInterface $toDate end of the date range filter (inclusive, ISO 8601)
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse,>
     *
     * @throws APIException
     */
    public function list(
        string $assistantID,
        ConversationChannelType|string|null $conversationChannel = null,
        ?\DateTimeInterface $fromDate = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        ?\DateTimeInterface $toDate = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $eventID unique identifier of the event
     * @param string $assistantID unique identifier of the assistant
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $eventID,
        string $assistantID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed;
}
