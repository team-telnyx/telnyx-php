<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse\ConversationMetadata;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ScheduledPhoneCallEventResponseShape = array{
 *   assistant_id: string,
 *   scheduled_at_fixed_datetime: \DateTimeInterface,
 *   telnyx_agent_target: string,
 *   telnyx_conversation_channel: value-of<ConversationChannelType>,
 *   telnyx_end_user_target: string,
 *   conversation_id?: string|null,
 *   conversation_metadata?: array<string,string|int|bool>|null,
 *   created_at?: \DateTimeInterface|null,
 *   errors?: list<string>|null,
 *   retry_attempts?: int|null,
 *   retry_count?: int|null,
 *   scheduled_event_id?: string|null,
 *   status?: value-of<EventStatus>|null,
 * }
 */
final class ScheduledPhoneCallEventResponse implements BaseModel
{
    /** @use SdkModel<ScheduledPhoneCallEventResponseShape> */
    use SdkModel;

    #[Api]
    public string $assistant_id;

    #[Api]
    public \DateTimeInterface $scheduled_at_fixed_datetime;

    #[Api]
    public string $telnyx_agent_target;

    /** @var value-of<ConversationChannelType> $telnyx_conversation_channel */
    #[Api(enum: ConversationChannelType::class)]
    public string $telnyx_conversation_channel;

    #[Api]
    public string $telnyx_end_user_target;

    #[Api(optional: true)]
    public ?string $conversation_id;

    /** @var array<string,string|int|bool>|null $conversation_metadata */
    #[Api(map: ConversationMetadata::class, optional: true)]
    public ?array $conversation_metadata;

    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /** @var list<string>|null $errors */
    #[Api(list: 'string', optional: true)]
    public ?array $errors;

    #[Api(optional: true)]
    public ?int $retry_attempts;

    #[Api(optional: true)]
    public ?int $retry_count;

    #[Api(optional: true)]
    public ?string $scheduled_event_id;

    /** @var value-of<EventStatus>|null $status */
    #[Api(enum: EventStatus::class, optional: true)]
    public ?string $status;

    /**
     * `new ScheduledPhoneCallEventResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScheduledPhoneCallEventResponse::with(
     *   assistant_id: ...,
     *   scheduled_at_fixed_datetime: ...,
     *   telnyx_agent_target: ...,
     *   telnyx_conversation_channel: ...,
     *   telnyx_end_user_target: ...,
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
     * @param ConversationChannelType|value-of<ConversationChannelType> $telnyx_conversation_channel
     * @param array<string,string|int|bool> $conversation_metadata
     * @param list<string> $errors
     * @param EventStatus|value-of<EventStatus> $status
     */
    public static function with(
        string $assistant_id,
        \DateTimeInterface $scheduled_at_fixed_datetime,
        string $telnyx_agent_target,
        ConversationChannelType|string $telnyx_conversation_channel,
        string $telnyx_end_user_target,
        ?string $conversation_id = null,
        ?array $conversation_metadata = null,
        ?\DateTimeInterface $created_at = null,
        ?array $errors = null,
        ?int $retry_attempts = null,
        ?int $retry_count = null,
        ?string $scheduled_event_id = null,
        EventStatus|string|null $status = null,
    ): self {
        $obj = new self;

        $obj['assistant_id'] = $assistant_id;
        $obj['scheduled_at_fixed_datetime'] = $scheduled_at_fixed_datetime;
        $obj['telnyx_agent_target'] = $telnyx_agent_target;
        $obj['telnyx_conversation_channel'] = $telnyx_conversation_channel;
        $obj['telnyx_end_user_target'] = $telnyx_end_user_target;

        null !== $conversation_id && $obj['conversation_id'] = $conversation_id;
        null !== $conversation_metadata && $obj['conversation_metadata'] = $conversation_metadata;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $errors && $obj['errors'] = $errors;
        null !== $retry_attempts && $obj['retry_attempts'] = $retry_attempts;
        null !== $retry_count && $obj['retry_count'] = $retry_count;
        null !== $scheduled_event_id && $obj['scheduled_event_id'] = $scheduled_event_id;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj['assistant_id'] = $assistantID;

        return $obj;
    }

    public function withScheduledAtFixedDatetime(
        \DateTimeInterface $scheduledAtFixedDatetime
    ): self {
        $obj = clone $this;
        $obj['scheduled_at_fixed_datetime'] = $scheduledAtFixedDatetime;

        return $obj;
    }

    public function withTelnyxAgentTarget(string $telnyxAgentTarget): self
    {
        $obj = clone $this;
        $obj['telnyx_agent_target'] = $telnyxAgentTarget;

        return $obj;
    }

    /**
     * @param ConversationChannelType|value-of<ConversationChannelType> $telnyxConversationChannel
     */
    public function withTelnyxConversationChannel(
        ConversationChannelType|string $telnyxConversationChannel
    ): self {
        $obj = clone $this;
        $obj['telnyx_conversation_channel'] = $telnyxConversationChannel;

        return $obj;
    }

    public function withTelnyxEndUserTarget(string $telnyxEndUserTarget): self
    {
        $obj = clone $this;
        $obj['telnyx_end_user_target'] = $telnyxEndUserTarget;

        return $obj;
    }

    public function withConversationID(string $conversationID): self
    {
        $obj = clone $this;
        $obj['conversation_id'] = $conversationID;

        return $obj;
    }

    /**
     * @param array<string,string|int|bool> $conversationMetadata
     */
    public function withConversationMetadata(array $conversationMetadata): self
    {
        $obj = clone $this;
        $obj['conversation_metadata'] = $conversationMetadata;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * @param list<string> $errors
     */
    public function withErrors(array $errors): self
    {
        $obj = clone $this;
        $obj['errors'] = $errors;

        return $obj;
    }

    public function withRetryAttempts(int $retryAttempts): self
    {
        $obj = clone $this;
        $obj['retry_attempts'] = $retryAttempts;

        return $obj;
    }

    public function withRetryCount(int $retryCount): self
    {
        $obj = clone $this;
        $obj['retry_count'] = $retryCount;

        return $obj;
    }

    public function withScheduledEventID(string $scheduledEventID): self
    {
        $obj = clone $this;
        $obj['scheduled_event_id'] = $scheduledEventID;

        return $obj;
    }

    /**
     * @param EventStatus|value-of<EventStatus> $status
     */
    public function withStatus(EventStatus|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
