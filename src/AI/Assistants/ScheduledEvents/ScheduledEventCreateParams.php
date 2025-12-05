<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventCreateParams\ConversationMetadata;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Create a scheduled event for an assistant.
 *
 * @see Telnyx\Services\AI\Assistants\ScheduledEventsService::create()
 *
 * @phpstan-type ScheduledEventCreateParamsShape = array{
 *   scheduled_at_fixed_datetime: \DateTimeInterface,
 *   telnyx_agent_target: string,
 *   telnyx_conversation_channel: ConversationChannelType|value-of<ConversationChannelType>,
 *   telnyx_end_user_target: string,
 *   conversation_metadata?: array<string,string|int|bool>,
 *   text?: string,
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
    #[Api]
    public \DateTimeInterface $scheduled_at_fixed_datetime;

    /**
     * The phone number, SIP URI, to schedule the call or text from.
     */
    #[Api]
    public string $telnyx_agent_target;

    /** @var value-of<ConversationChannelType> $telnyx_conversation_channel */
    #[Api(enum: ConversationChannelType::class)]
    public string $telnyx_conversation_channel;

    /**
     * The phone number, SIP URI, to schedule the call or text to.
     */
    #[Api]
    public string $telnyx_end_user_target;

    /**
     * Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
     *
     * @var array<string,string|int|bool>|null $conversation_metadata
     */
    #[Api(map: ConversationMetadata::class, optional: true)]
    public ?array $conversation_metadata;

    /**
     * Required for sms scheduled events. The text to be sent to the end user.
     */
    #[Api(optional: true)]
    public ?string $text;

    /**
     * `new ScheduledEventCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ScheduledEventCreateParams::with(
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
     * @param ConversationChannelType|value-of<ConversationChannelType> $telnyx_conversation_channel
     * @param array<string,string|int|bool> $conversation_metadata
     */
    public static function with(
        \DateTimeInterface $scheduled_at_fixed_datetime,
        string $telnyx_agent_target,
        ConversationChannelType|string $telnyx_conversation_channel,
        string $telnyx_end_user_target,
        ?array $conversation_metadata = null,
        ?string $text = null,
    ): self {
        $obj = new self;

        $obj['scheduled_at_fixed_datetime'] = $scheduled_at_fixed_datetime;
        $obj['telnyx_agent_target'] = $telnyx_agent_target;
        $obj['telnyx_conversation_channel'] = $telnyx_conversation_channel;
        $obj['telnyx_end_user_target'] = $telnyx_end_user_target;

        null !== $conversation_metadata && $obj['conversation_metadata'] = $conversation_metadata;
        null !== $text && $obj['text'] = $text;

        return $obj;
    }

    /**
     * The datetime at which the event should be scheduled. Formatted as ISO 8601.
     */
    public function withScheduledAtFixedDatetime(
        \DateTimeInterface $scheduledAtFixedDatetime
    ): self {
        $obj = clone $this;
        $obj['scheduled_at_fixed_datetime'] = $scheduledAtFixedDatetime;

        return $obj;
    }

    /**
     * The phone number, SIP URI, to schedule the call or text from.
     */
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

    /**
     * The phone number, SIP URI, to schedule the call or text to.
     */
    public function withTelnyxEndUserTarget(string $telnyxEndUserTarget): self
    {
        $obj = clone $this;
        $obj['telnyx_end_user_target'] = $telnyxEndUserTarget;

        return $obj;
    }

    /**
     * Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
     *
     * @param array<string,string|int|bool> $conversationMetadata
     */
    public function withConversationMetadata(array $conversationMetadata): self
    {
        $obj = clone $this;
        $obj['conversation_metadata'] = $conversationMetadata;

        return $obj;
    }

    /**
     * Required for sms scheduled events. The text to be sent to the end user.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj['text'] = $text;

        return $obj;
    }
}
