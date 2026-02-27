<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\ScheduledEvents\ConversationChannelType;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledSMSEventResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\ScheduledEventsContract;

/**
 * Configure AI assistant specifications.
 *
 * @phpstan-import-type ConversationMetadataShape from \Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventCreateParams\ConversationMetadata
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
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
     * @param \DateTimeInterface $scheduledAtFixedDatetime The datetime at which the event should be scheduled. Formatted as ISO 8601.
     * @param string $telnyxAgentTarget the phone number, SIP URI, to schedule the call or text from
     * @param ConversationChannelType|value-of<ConversationChannelType> $telnyxConversationChannel
     * @param string $telnyxEndUserTarget the phone number, SIP URI, to schedule the call or text to
     * @param array<string,ConversationMetadataShape> $conversationMetadata Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
     * @param array<string,string> $dynamicVariables A map of dynamic variable names to values. These variables can be referenced in the assistant's instructions and messages using {{variable_name}} syntax.
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
        ?array $dynamicVariables = null,
        ?string $text = null,
        RequestOptions|array|null $requestOptions = null,
    ): ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse {
        $params = Util::removeNulls(
            [
                'scheduledAtFixedDatetime' => $scheduledAtFixedDatetime,
                'telnyxAgentTarget' => $telnyxAgentTarget,
                'telnyxConversationChannel' => $telnyxConversationChannel,
                'telnyxEndUserTarget' => $telnyxEndUserTarget,
                'conversationMetadata' => $conversationMetadata,
                'dynamicVariables' => $dynamicVariables,
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $eventID,
        string $assistantID,
        RequestOptions|array|null $requestOptions = null,
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
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'conversationChannel' => $conversationChannel,
                'fromDate' => $fromDate,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
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
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $eventID,
        string $assistantID,
        RequestOptions|array|null $requestOptions = null,
    ): mixed {
        $params = Util::removeNulls(['assistantID' => $assistantID]);

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($eventID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
