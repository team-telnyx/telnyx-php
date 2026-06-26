<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\ScheduledEvents;

use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse\CallAttempt;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse\CallSettings;
use Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse\ConversationMetadata;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ConversationMetadataVariants from \Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse\ConversationMetadata
 * @phpstan-import-type CallAttemptShape from \Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse\CallAttempt
 * @phpstan-import-type CallSettingsShape from \Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse\CallSettings
 * @phpstan-import-type ConversationMetadataShape from \Telnyx\AI\Assistants\ScheduledEvents\ScheduledPhoneCallEventResponse\ConversationMetadata
 *
 * @phpstan-type ScheduledPhoneCallEventResponseShape = array{
 *   assistantID: string,
 *   scheduledAtFixedDatetime: \DateTimeInterface,
 *   telnyxAgentTarget: string,
 *   telnyxConversationChannel: ConversationChannelType|value-of<ConversationChannelType>,
 *   telnyxEndUserTarget: string,
 *   callAttempts?: list<CallAttempt|CallAttemptShape>|null,
 *   callDuration?: int|null,
 *   callSettings?: null|CallSettings|CallSettingsShape,
 *   callStatus?: string|null,
 *   conversationID?: string|null,
 *   conversationMetadata?: array<string,ConversationMetadataShape>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   dispatchedAt?: \DateTimeInterface|null,
 *   dynamicVariables?: array<string,string>|null,
 *   errors?: list<string>|null,
 *   maxRetriesClientErrors?: int|null,
 *   retryAttempts?: int|null,
 *   retryCount?: int|null,
 *   retryIntervalSecs?: int|null,
 *   scheduledEventID?: string|null,
 *   status?: null|EventStatus|value-of<EventStatus>,
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

    /** @var list<CallAttempt>|null $callAttempts */
    #[Optional('call_attempts', list: CallAttempt::class)]
    public ?array $callAttempts;

    /**
     * Duration of the call in seconds.
     */
    #[Optional('call_duration')]
    public ?int $callDuration;

    /**
     * Per-call telephony overrides applied when a scheduled phone-call event
     * dispatches. Phone-call events only. New per-call dispatch options should be
     * added here rather than as top-level event fields.
     */
    #[Optional('call_settings')]
    public ?CallSettings $callSettings;

    /**
     * Values: busy, canceled, no-answer, ringing, completed, failed, in-progress.
     */
    #[Optional('call_status')]
    public ?string $callStatus;

    #[Optional('conversation_id')]
    public ?string $conversationID;

    /** @var array<string,ConversationMetadataVariants>|null $conversationMetadata */
    #[Optional('conversation_metadata', map: ConversationMetadata::class)]
    public ?array $conversationMetadata;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * Date time at which call was sent.
     */
    #[Optional('dispatched_at')]
    public ?\DateTimeInterface $dispatchedAt;

    /**
     * A map of dynamic variable names to values. These variables can be referenced in the assistant's instructions and messages using {{variable_name}} syntax.
     *
     * @var array<string,string>|null $dynamicVariables
     */
    #[Optional('dynamic_variables', map: 'string')]
    public ?array $dynamicVariables;

    /** @var list<string>|null $errors */
    #[Optional(list: 'string')]
    public ?array $errors;

    /**
     * Configure number of retries on client errors: busy, no-answer, failed, canceled (caller hung up before the callee answered).
     */
    #[Optional('max_retries_client_errors')]
    public ?int $maxRetriesClientErrors;

    #[Optional('retry_attempts')]
    public ?int $retryAttempts;

    #[Optional('retry_count')]
    public ?int $retryCount;

    #[Optional('retry_interval_secs')]
    public ?int $retryIntervalSecs;

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
     * @param list<CallAttempt|CallAttemptShape>|null $callAttempts
     * @param CallSettings|CallSettingsShape|null $callSettings
     * @param array<string,ConversationMetadataShape>|null $conversationMetadata
     * @param array<string,string>|null $dynamicVariables
     * @param list<string>|null $errors
     * @param EventStatus|value-of<EventStatus>|null $status
     */
    public static function with(
        string $assistantID,
        \DateTimeInterface $scheduledAtFixedDatetime,
        string $telnyxAgentTarget,
        ConversationChannelType|string $telnyxConversationChannel,
        string $telnyxEndUserTarget,
        ?array $callAttempts = null,
        ?int $callDuration = null,
        CallSettings|array|null $callSettings = null,
        ?string $callStatus = null,
        ?string $conversationID = null,
        ?array $conversationMetadata = null,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $dispatchedAt = null,
        ?array $dynamicVariables = null,
        ?array $errors = null,
        ?int $maxRetriesClientErrors = null,
        ?int $retryAttempts = null,
        ?int $retryCount = null,
        ?int $retryIntervalSecs = null,
        ?string $scheduledEventID = null,
        EventStatus|string|null $status = null,
    ): self {
        $self = new self;

        $self['assistantID'] = $assistantID;
        $self['scheduledAtFixedDatetime'] = $scheduledAtFixedDatetime;
        $self['telnyxAgentTarget'] = $telnyxAgentTarget;
        $self['telnyxConversationChannel'] = $telnyxConversationChannel;
        $self['telnyxEndUserTarget'] = $telnyxEndUserTarget;

        null !== $callAttempts && $self['callAttempts'] = $callAttempts;
        null !== $callDuration && $self['callDuration'] = $callDuration;
        null !== $callSettings && $self['callSettings'] = $callSettings;
        null !== $callStatus && $self['callStatus'] = $callStatus;
        null !== $conversationID && $self['conversationID'] = $conversationID;
        null !== $conversationMetadata && $self['conversationMetadata'] = $conversationMetadata;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $dispatchedAt && $self['dispatchedAt'] = $dispatchedAt;
        null !== $dynamicVariables && $self['dynamicVariables'] = $dynamicVariables;
        null !== $errors && $self['errors'] = $errors;
        null !== $maxRetriesClientErrors && $self['maxRetriesClientErrors'] = $maxRetriesClientErrors;
        null !== $retryAttempts && $self['retryAttempts'] = $retryAttempts;
        null !== $retryCount && $self['retryCount'] = $retryCount;
        null !== $retryIntervalSecs && $self['retryIntervalSecs'] = $retryIntervalSecs;
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

    /**
     * @param list<CallAttempt|CallAttemptShape> $callAttempts
     */
    public function withCallAttempts(array $callAttempts): self
    {
        $self = clone $this;
        $self['callAttempts'] = $callAttempts;

        return $self;
    }

    /**
     * Duration of the call in seconds.
     */
    public function withCallDuration(int $callDuration): self
    {
        $self = clone $this;
        $self['callDuration'] = $callDuration;

        return $self;
    }

    /**
     * Per-call telephony overrides applied when a scheduled phone-call event
     * dispatches. Phone-call events only. New per-call dispatch options should be
     * added here rather than as top-level event fields.
     *
     * @param CallSettings|CallSettingsShape $callSettings
     */
    public function withCallSettings(CallSettings|array $callSettings): self
    {
        $self = clone $this;
        $self['callSettings'] = $callSettings;

        return $self;
    }

    /**
     * Values: busy, canceled, no-answer, ringing, completed, failed, in-progress.
     */
    public function withCallStatus(string $callStatus): self
    {
        $self = clone $this;
        $self['callStatus'] = $callStatus;

        return $self;
    }

    public function withConversationID(string $conversationID): self
    {
        $self = clone $this;
        $self['conversationID'] = $conversationID;

        return $self;
    }

    /**
     * @param array<string,ConversationMetadataShape> $conversationMetadata
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
     * Date time at which call was sent.
     */
    public function withDispatchedAt(\DateTimeInterface $dispatchedAt): self
    {
        $self = clone $this;
        $self['dispatchedAt'] = $dispatchedAt;

        return $self;
    }

    /**
     * A map of dynamic variable names to values. These variables can be referenced in the assistant's instructions and messages using {{variable_name}} syntax.
     *
     * @param array<string,string> $dynamicVariables
     */
    public function withDynamicVariables(array $dynamicVariables): self
    {
        $self = clone $this;
        $self['dynamicVariables'] = $dynamicVariables;

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

    /**
     * Configure number of retries on client errors: busy, no-answer, failed, canceled (caller hung up before the callee answered).
     */
    public function withMaxRetriesClientErrors(
        int $maxRetriesClientErrors
    ): self {
        $self = clone $this;
        $self['maxRetriesClientErrors'] = $maxRetriesClientErrors;

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

    public function withRetryIntervalSecs(int $retryIntervalSecs): self
    {
        $self = clone $this;
        $self['retryIntervalSecs'] = $retryIntervalSecs;

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
