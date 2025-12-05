<?php

declare(strict_types=1);

namespace Telnyx\Messsages;

use Telnyx\Core\Attributes\Api;
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
 *   agent_id: string,
 *   agent_message: RcsAgentMessage|array{
 *     content_message?: ContentMessage|null,
 *     event?: Event|null,
 *     expire_time?: \DateTimeInterface|null,
 *     ttl?: string|null,
 *   },
 *   messaging_profile_id: string,
 *   to: string,
 *   mms_fallback?: MmsFallback|array{
 *     from?: string|null,
 *     media_urls?: list<string>|null,
 *     subject?: string|null,
 *     text?: string|null,
 *   },
 *   sms_fallback?: SMSFallback|array{from?: string|null, text?: string|null},
 *   type?: Type|value-of<Type>,
 *   webhook_url?: string,
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
    #[Api]
    public string $agent_id;

    #[Api]
    public RcsAgentMessage $agent_message;

    /**
     * A valid messaging profile ID.
     */
    #[Api]
    public string $messaging_profile_id;

    /**
     * Phone number in +E.164 format.
     */
    #[Api]
    public string $to;

    #[Api(optional: true)]
    public ?MmsFallback $mms_fallback;

    #[Api(optional: true)]
    public ?SMSFallback $sms_fallback;

    /**
     * Message type - must be set to "RCS".
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * The URL where webhooks related to this message will be sent.
     */
    #[Api(optional: true)]
    public ?string $webhook_url;

    /**
     * `new MesssageRcsParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MesssageRcsParams::with(
     *   agent_id: ..., agent_message: ..., messaging_profile_id: ..., to: ...
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
     *   content_message?: ContentMessage|null,
     *   event?: Event|null,
     *   expire_time?: \DateTimeInterface|null,
     *   ttl?: string|null,
     * } $agent_message
     * @param MmsFallback|array{
     *   from?: string|null,
     *   media_urls?: list<string>|null,
     *   subject?: string|null,
     *   text?: string|null,
     * } $mms_fallback
     * @param SMSFallback|array{from?: string|null, text?: string|null} $sms_fallback
     * @param Type|value-of<Type> $type
     */
    public static function with(
        string $agent_id,
        RcsAgentMessage|array $agent_message,
        string $messaging_profile_id,
        string $to,
        MmsFallback|array|null $mms_fallback = null,
        SMSFallback|array|null $sms_fallback = null,
        Type|string|null $type = null,
        ?string $webhook_url = null,
    ): self {
        $obj = new self;

        $obj['agent_id'] = $agent_id;
        $obj['agent_message'] = $agent_message;
        $obj['messaging_profile_id'] = $messaging_profile_id;
        $obj['to'] = $to;

        null !== $mms_fallback && $obj['mms_fallback'] = $mms_fallback;
        null !== $sms_fallback && $obj['sms_fallback'] = $sms_fallback;
        null !== $type && $obj['type'] = $type;
        null !== $webhook_url && $obj['webhook_url'] = $webhook_url;

        return $obj;
    }

    /**
     * RCS Agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $obj = clone $this;
        $obj['agent_id'] = $agentID;

        return $obj;
    }

    /**
     * @param RcsAgentMessage|array{
     *   content_message?: ContentMessage|null,
     *   event?: Event|null,
     *   expire_time?: \DateTimeInterface|null,
     *   ttl?: string|null,
     * } $agentMessage
     */
    public function withAgentMessage(RcsAgentMessage|array $agentMessage): self
    {
        $obj = clone $this;
        $obj['agent_message'] = $agentMessage;

        return $obj;
    }

    /**
     * A valid messaging profile ID.
     */
    public function withMessagingProfileID(string $messagingProfileID): self
    {
        $obj = clone $this;
        $obj['messaging_profile_id'] = $messagingProfileID;

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
     *   media_urls?: list<string>|null,
     *   subject?: string|null,
     *   text?: string|null,
     * } $mmsFallback
     */
    public function withMmsFallback(MmsFallback|array $mmsFallback): self
    {
        $obj = clone $this;
        $obj['mms_fallback'] = $mmsFallback;

        return $obj;
    }

    /**
     * @param SMSFallback|array{from?: string|null, text?: string|null} $smsFallback
     */
    public function withSMSFallback(SMSFallback|array $smsFallback): self
    {
        $obj = clone $this;
        $obj['sms_fallback'] = $smsFallback;

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
        $obj['webhook_url'] = $webhookURL;

        return $obj;
    }
}
