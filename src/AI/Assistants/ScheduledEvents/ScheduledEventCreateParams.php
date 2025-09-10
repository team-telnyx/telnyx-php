<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledEventCreateParams\ConversationMetadata;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new ScheduledEventCreateParams); // set properties as needed
 * $client->ai.assistants.scheduledEvents->create(...$params->toArray());
 * ```
 * Create a scheduled event for an assistant.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->ai.assistants.scheduledEvents->create(...$params->toArray());`
 *
 * @see Telnyx\AI\Assistants\ScheduledEvents->create
 *
 * @phpstan-type scheduled_event_create_params = array{
 *   scheduledAtFixedDatetime: \DateTimeInterface,
 *   telnyxAgentTarget: string,
 *   telnyxConversationChannel: ConversationChannelType|value-of<ConversationChannelType>,
 *   telnyxEndUserTarget: string,
 *   conversationMetadata?: array<string, string|int|bool>,
 *   text?: string,
 * }
 */
final class ScheduledEventCreateParams implements BaseModel
{
    /** @use SdkModel<scheduled_event_create_params> */
    use SdkModel;
    use SdkParams;

    /**
     * The datetime at which the event should be scheduled. Formatted as ISO 8601.
     */
    #[Api('scheduled_at_fixed_datetime')]
    public \DateTimeInterface $scheduledAtFixedDatetime;

    /**
     * The phone number, SIP URI, to schedule the call or text from.
     */
    #[Api('telnyx_agent_target')]
    public string $telnyxAgentTarget;

    /** @var value-of<ConversationChannelType> $telnyxConversationChannel */
    #[Api('telnyx_conversation_channel', enum: ConversationChannelType::class)]
    public string $telnyxConversationChannel;

    /**
     * The phone number, SIP URI, to schedule the call or text to.
     */
    #[Api('telnyx_end_user_target')]
    public string $telnyxEndUserTarget;

    /**
     * Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
     *
     * @var array<string, string|int|bool>|null $conversationMetadata
     */
    #[Api(
        'conversation_metadata',
        map: ConversationMetadata::class,
        optional: true
    )]
    public ?array $conversationMetadata;

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
     * @param array<string, string|int|bool> $conversationMetadata
     */
    public static function with(
        \DateTimeInterface $scheduledAtFixedDatetime,
        string $telnyxAgentTarget,
        ConversationChannelType|string $telnyxConversationChannel,
        string $telnyxEndUserTarget,
        ?array $conversationMetadata = null,
        ?string $text = null,
    ): self {
        $obj = new self;

        $obj->scheduledAtFixedDatetime = $scheduledAtFixedDatetime;
        $obj->telnyxAgentTarget = $telnyxAgentTarget;
        $obj->telnyxConversationChannel = $telnyxConversationChannel instanceof ConversationChannelType ? $telnyxConversationChannel->value : $telnyxConversationChannel;
        $obj->telnyxEndUserTarget = $telnyxEndUserTarget;

        null !== $conversationMetadata && $obj->conversationMetadata = $conversationMetadata;
        null !== $text && $obj->text = $text;

        return $obj;
    }

    /**
     * The datetime at which the event should be scheduled. Formatted as ISO 8601.
     */
    public function withScheduledAtFixedDatetime(
        \DateTimeInterface $scheduledAtFixedDatetime
    ): self {
        $obj = clone $this;
        $obj->scheduledAtFixedDatetime = $scheduledAtFixedDatetime;

        return $obj;
    }

    /**
     * The phone number, SIP URI, to schedule the call or text from.
     */
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

    /**
     * The phone number, SIP URI, to schedule the call or text to.
     */
    public function withTelnyxEndUserTarget(string $telnyxEndUserTarget): self
    {
        $obj = clone $this;
        $obj->telnyxEndUserTarget = $telnyxEndUserTarget;

        return $obj;
    }

    /**
     * Metadata associated with the conversation. Telnyx provides several pieces of metadata, but customers can also add their own.
     *
     * @param array<string, string|int|bool> $conversationMetadata
     */
    public function withConversationMetadata(array $conversationMetadata): self
    {
        $obj = clone $this;
        $obj->conversationMetadata = $conversationMetadata;

        return $obj;
    }

    /**
     * Required for sms scheduled events. The text to be sent to the end user.
     */
    public function withText(string $text): self
    {
        $obj = clone $this;
        $obj->text = $text;

        return $obj;
    }
}
