<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventCreateParams\ConversationMetadata;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a scheduled event for an assistant.
 *
 * @see Telnyx\Services\AI\Assistants\ScheduledEventsService::create()
 *
 * @phpstan-import-type ConversationMetadataShape from \Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventCreateParams\ConversationMetadata
 *
 * @phpstan-type ScheduledEventCreateParamsShape = array{
 *   scheduledAtFixedDatetime: \DateTimeInterface,
 *   telnyxAgentTarget: string,
 *   telnyxConversationChannel: ConversationChannelType|value-of<ConversationChannelType>,
 *   telnyxEndUserTarget: string,
 *   conversationMetadata?: array<string,ConversationMetadataShape>|null,
 *   text?: string|null,
 * }
 */
final class ScheduledEventCreateParams implements BaseModel
{
    /** @use SdkModel<ScheduledEventCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The datetime at which the event should be scheduled. Formatted as ISO 8601.
     */
    #[Required('scheduled_at_fixed_datetime')]
    public \DateTimeInterface $scheduledAtFixedDatetime;

    /**
     * The phone number, SIP URI, to schedule the call or text from.
     */
    #[Required('telnyx_agent_target')]
    public string $telnyxAgentTarget;

    /** @var value-of<ConversationChannelType> $telnyxConversationChannel */
    #[Required(
        'telnyx_conversation_channel',
        enum: ConversationChannelType::class
    )]
    public string $telnyxConversationChannel;

    /**
     * The phone number, SIP URI, to schedule the call or text to.
     */
    #[Required('telnyx_end_user_target')]
    public string $telnyxEndUserTarget;

    /**
     * Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
     *
     * @var array<string,string|int|bool>|null $conversationMetadata
     */
    #[Optional('conversation_metadata', map: ConversationMetadata::class)]
    public ?array $conversationMetadata;

    /**
     * Required for sms scheduled events. The text to be sent to the end user.
     */
    #[Optional]
    public ?string $text;

    /**
     * `new ScheduledEventCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScheduledEventCreateParams::with(
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
     * (new ScheduledEventCreateParams)
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
     * @param array<string,ConversationMetadataShape> $conversationMetadata
     */
    public static function with(
        \DateTimeInterface $scheduledAtFixedDatetime,
        string $telnyxAgentTarget,
        ConversationChannelType|string $telnyxConversationChannel,
        string $telnyxEndUserTarget,
        ?array $conversationMetadata = null,
        ?string $text = null,
    ): self {
        $self = new self;

        $self['scheduledAtFixedDatetime'] = $scheduledAtFixedDatetime;
        $self['telnyxAgentTarget'] = $telnyxAgentTarget;
        $self['telnyxConversationChannel'] = $telnyxConversationChannel;
        $self['telnyxEndUserTarget'] = $telnyxEndUserTarget;

        null !== $conversationMetadata && $self['conversationMetadata'] = $conversationMetadata;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    /**
     * The datetime at which the event should be scheduled. Formatted as ISO 8601.
     */
    public function withScheduledAtFixedDatetime(
        \DateTimeInterface $scheduledAtFixedDatetime
    ): self {
        $self = clone $this;
        $self['scheduledAtFixedDatetime'] = $scheduledAtFixedDatetime;

        return $self;
    }

    /**
     * The phone number, SIP URI, to schedule the call or text from.
     */
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

    /**
     * The phone number, SIP URI, to schedule the call or text to.
     */
    public function withTelnyxEndUserTarget(string $telnyxEndUserTarget): self
    {
        $self = clone $this;
        $self['telnyxEndUserTarget'] = $telnyxEndUserTarget;

        return $self;
    }

    /**
     * Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
     *
     * @param array<string,ConversationMetadataShape> $conversationMetadata
     */
    public function withConversationMetadata(array $conversationMetadata): self
    {
        $self = clone $this;
        $self['conversationMetadata'] = $conversationMetadata;

        return $self;
    }

    /**
     * Required for sms scheduled events. The text to be sent to the end user.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
