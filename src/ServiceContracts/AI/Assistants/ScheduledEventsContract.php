<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\ScheduledEvents\ConversationChannelType;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledSMSEventResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ConversationMetadataShape from \Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventCreateParams\ConversationMetadata
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ScheduledEventsContract
{
    /**
     * @api
     *
     * @param \DateTimeInterface $scheduledAtFixedDatetime The datetime at which the event should be scheduled. Formatted as ISO 8601.
     * @param string $telnyxAgentTarget the phone number, SIP URI, to schedule the call or text from
     * @param ConversationChannelType|value-of<ConversationChannelType> $telnyxConversationChannel
     * @param string $telnyxEndUserTarget the phone number, SIP URI, to schedule the call or text to
     * @param array<string,ConversationMetadataShape> $conversationMetadata Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
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
        ?array $conversationMetadata = null,
        ?string $text = null,
        RequestOptions|array|null $requestOptions = null,
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse;

    /**
     * @api
     *
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
     * @param ConversationChannelType|value-of<ConversationChannelType> $conversationChannel
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
