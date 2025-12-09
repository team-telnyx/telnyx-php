<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse\ConversationMetadata;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ScheduledPhoneCallEventResponseShape = array{
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
 * }
 */
final class ScheduledPhoneCallEventResponse implements BaseModel
{
    /** @use SdkModel<ScheduledPhoneCallEventResponseShape> */
    use SdkModel;

    #[Required('assistant_id')]
    public string $assistantID;

    #[Required('scheduled_at_fixed_datetime')]
    public \DateTimeInterface $scheduledAtFixedDatetime;

    #[Required('telnyx_agent_target')]
    public string $telnyxAgentTarget;

    /** @var value-of<ConversationChannelType> $telnyxConversationChannel */
    #[Required(
        'telnyx_conversation_channel',
        enum: ConversationChannelType::class
    )]
    public string $telnyxConversationChannel;

    #[Required('telnyx_end_user_target')]
    public string $telnyxEndUserTarget;

    #[Optional('conversation_id')]
    public ?string $conversationID;

    /** @var array<string,string|int|bool>|null $conversationMetadata */
    #[Optional('conversation_metadata', map: ConversationMetadata::class)]
    public ?array $conversationMetadata;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /** @var list<string>|null $errors */
    #[Optional(list: 'string')]
    public ?array $errors;

    #[Optional('retry_attempts')]
    public ?int $retryAttempts;

    #[Optional('retry_count')]
    public ?int $retryCount;

    #[Optional('scheduled_event_id')]
    public ?string $scheduledEventID;

    /** @var value-of<EventStatus>|null $status */
    #[Optional(enum: EventStatus::class)]
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
     * @param array<string,string|int|bool> $conversationMetadata
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
        $self = new self;

        $self['assistantID'] = $assistantID;
        $self['scheduledAtFixedDatetime'] = $scheduledAtFixedDatetime;
        $self['telnyxAgentTarget'] = $telnyxAgentTarget;
        $self['telnyxConversationChannel'] = $telnyxConversationChannel;
        $self['telnyxEndUserTarget'] = $telnyxEndUserTarget;

        null !== $conversationID && $self['conversationID'] = $conversationID;
        null !== $conversationMetadata && $self['conversationMetadata'] = $conversationMetadata;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $errors && $self['errors'] = $errors;
        null !== $retryAttempts && $self['retryAttempts'] = $retryAttempts;
        null !== $retryCount && $self['retryCount'] = $retryCount;
        null !== $scheduledEventID && $self['scheduledEventID'] = $scheduledEventID;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withAssistantID(string $assistantID): self
    {
        $self = clone $this;
        $self['assistantID'] = $assistantID;

        return $self;
    }

    public function withScheduledAtFixedDatetime(
        \DateTimeInterface $scheduledAtFixedDatetime
    ): self {
        $self = clone $this;
        $self['scheduledAtFixedDatetime'] = $scheduledAtFixedDatetime;

        return $self;
    }

    public function withTelnyxAgentTarget(string $telnyxAgentTarget): self
    {
        $self = clone $this;
        $self['telnyxAgentTarget'] = $telnyxAgentTarget;

        return $self;
    }

    /**
     * @param ConversationChannelType|value-of<ConversationChannelType> $telnyxConversationChannel
     */
    public function withTelnyxConversationChannel(
        ConversationChannelType|string $telnyxConversationChannel
    ): self {
        $self = clone $this;
        $self['telnyxConversationChannel'] = $telnyxConversationChannel;

        return $self;
    }

    public function withTelnyxEndUserTarget(string $telnyxEndUserTarget): self
    {
        $self = clone $this;
        $self['telnyxEndUserTarget'] = $telnyxEndUserTarget;

        return $self;
    }

    public function withConversationID(string $conversationID): self
    {
        $self = clone $this;
        $self['conversationID'] = $conversationID;

        return $self;
    }

    /**
     * @param array<string,string|int|bool> $conversationMetadata
     */
    public function withConversationMetadata(array $conversationMetadata): self
    {
        $self = clone $this;
        $self['conversationMetadata'] = $conversationMetadata;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param list<string> $errors
     */
    public function withErrors(array $errors): self
    {
        $self = clone $this;
        $self['errors'] = $errors;

        return $self;
    }

    public function withRetryAttempts(int $retryAttempts): self
    {
        $self = clone $this;
        $self['retryAttempts'] = $retryAttempts;

        return $self;
    }

    public function withRetryCount(int $retryCount): self
    {
        $self = clone $this;
        $self['retryCount'] = $retryCount;

        return $self;
    }

    public function withScheduledEventID(string $scheduledEventID): self
    {
        $self = clone $this;
        $self['scheduledEventID'] = $scheduledEventID;

        return $self;
    }

    /**
     * @param EventStatus|value-of<EventStatus> $status
     */
    public function withStatus(EventStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
