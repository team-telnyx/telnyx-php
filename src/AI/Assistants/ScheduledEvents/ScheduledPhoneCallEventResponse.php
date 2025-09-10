<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse\ConversationMetadata;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type scheduled_phone_call_event_response = array{
 *   assistantID: string,
 *   scheduledAtFixedDatetime: \DateTimeInterface,
 *   telnyxAgentTarget: string,
 *   telnyxConversationChannel: value-of<ConversationChannelType>,
 *   telnyxEndUserTarget: string,
 *   conversationID?: string|null,
 *   conversationMetadata?: array<string, string|int|bool>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   errors?: list<string>|null,
 *   retryAttempts?: int|null,
 *   retryCount?: int|null,
 *   scheduledEventID?: string|null,
 *   status?: value-of<EventStatus>|null,
 * }
 */
final class ScheduledPhoneCallEventResponse implements BaseModel
{
    /** @use SdkModel<scheduled_phone_call_event_response> */
    use SdkModel;

    #[Api('assistant_id')]
    public string $assistantID;

    #[Api('scheduled_at_fixed_datetime')]
    public \DateTimeInterface $scheduledAtFixedDatetime;

    #[Api('telnyx_agent_target')]
    public string $telnyxAgentTarget;

    /** @var value-of<ConversationChannelType> $telnyxConversationChannel */
    #[Api('telnyx_conversation_channel', enum: ConversationChannelType::class)]
    public string $telnyxConversationChannel;

    #[Api('telnyx_end_user_target')]
    public string $telnyxEndUserTarget;

    #[Api('conversation_id', optional: true)]
    public ?string $conversationID;

    /** @var array<string, string|int|bool>|null $conversationMetadata */
    #[Api(
        'conversation_metadata',
        map: ConversationMetadata::class,
        optional: true
    )]
    public ?array $conversationMetadata;

    #[Api('created_at', optional: true)]
    public ?\DateTimeInterface $createdAt;

    /** @var list<string>|null $errors */
    #[Api(list: 'string', optional: true)]
    public ?array $errors;

    #[Api('retry_attempts', optional: true)]
    public ?int $retryAttempts;

    #[Api('retry_count', optional: true)]
    public ?int $retryCount;

    #[Api('scheduled_event_id', optional: true)]
    public ?string $scheduledEventID;

    /** @var value-of<EventStatus>|null $status */
    #[Api(enum: EventStatus::class, optional: true)]
    public ?string $status;

    /**
     * `new ScheduledPhoneCallEventResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScheduledPhoneCallEventResponse::with(
     *   assistantID: ...,
     *   scheduledAtFixedDatetime: ...,
     *   telnyxAgentTarget: ...,
     *   telnyxConversationChannel: ...,
     *   telnyxEndUserTarget: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScheduledPhoneCallEventResponse)
     *   ->withAssistantID(...)
     *   ->withScheduledAtFixedDatetime(...)
     *   ->withTelnyxAgentTarget(...)
     *   ->withTelnyxConversationChannel(...)
     *   ->withTelnyxEndUserTarget(...)
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
     * @param ConversationChannelType|value-of<ConversationChannelType> $telnyxConversationChannel
     * @param array<string, string|int|bool> $conversationMetadata
     * @param list<string> $errors
     * @param EventStatus|value-of<EventStatus> $status
     */
    public static function with(
        string $assistantID,
        \DateTimeInterface $scheduledAtFixedDatetime,
        string $telnyxAgentTarget,
        ConversationChannelType|string $telnyxConversationChannel,
        string $telnyxEndUserTarget,
        ?string $conversationID = null,
        ?array $conversationMetadata = null,
        ?\DateTimeInterface $createdAt = null,
        ?array $errors = null,
        ?int $retryAttempts = null,
        ?int $retryCount = null,
        ?string $scheduledEventID = null,
        EventStatus|string|null $status = null,
    ): self {
        $obj = new self;

        $obj->assistantID = $assistantID;
        $obj->scheduledAtFixedDatetime = $scheduledAtFixedDatetime;
        $obj->telnyxAgentTarget = $telnyxAgentTarget;
        $obj->telnyxConversationChannel = $telnyxConversationChannel instanceof ConversationChannelType ? $telnyxConversationChannel->value : $telnyxConversationChannel;
        $obj->telnyxEndUserTarget = $telnyxEndUserTarget;

        null !== $conversationID && $obj->conversationID = $conversationID;
        null !== $conversationMetadata && $obj->conversationMetadata = $conversationMetadata;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $errors && $obj->errors = $errors;
        null !== $retryAttempts && $obj->retryAttempts = $retryAttempts;
        null !== $retryCount && $obj->retryCount = $retryCount;
        null !== $scheduledEventID && $obj->scheduledEventID = $scheduledEventID;
        null !== $status && $obj->status = $status instanceof EventStatus ? $status->value : $status;

        return $obj;
    }

    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj->assistantID = $assistantID;

        return $obj;
    }

    public function withScheduledAtFixedDatetime(
        \DateTimeInterface $scheduledAtFixedDatetime
    ): self {
        $obj = clone $this;
        $obj->scheduledAtFixedDatetime = $scheduledAtFixedDatetime;

        return $obj;
    }

    public function withTelnyxAgentTarget(string $telnyxAgentTarget): self
    {
        $obj = clone $this;
        $obj->telnyxAgentTarget = $telnyxAgentTarget;

        return $obj;
    }

    /**
     * @param ConversationChannelType|value-of<ConversationChannelType> $telnyxConversationChannel
     */
    public function withTelnyxConversationChannel(
        ConversationChannelType|string $telnyxConversationChannel
    ): self {
        $obj = clone $this;
        $obj->telnyxConversationChannel = $telnyxConversationChannel instanceof ConversationChannelType ? $telnyxConversationChannel->value : $telnyxConversationChannel;

        return $obj;
    }

    public function withTelnyxEndUserTarget(string $telnyxEndUserTarget): self
    {
        $obj = clone $this;
        $obj->telnyxEndUserTarget = $telnyxEndUserTarget;

        return $obj;
    }

    public function withConversationID(string $conversationID): self
    {
        $obj = clone $this;
        $obj->conversationID = $conversationID;

        return $obj;
    }

    /**
     * @param array<string, string|int|bool> $conversationMetadata
     */
    public function withConversationMetadata(array $conversationMetadata): self
    {
        $obj = clone $this;
        $obj->conversationMetadata = $conversationMetadata;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    /**
     * @param list<string> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj->errors = $errors;

        return $obj;
    }

    public function withRetryAttempts(int $retryAttempts): self
    {
        $obj = clone $this;
        $obj->retryAttempts = $retryAttempts;

        return $obj;
    }

    public function withRetryCount(int $retryCount): self
    {
        $obj = clone $this;
        $obj->retryCount = $retryCount;

        return $obj;
    }

    public function withScheduledEventID(string $scheduledEventID): self
    {
        $obj = clone $this;
        $obj->scheduledEventID = $scheduledEventID;

        return $obj;
    }

    /**
     * @param EventStatus|value-of<EventStatus> $status
     */
    public function withStatus(EventStatus|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof EventStatus ? $status->value : $status;

        return $obj;
    }
}
