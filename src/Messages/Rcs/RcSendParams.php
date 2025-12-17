<?php

declare(strict_types=1);

namespace Telnyx\Messages\Rcs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\Rcs\RcSendParams\MmsFallback;
use Telnyx\Messages\Rcs\RcSendParams\SMSFallback;
use Telnyx\Messages\Rcs\RcSendParams\Type;
use Telnyx\Messages\RcsAgentMessage;

/**
 * Send an RCS message.
 *
 * @see Telnyx\Services\Messages\RcsService::send()
 *
 * @phpstan-import-type RcsAgentMessageShape from \Telnyx\Messages\RcsAgentMessage
 * @phpstan-import-type MmsFallbackShape from \Telnyx\Messages\Rcs\RcSendParams\MmsFallback
 * @phpstan-import-type SMSFallbackShape from \Telnyx\Messages\Rcs\RcSendParams\SMSFallback
 *
 * @phpstan-type RcSendParamsShape = array{
 *   agentID: string,
 *   agentMessage: RcsAgentMessageShape,
 *   messagingProfileID: string,
 *   to: string,
 *   mmsFallback?: MmsFallbackShape|null,
 *   smsFallback?: SMSFallbackShape|null,
 *   type?: null|Type|value-of<Type>,
 *   webhookURL?: string|null,
 * }
 */
final class RcSendParams implements BaseModel
{
    /** @use SdkModel<RcSendParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * RCS Agent ID.
     */
    #[Required('agent_id')]
    public string $agentID;

    #[Required('agent_message')]
    public RcsAgentMessage $agentMessage;

    /**
     * A valid messaging profile ID.
     */
    #[Required('messaging_profile_id')]
    public string $messagingProfileID;

    /**
     * Phone number in +E.164 format.
     */
    #[Required]
    public string $to;

    #[Optional('mms_fallback')]
    public ?MmsFallback $mmsFallback;

    #[Optional('sms_fallback')]
    public ?SMSFallback $smsFallback;

    /**
     * Message type - must be set to "RCS".
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    /**
     * The URL where webhooks related to this message will be sent.
     */
    #[Optional('webhook_url')]
    public ?string $webhookURL;

    /**
     * `new RcSendParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RcSendParams::with(
     *   agentID: ..., agentMessage: ..., messagingProfileID: ..., to: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RcSendParams)
     *   ->withAgentID(...)
     *   ->withAgentMessage(...)
     *   ->withMessagingProfileID(...)
     *   ->withTo(...)
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
     * @param RcsAgentMessageShape $agentMessage
     * @param MmsFallbackShape $mmsFallback
     * @param SMSFallbackShape $smsFallback
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $agentID,
        RcsAgentMessage|array $agentMessage,
        string $messagingProfileID,
        string $to,
        MmsFallback|array|null $mmsFallback = null,
        SMSFallback|array|null $smsFallback = null,
        Type|string|null $type = null,
        ?string $webhookURL = null,
    ): self {
        $self = new self;

        $self['agentID'] = $agentID;
        $self['agentMessage'] = $agentMessage;
        $self['messagingProfileID'] = $messagingProfileID;
        $self['to'] = $to;

        null !== $mmsFallback && $self['mmsFallback'] = $mmsFallback;
        null !== $smsFallback && $self['smsFallback'] = $smsFallback;
        null !== $type && $self['type'] = $type;
        null !== $webhookURL && $self['webhookURL'] = $webhookURL;

        return $self;
    }

    /**
     * RCS Agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    /**
     * @param RcsAgentMessageShape $agentMessage
     */
    public function withAgentMessage(RcsAgentMessage|array $agentMessage): self
    {
        $self = clone $this;
        $self['agentMessage'] = $agentMessage;

        return $self;
    }

    /**
     * A valid messaging profile ID.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $self = clone $this;
        $self['messagingProfileID'] = $messagingProfileID;

        return $self;
    }

    /**
     * Phone number in +E.164 format.
     */
    public function withTo(string $to): self
    {
        $self = clone $this;
        $self['to'] = $to;

        return $self;
    }

    /**
     * @param MmsFallbackShape $mmsFallback
     */
    public function withMmsFallback(MmsFallback|array $mmsFallback): self
    {
        $self = clone $this;
        $self['mmsFallback'] = $mmsFallback;

        return $self;
    }

    /**
     * @param SMSFallbackShape $smsFallback
     */
    public function withSMSFallback(SMSFallback|array $smsFallback): self
    {
        $self = clone $this;
        $self['smsFallback'] = $smsFallback;

        return $self;
    }

    /**
     * Message type - must be set to "RCS".
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * The URL where webhooks related to this message will be sent.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $self = clone $this;
        $self['webhookURL'] = $webhookURL;

        return $self;
    }
}
