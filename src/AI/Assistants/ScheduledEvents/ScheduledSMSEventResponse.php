<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledSMSEventResponse\ConversationMetadata;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type scheduled_sms_event_response = array{
 *   assistantID: string,
 *   scheduledAtFixedDatetime: \DateTimeInterface,
 *   telnyxAgentTarget: string,
 *   telnyxConversationChannel: value-of<ConversationChannelType>,
 *   telnyxEndUserTarget: string,
 *   text: string,
 *   conversationID?: string,
 *   conversationMetadata?: array<string, string|int|bool>,
 *   createdAt?: \DateTimeInterface,
 *   errors?: list<string>,
 *   retryCount?: int,
 *   scheduledEventID?: string,
 *   status?: value-of<EventStatus>,
 * }
 */
final class ScheduledSMSEventResponse implements BaseModel
{
    /** @use SdkModel<scheduled_sms_event_response> */
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

    #[Api]
    public string $text;

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

    #[Api('retry_count', optional: true)]
    public ?int $retryCount;

    #[Api('scheduled_event_id', optional: true)]
    public ?string $scheduledEventID;

    /** @var value-of<EventStatus>|null $status */
    #[Api(enum: EventStatus::class, optional: true)]
    public ?string $status;

    /**
     * `new ScheduledSMSEventResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScheduledSMSEventResponse::with(
     *   assistantID: ...,
     *   scheduledAtFixedDatetime: ...,
     *   telnyxAgentTarget: ...,
     *   telnyxConversationChannel: ...,
     *   telnyxEndUserTarget: ...,
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
        string $text,
        ?string $conversationID = null,
        ?array $conversationMetadata = null,
        ?\DateTimeInterface $createdAt = null,
        ?array $errors = null,
        ?int $retryCount = null,
        ?string $scheduledEventID = null,
        EventStatus|string|null $status = null,
    ): self {
        $obj = new self;

        $obj->assistantID = $assistantID;
        $obj->scheduledAtFixedDatetime = $scheduledAtFixedDatetime;
        $obj->telnyxAgentTarget = $telnyxAgentTarget;
        $obj['telnyxConversationChannel'] = $telnyxConversationChannel;
        $obj->telnyxEndUserTarget = $telnyxEndUserTarget;
        $obj->text = $text;

        null !== $conversationID && $obj->conversationID = $conversationID;
        null !== $conversationMetadata && $obj->conversationMetadata = $conversationMetadata;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $errors && $obj->errors = $errors;
        null !== $retryCount && $obj->retryCount = $retryCount;
        null !== $scheduledEventID && $obj->scheduledEventID = $scheduledEventID;
        null !== $status && $obj['status'] = $status;

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
        $obj['telnyxConversationChannel'] = $telnyxConversationChannel;

        return $obj;
    }

    public function withTelnyxEndUserTarget(string $telnyxEndUserTarget): self
    {
        $obj = clone $this;
        $obj->telnyxEndUserTarget = $telnyxEndUserTarget;

        return $obj;
    }

    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

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
        $obj['status'] = $status;

        return $obj;
    }
}
