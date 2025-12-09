<?php

declare(strict_types=1);

namespace Telnyx\Messsages;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\MesssageRcsParams\MmsFallback;
use Telnyx\Messsages\MesssageRcsParams\SMSFallback;
use Telnyx\Messsages\MesssageRcsParams\Type;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage;
use Telnyx\Messsages\RcsAgentMessage\Event;

/**
 * Send an RCS message.
 *
 * @see Telnyx\Services\MesssagesService::rcs()
 *
 * @phpstan-type MesssageRcsParamsShape = array{
 *   agentID: string,
 *   agentMessage: RcsAgentMessage|array{
 *     contentMessage?: ContentMessage|null,
 *     event?: Event|null,
 *     expireTime?: \DateTimeInterface|null,
 *     ttl?: string|null,
 *   },
 *   messagingProfileID: string,
 *   to: string,
 *   mmsFallback?: MmsFallback|array{
 *     from?: string|null,
 *     mediaURLs?: list<string>|null,
 *     subject?: string|null,
 *     text?: string|null,
 *   },
 *   smsFallback?: SMSFallback|array{from?: string|null, text?: string|null},
 *   type?: Type|value-of<Type>,
 *   webhookURL?: string,
 * }
 */
final class MesssageRcsParams implements BaseModel
{
    /** @use SdkModel<MesssageRcsParamsShape> */
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
     * `new MesssageRcsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MesssageRcsParams::with(
     *   agentID: ..., agentMessage: ..., messagingProfileID: ..., to: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MesssageRcsParams)
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
     * @param RcsAgentMessage|array{
     *   contentMessage?: ContentMessage|null,
     *   event?: Event|null,
     *   expireTime?: \DateTimeInterface|null,
     *   ttl?: string|null,
     * } $agentMessage
     * @param MmsFallback|array{
     *   from?: string|null,
     *   mediaURLs?: list<string>|null,
     *   subject?: string|null,
     *   text?: string|null,
     * } $mmsFallback
     * @param SMSFallback|array{from?: string|null, text?: string|null} $smsFallback
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
        $obj = new self;

        $obj['agentID'] = $agentID;
        $obj['agentMessage'] = $agentMessage;
        $obj['messagingProfileID'] = $messagingProfileID;
        $obj['to'] = $to;

        null !== $mmsFallback && $obj['mmsFallback'] = $mmsFallback;
        null !== $smsFallback && $obj['smsFallback'] = $smsFallback;
        null !== $type && $obj['type'] = $type;
        null !== $webhookURL && $obj['webhookURL'] = $webhookURL;

        return $obj;
    }

    /**
     * RCS Agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $obj = clone $this;
        $obj['agentID'] = $agentID;

        return $obj;
    }

    /**
     * @param RcsAgentMessage|array{
     *   contentMessage?: ContentMessage|null,
     *   event?: Event|null,
     *   expireTime?: \DateTimeInterface|null,
     *   ttl?: string|null,
     * } $agentMessage
     */
    public function withAgentMessage(RcsAgentMessage|array $agentMessage): self
    {
        $obj = clone $this;
        $obj['agentMessage'] = $agentMessage;

        return $obj;
    }

    /**
     * A valid messaging profile ID.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messagingProfileID'] = $messagingProfileID;

        return $obj;
    }

    /**
     * Phone number in +E.164 format.
     */
    public function withTo(string $to): self
    {
        $obj = clone $this;
        $obj['to'] = $to;

        return $obj;
    }

    /**
     * @param MmsFallback|array{
     *   from?: string|null,
     *   mediaURLs?: list<string>|null,
     *   subject?: string|null,
     *   text?: string|null,
     * } $mmsFallback
     */
    public function withMmsFallback(MmsFallback|array $mmsFallback): self
    {
        $obj = clone $this;
        $obj['mmsFallback'] = $mmsFallback;

        return $obj;
    }

    /**
     * @param SMSFallback|array{from?: string|null, text?: string|null} $smsFallback
     */
    public function withSMSFallback(SMSFallback|array $smsFallback): self
    {
        $obj = clone $this;
        $obj['smsFallback'] = $smsFallback;

        return $obj;
    }

    /**
     * Message type - must be set to "RCS".
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * The URL where webhooks related to this message will be sent.
     */
    public function withWebhookURL(string $webhookURL): self
    {
        $obj = clone $this;
        $obj['webhookURL'] = $webhookURL;

        return $obj;
    }
}
