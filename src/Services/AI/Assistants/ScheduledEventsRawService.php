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
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\ScheduledEventsRawContract;

/**
 * Configure AI assistant specifications.
 *
 * @phpstan-import-type ConversationMetadataShape from \Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventCreateParams\ConversationMetadata
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ScheduledEventsRawService implements ScheduledEventsRawContract
{
    // @phpstan-ignore-next-line
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
     *   scheduledAtFixedDatetime: \DateTimeInterface,
     *   telnyxAgentTarget: string,
     *   telnyxConversationChannel: ConversationChannelType|value-of<ConversationChannelType>,
     *   telnyxEndUserTarget: string,
     *   conversationMetadata?: array<string,ConversationMetadataShape>,
     *   dynamicVariables?: array<string,string>,
     *   text?: string,
     * }|ScheduledEventCreateParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ScheduledEventCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param array{assistantID: string}|ScheduledEventRetrieveParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ScheduledEventRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $assistantID = $parsed['assistantID'];
        unset($parsed['assistantID']);

        // @phpstan-ignore-next-line return.type
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
     * @param array{
     *   conversationChannel?: ConversationChannelType|value-of<ConversationChannelType>,
     *   fromDate?: \DateTimeInterface,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   toDate?: \DateTimeInterface,
     * }|ScheduledEventListParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ScheduledEventListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/%1$s/scheduled_events', $assistantID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'conversationChannel' => 'conversation_channel',
                    'fromDate' => 'from_date',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'toDate' => 'to_date',
                ],
            ),
            options: $options,
            convert: ScheduledEventListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * If the event is pending, this will cancel the event. Otherwise, this will simply remove the record of the event.
     *
     * @param array{assistantID: string}|ScheduledEventDeleteParams $params
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
    ): BaseResponse {
        [$parsed, $options] = ScheduledEventDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $assistantID = $parsed['assistantID'];
        unset($parsed['assistantID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'ai/assistants/%1$s/scheduled_events/%2$s', $assistantID, $eventID,
            ],
            options: $options,
            convert: null,
        );
    }
}
