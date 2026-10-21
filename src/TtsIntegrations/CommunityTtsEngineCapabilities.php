<?php

declare(strict_types=1);

namespace Telnyx\TtsIntegrations;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * What the engine supports. An unknown key is rejected.
 *
 * @phpstan-type CommunityTtsEngineCapabilitiesShape = array{
 *   streamedAudio: bool,
 *   flushSupport?: bool|null,
 *   forceInterruptSupport?: bool|null,
 *   ssmlSupport?: bool|null,
 *   voiceSettingsSchema?: array<string,mixed>|null,
 * }
 */
final class CommunityTtsEngineCapabilities implements BaseModel
{
    /** @use SdkModel<CommunityTtsEngineCapabilitiesShape> */
    use SdkModel;

    /**
     * Required. `true` when the engine sends audio in small frames as it synthesizes; `false` when it sends one frame per sentence.
     */
    #[Required('streamed_audio')]
    public bool $streamedAudio;

    /**
     * The engine speaks the buffered text when a frame carries `"flush": true`.
     */
    #[Optional('flush_support')]
    public ?bool $flushSupport;

    /**
     * The engine supports a restart of the current speech (barge-in).
     */
    #[Optional('force_interrupt_support')]
    public ?bool $forceInterruptSupport;

    /**
     * The engine accepts SSML in the text.
     */
    #[Optional('ssml_support')]
    public ?bool $ssmlSupport;

    /**
     * The settings callers can pass to the engine in `voice_settings`, one entry per setting: `{"type": "number" | "integer", "min", "max"}`, `{"type": "boolean"}`, `{"type": "string"}` (at most 1000 characters) or `{"type": "enum", "values": [...]}`, each with an optional `default`. A caller's settings are checked against it before Telnyx connects to the engine: an undeclared setting, a value of the wrong type, or a value out of bounds is refused. An engine that declares none receives the settings as sent.
     *
     * @var array<string,mixed>|null $voiceSettingsSchema
     */
    #[Optional('voice_settings_schema', map: 'mixed', nullable: true)]
    public ?array $voiceSettingsSchema;

    /**
     * `new CommunityTtsEngineCapabilities()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CommunityTtsEngineCapabilities::with(streamedAudio: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CommunityTtsEngineCapabilities)->withStreamedAudio(...)
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
     * @param Omitted|array<string,mixed>|null $voiceSettingsSchema
     */
    public static function with(
        bool $streamedAudio,
        Omitted|array|null $voiceSettingsSchema = Omitted::VALUE,
        ?bool $flushSupport = null,
        ?bool $forceInterruptSupport = null,
        ?bool $ssmlSupport = null,
    ): self {
        $self = new self;

        $self['streamedAudio'] = $streamedAudio;

        null !== $flushSupport && $self['flushSupport'] = $flushSupport;
        null !== $forceInterruptSupport && $self['forceInterruptSupport'] = $forceInterruptSupport;
        null !== $ssmlSupport && $self['ssmlSupport'] = $ssmlSupport;
        Omitted::VALUE !== $voiceSettingsSchema && $self['voiceSettingsSchema'] = $voiceSettingsSchema;

        return $self;
    }

    /**
     * Required. `true` when the engine sends audio in small frames as it synthesizes; `false` when it sends one frame per sentence.
     */
    public function withStreamedAudio(bool $streamedAudio): self
    {
        $self = clone $this;
        $self['streamedAudio'] = $streamedAudio;

        return $self;
    }

    /**
     * The engine speaks the buffered text when a frame carries `"flush": true`.
     */
    public function withFlushSupport(bool $flushSupport): self
    {
        $self = clone $this;
        $self['flushSupport'] = $flushSupport;

        return $self;
    }

    /**
     * The engine supports a restart of the current speech (barge-in).
     */
    public function withForceInterruptSupport(bool $forceInterruptSupport): self
    {
        $self = clone $this;
        $self['forceInterruptSupport'] = $forceInterruptSupport;

        return $self;
    }

    /**
     * The engine accepts SSML in the text.
     */
    public function withSsmlSupport(bool $ssmlSupport): self
    {
        $self = clone $this;
        $self['ssmlSupport'] = $ssmlSupport;

        return $self;
    }

    /**
     * The settings callers can pass to the engine in `voice_settings`, one entry per setting: `{"type": "number" | "integer", "min", "max"}`, `{"type": "boolean"}`, `{"type": "string"}` (at most 1000 characters) or `{"type": "enum", "values": [...]}`, each with an optional `default`. A caller's settings are checked against it before Telnyx connects to the engine: an undeclared setting, a value of the wrong type, or a value out of bounds is refused. An engine that declares none receives the settings as sent.
     *
     * @param array<string,mixed>|null $voiceSettingsSchema
     */
    public function withVoiceSettingsSchema(?array $voiceSettingsSchema): self
    {
        $self = clone $this;
        $self['voiceSettingsSchema'] = $voiceSettingsSchema;

        return $self;
    }
}
