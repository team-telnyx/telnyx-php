<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventListResponse\Data;
use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ScheduledEventListResponseShape = array{
 *   data: list<ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse>,
 *   meta: Meta,
 * }
 */
final class ScheduledEventListResponse implements BaseModel
{
    /** @use SdkModel<ScheduledEventListResponseShape> */
    use SdkModel;

    /** @var list<ScheduledPhoneCallEventResponse|ScheduledSMSEventResponse> $data */
    #[Required(list: Data::class)]
    public array $data;

    #[Required]
    public Meta $meta;

    /**
     * `new ScheduledEventListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScheduledEventListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScheduledEventListResponse)->withData(...)->withMeta(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<ScheduledPhoneCallEventResponse|array{
     *   assistantID: string,
     *   scheduledAtFixedDatetime: \DateTimeInterface,
     *   telnyxAgentTarget: string,
     *   telnyxConversationChannel: value-of<ConversationChannelType>,
     *   telnyxEndUserTarget: string,
     *   conversationID?: string|null,
     *   conversationMetadata?: array<string,string|int|bool>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   errors?: list<string>|null,
     *   retryAttempts?: int|null,
     *   retryCount?: int|null,
     *   scheduledEventID?: string|null,
     *   status?: value-of<EventStatus>|null,
     * }|ScheduledSMSEventResponse|array{
     *   assistantID: string,
     *   scheduledAtFixedDatetime: \DateTimeInterface,
     *   telnyxAgentTarget: string,
     *   telnyxConversationChannel: value-of<ConversationChannelType>,
     *   telnyxEndUserTarget: string,
     *   text: string,
     *   conversationID?: string|null,
     *   conversationMetadata?: array<string,string|int|bool>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   errors?: list<string>|null,
     *   retryCount?: int|null,
     *   scheduledEventID?: string|null,
     *   status?: value-of<EventStatus>|null,
     * }> $data
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<ScheduledPhoneCallEventResponse|array{
     *   assistantID: string,
     *   scheduledAtFixedDatetime: \DateTimeInterface,
     *   telnyxAgentTarget: string,
     *   telnyxConversationChannel: value-of<ConversationChannelType>,
     *   telnyxEndUserTarget: string,
     *   conversationID?: string|null,
     *   conversationMetadata?: array<string,string|int|bool>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   errors?: list<string>|null,
     *   retryAttempts?: int|null,
     *   retryCount?: int|null,
     *   scheduledEventID?: string|null,
     *   status?: value-of<EventStatus>|null,
     * }|ScheduledSMSEventResponse|array{
     *   assistantID: string,
     *   scheduledAtFixedDatetime: \DateTimeInterface,
     *   telnyxAgentTarget: string,
     *   telnyxConversationChannel: value-of<ConversationChannelType>,
     *   telnyxEndUserTarget: string,
     *   text: string,
     *   conversationID?: string|null,
     *   conversationMetadata?: array<string,string|int|bool>|null,
     *   createdAt?: \DateTimeInterface|null,
     *   errors?: list<string>|null,
     *   retryCount?: int|null,
     *   scheduledEventID?: string|null,
     *   status?: value-of<EventStatus>|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
