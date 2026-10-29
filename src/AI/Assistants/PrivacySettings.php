<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\PrivacySettings\PiiRedaction;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type PrivacySettingsShape = array{
 *   dataRetention?: bool|null,
 *   inTransitDataLocality?: bool|null,
 *   piiRedaction?: null|PiiRedaction|value-of<PiiRedaction>,
 * }
 */
final class PrivacySettings implements BaseModel
{
    /** @use SdkModel<PrivacySettingsShape> */
    use SdkModel;

    /**
     * If true, conversation history and insights will be stored. If false, they will not be stored. This in‑tool toggle governs solely the retention of conversation history and insights via the AI assistant. It has no effect on any separate recording, transcription, or storage configuration that you have set at the account, number, or application level. All such external settings remain in force regardless of your selection here.
     */
    #[Optional('data_retention')]
    public ?bool $dataRetention;

    /**
     * Requires this assistant's conversations to be processed inside your organization's data-locality region, rather than only stored there, on every channel: for web chat, every model call of a turn; for voice, the call's model calls and the Telnyx-hosted speech services it uses; for SMS and WhatsApp, the model calls of each turn (how messages travel through carriers is not covered). Covered processing that cannot be handled in region fails rather than being served elsewhere. Enabling it requires a data-locality region with in-region inference (USA, EU, AUS, UAE; see [Inference regions](https://developers.telnyx.com/docs/inference/models/regions)), Telnyx-hosted models for the assistant, its fallback, and any conversation-flow node that overrides the model, and, when `insight_settings.model` is set, an insight model available in that region; the request is rejected otherwise. A voice call fails when it starts if its STT model or TTS voice is not self-hosted by Telnyx, if the assistant uses a speech-to-speech model, or if the call's media is anchored outside the region. Once enabled, send web chat requests and WebSocket or WebRTC conversations to your region's API hostname: one entering the platform in another region is refused rather than forwarded, because forwarding it would already have moved the content across the border. See [Data residency](https://developers.telnyx.com/docs/inference/data-residency#in-region-processing-for-ai-assistants). Defaults to false.
     */
    #[Optional('in_transit_data_locality')]
    public ?bool $inTransitDataLocality;

    /**
     * Controls redaction of personally identifiable information (PII) from the conversation history that is stored for this assistant. `disabled` (default) stores content as-is. `redact` replaces detected PII with `<PII:type/>` placeholders (e.g. `<PII:name/>`, `<PII:phone/>`) as the stored copies are written: message content (user, assistant, and tool-result messages) and tool-call arguments are redacted when written to conversation history, so the stored transcript, its read-back via the history API, and any insights generated from the stored messages contain the placeholders instead of the PII; response bodies returned by webhook tools are redacted too, as stored in the webhook logs — a per-conversation record separate from the transcript. In the Mission Control Portal this field appears as a "PII Redaction" on/off toggle, where Enabled corresponds to `redact`. Redaction runs when the stored copy is written, after the LLM has generated its reply: the live conversation is not redacted, the assistant's tools keep receiving the full (unredacted) values during the call, and the LLM still sees full content in its context window. Call recordings (including any recording layout configured under telephony settings) and the payloads of messages/webhooks delivered during the call are never redacted by this setting. The set of detected PII types (names, street addresses, phone numbers, email addresses, government identifiers like SSN and driver's license numbers, credit card and bank account numbers, IP addresses, dates of birth, and other identifiers unique to a person) is fixed by Telnyx and cannot be configured or extended per assistant. Assistants with `redact` cannot be used for SMS/WhatsApp messaging (that combination is rejected with a 400 error); voice and web chat are unaffected.
     *
     * @var value-of<PiiRedaction>|null $piiRedaction
     */
    #[Optional('pii_redaction', enum: PiiRedaction::class)]
    public ?string $piiRedaction;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param PiiRedaction|value-of<PiiRedaction>|null $piiRedaction
     */
    public static function with(
        ?bool $dataRetention = null,
        ?bool $inTransitDataLocality = null,
        PiiRedaction|string|null $piiRedaction = null,
    ): self {
        $self = new self;

        null !== $dataRetention && $self['dataRetention'] = $dataRetention;
        null !== $inTransitDataLocality && $self['inTransitDataLocality'] = $inTransitDataLocality;
        null !== $piiRedaction && $self['piiRedaction'] = $piiRedaction;

        return $self;
    }

