<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledSMSEventResponse\ConversationMetadata;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ScheduledSMSEventResponseShape = array{
 *   assistant_id: string,
 *   scheduled_at_fixed_datetime: \DateTimeInterface,
 *   telnyx_agent_target: string,
 *   telnyx_conversation_channel: value-of<ConversationChannelType>,
 *   telnyx_end_user_target: string,
 *   text: string,
 *   conversation_id?: string|null,
 *   conversation_metadata?: array<string,string|int|bool>|null,
 *   created_at?: \DateTimeInterface|null,
 *   errors?: list<string>|null,
 *   retry_count?: int|null,
 *   scheduled_event_id?: string|null,
 *   status?: value-of<EventStatus>|null,
 * }
 */
final class ScheduledSMSEventResponse implements BaseModel
{
    /** @use SdkModel<ScheduledSMSEventResponseShape> */
    use SdkModel;

    #[Required]
    public string $assistant_id;

    #[Required]
    public \DateTimeInterface $scheduled_at_fixed_datetime;

    #[Required]
    public string $telnyx_agent_target;

    /** @var value-of<ConversationChannelType> $telnyx_conversation_channel */
    #[Required(enum: ConversationChannelType::class)]
    public string $telnyx_conversation_channel;

    #[Required]
    public string $telnyx_end_user_target;

    #[Required]
    public string $text;

    #[Optional]
    public ?string $conversation_id;

    /** @var array<string,string|int|bool>|null $conversation_metadata */
    #[Optional(map: ConversationMetadata::class)]
    public ?array $conversation_metadata;

    #[Optional]
    public ?\DateTimeInterface $created_at;

    /** @var list<string>|null $errors */
    #[Optional(list: 'string')]
    public ?array $errors;

    #[Optional]
    public ?int $retry_count;

    #[Optional]
    public ?string $scheduled_event_id;

    /** @var value-of<EventStatus>|null $status */
    #[Optional(enum: EventStatus::class)]
    public ?string $status;

    /**
     * `new ScheduledSMSEventResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScheduledSMSEventResponse::with(
     *   assistant_id: ...,
     *   scheduled_at_fixed_datetime: ...,
     *   telnyx_agent_target: ...,
     *   telnyx_conversation_channel: ...,
     *   telnyx_end_user_target: ...,
     *   text: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ScheduledSMSEventResponse)
     *   ->withAssistantID(...)
     *   ->withScheduledAtFixedDatetime(...)
     *   ->withTelnyxAgentTarget(...)
     *   ->withTelnyxConversationChannel(...)
     *   ->withTelnyxEndUserTarget(...)
     *   ->withText(...)
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
        string $text,
        ?string $conversation_id = null,
        ?array $conversation_metadata = null,
        ?\DateTimeInterface $created_at = null,
        ?array $errors = null,
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
        $obj['text'] = $text;

        null !== $conversation_id && $obj['conversation_id'] = $conversation_id;
        null !== $conversation_metadata && $obj['conversation_metadata'] = $conversation_metadata;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $errors && $obj['errors'] = $errors;
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

    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj['text'] = $text;

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
