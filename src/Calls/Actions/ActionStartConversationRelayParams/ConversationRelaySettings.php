<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartConversationRelayParams;

use Telnyx\Calls\Actions\ConversationRelayInterruptible;
use Telnyx\Calls\ConversationRelayLanguage;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Conversation Relay connection settings. This object can provide `url`, `dtmf_detection`, `interruptible`, `interruptible_greeting`, and `languages`. Top-level aliases override nested values when both are present.
 *
 * @phpstan-import-type ConversationRelayLanguageShape from \Telnyx\Calls\ConversationRelayLanguage
 *
 * @phpstan-type ConversationRelaySettingsShape = array{
 *   url: string,
 *   dtmfDetection?: bool|null,
 *   interruptible?: null|ConversationRelayInterruptible|value-of<ConversationRelayInterruptible>,
 *   interruptibleGreeting?: null|ConversationRelayInterruptible|value-of<ConversationRelayInterruptible>,
 *   languages?: list<ConversationRelayLanguage|ConversationRelayLanguageShape>|null,
 * }
 */
final class ConversationRelaySettings implements BaseModel
{
    /** @use SdkModel<ConversationRelaySettingsShape> */
    use SdkModel;

    /**
     * WebSocket URL for your Conversation Relay server. Must start with `ws://` or `wss://`.
     */
    #[Required]
    public string $url;

    /**
     * Whether to enable DTMF detection during the relay session.
     */
    #[Optional('dtmf_detection')]
    public ?bool $dtmfDetection;

    /**
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @var value-of<ConversationRelayInterruptible>|null $interruptible
     */
    #[Optional(enum: ConversationRelayInterruptible::class)]
    public ?string $interruptible;

    /**
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @var value-of<ConversationRelayInterruptible>|null $interruptibleGreeting
     */
    #[Optional(
        'interruptible_greeting',
        enum: ConversationRelayInterruptible::class
    )]
    public ?string $interruptibleGreeting;

    /**
     * Language-specific TTS and transcription settings.
     *
     * @var list<ConversationRelayLanguage>|null $languages
     */
    #[Optional(list: ConversationRelayLanguage::class)]
    public ?array $languages;

    /**
     * `new ConversationRelaySettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ConversationRelaySettings::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ConversationRelaySettings)->withURL(...)
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
     * @param ConversationRelayInterruptible|value-of<ConversationRelayInterruptible>|null $interruptible
     * @param ConversationRelayInterruptible|value-of<ConversationRelayInterruptible>|null $interruptibleGreeting
     * @param list<ConversationRelayLanguage|ConversationRelayLanguageShape>|null $languages
     */
    public static function with(
        string $url,
        ?bool $dtmfDetection = null,
        ConversationRelayInterruptible|string|null $interruptible = null,
        ConversationRelayInterruptible|string|null $interruptibleGreeting = null,
        ?array $languages = null,
    ): self {
        $self = new self;

        $self['url'] = $url;

        null !== $dtmfDetection && $self['dtmfDetection'] = $dtmfDetection;
        null !== $interruptible && $self['interruptible'] = $interruptible;
        null !== $interruptibleGreeting && $self['interruptibleGreeting'] = $interruptibleGreeting;
        null !== $languages && $self['languages'] = $languages;

        return $self;
    }

    /**
     * WebSocket URL for your Conversation Relay server. Must start with `ws://` or `wss://`.
     */
    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

        return $self;
    }

    /**
     * Whether to enable DTMF detection during the relay session.
     */
    public function withDtmfDetection(bool $dtmfDetection): self
    {
        $self = clone $this;
        $self['dtmfDetection'] = $dtmfDetection;

        return $self;
    }

    /**
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @param ConversationRelayInterruptible|value-of<ConversationRelayInterruptible> $interruptible
     */
    public function withInterruptible(
        ConversationRelayInterruptible|string $interruptible
    ): self {
        $self = clone $this;
        $self['interruptible'] = $interruptible;

        return $self;
    }

    /**
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @param ConversationRelayInterruptible|value-of<ConversationRelayInterruptible> $interruptibleGreeting
     */
    public function withInterruptibleGreeting(
        ConversationRelayInterruptible|string $interruptibleGreeting
    ): self {
        $self = clone $this;
        $self['interruptibleGreeting'] = $interruptibleGreeting;

        return $self;
    }

    /**
     * Language-specific TTS and transcription settings.
     *
     * @param list<ConversationRelayLanguage|ConversationRelayLanguageShape> $languages
     */
    public function withLanguages(array $languages): self
    {
        $self = clone $this;
        $self['languages'] = $languages;

        return $self;
    }
}