    /**
     * If true, conversation history and insights will be stored. If false, they will not be stored. This in‑tool toggle governs solely the retention of conversation history and insights via the AI assistant. It has no effect on any separate recording, transcription, or storage configuration that you have set at the account, number, or application level. All such external settings remain in force regardless of your selection here.
     */
    public function withDataRetention(bool $dataRetention): self
    {
        $self = clone $this;
        $self['dataRetention'] = $dataRetention;

        return $self;
    }

    /**
     * Requires this assistant's conversations to be processed inside your organization's data-locality region, rather than only stored there, on every channel: for web chat, every model call of a turn; for voice, the call's model calls and the Telnyx-hosted speech services it uses; for SMS and WhatsApp, the model calls of each turn (how messages travel through carriers is not covered). Covered processing that cannot be handled in region fails rather than being served elsewhere. Enabling it requires a data-locality region with in-region inference (USA, EU, AUS, UAE; see [Inference regions](https://developers.telnyx.com/docs/inference/models/regions)), Telnyx-hosted models for the assistant, its fallback, and any conversation-flow node that overrides the model, and, when `insight_settings.model` is set, an insight model available in that region; the request is rejected otherwise. A voice call fails when it starts if its STT model or TTS voice is not self-hosted by Telnyx, if the assistant uses a speech-to-speech model, or if the call's media is anchored outside the region. Once enabled, send web chat requests and WebSocket or WebRTC conversations to your region's API hostname: one entering the platform in another region is refused rather than forwarded, because forwarding it would already have moved the content across the border. See [Data residency](https://developers.telnyx.com/docs/inference/data-residency#in-region-processing-for-ai-assistants). Defaults to false.
     */
    public function withInTransitDataLocality(bool $inTransitDataLocality): self
    {
        $self = clone $this;
        $self['inTransitDataLocality'] = $inTransitDataLocality;

        return $self;
    }

    /**
     * Controls redaction of personally identifiable information (PII) from the conversation history that is stored for this assistant. `disabled` (default) stores content as-is. `redact` replaces detected PII with `<PII:type/>` placeholders (e.g. `<PII:name/>`, `<PII:phone/>`) as the stored copies are written: message content (user, assistant, and tool-result messages) and tool-call arguments are redacted when written to conversation history, so the stored transcript, its read-back via the history API, and any insights generated from the stored messages contain the placeholders instead of the PII; response bodies returned by webhook tools are redacted too, as stored in the webhook logs — a per-conversation record separate from the transcript. In the Mission Control Portal this field appears as a "PII Redaction" on/off toggle, where Enabled corresponds to `redact`. Redaction runs when the stored copy is written, after the LLM has generated its reply: the live conversation is not redacted, the assistant's tools keep receiving the full (unredacted) values during the call, and the LLM still sees full content in its context window. Call recordings (including any recording layout configured under telephony settings) and the payloads of messages/webhooks delivered during the call are never redacted by this setting. The set of detected PII types (names, street addresses, phone numbers, email addresses, government identifiers like SSN and driver's license numbers, credit card and bank account numbers, IP addresses, dates of birth, and other identifiers unique to a person) is fixed by Telnyx and cannot be configured or extended per assistant. Assistants with `redact` cannot be used for SMS/WhatsApp messaging (that combination is rejected with a 400 error); voice and web chat are unaffected.
     *
     * @param PiiRedaction|value-of<PiiRedaction> $piiRedaction
     */
    public function withPiiRedaction(PiiRedaction|string $piiRedaction): self
    {
        $self = clone $this;
        $self['piiRedaction'] = $piiRedaction;

        return $self;
    }
}
