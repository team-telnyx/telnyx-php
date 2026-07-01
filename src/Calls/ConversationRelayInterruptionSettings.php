<?php

declare(strict_types=1);

namespace Telnyx\Calls;

use Telnyx\Calls\Actions\ConversationRelayInterruptible;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Settings for handling caller interruptions during Conversation Relay speech.
 *
 * @phpstan-type ConversationRelayInterruptionSettingsShape = array{
 *   enable?: bool|null,
 *   interruptible?: null|ConversationRelayInterruptible|value-of<ConversationRelayInterruptible>,
 *   interruptibleGreeting?: null|ConversationRelayInterruptible|value-of<ConversationRelayInterruptible>,
 *   welcomeGreetingInterruptible?: null|ConversationRelayInterruptible|value-of<ConversationRelayInterruptible>,
 * }
 */
final class ConversationRelayInterruptionSettings implements BaseModel
{
    /** @use SdkModel<ConversationRelayInterruptionSettingsShape> */
    use SdkModel;

    /**
     * Legacy boolean form. `true` is equivalent to `interruptible=any`; `false` is equivalent to `interruptible=none`.
     */
    #[Optional]
    public ?bool $enable;

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
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @var value-of<ConversationRelayInterruptible>|null $welcomeGreetingInterruptible
     */
    #[Optional(
        'welcome_greeting_interruptible',
        enum: ConversationRelayInterruptible::class,
    )]
    public ?string $welcomeGreetingInterruptible;

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
     * @param ConversationRelayInterruptible|value-of<ConversationRelayInterruptible>|null $welcomeGreetingInterruptible
     */
    public static function with(
        ?bool $enable = null,
        ConversationRelayInterruptible|string|null $interruptible = null,
        ConversationRelayInterruptible|string|null $interruptibleGreeting = null,
        ConversationRelayInterruptible|string|null $welcomeGreetingInterruptible = null,
    ): self {
        $self = new self;

        null !== $enable && $self['enable'] = $enable;
        null !== $interruptible && $self['interruptible'] = $interruptible;
        null !== $interruptibleGreeting && $self['interruptibleGreeting'] = $interruptibleGreeting;
        null !== $welcomeGreetingInterruptible && $self['welcomeGreetingInterruptible'] = $welcomeGreetingInterruptible;

        return $self;
    }

    /**
     * Legacy boolean form. `true` is equivalent to `interruptible=any`; `false` is equivalent to `interruptible=none`.
     */
    public function withEnable(bool $enable): self
    {
        $self = clone $this;
        $self['enable'] = $enable;

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
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @param ConversationRelayInterruptible|value-of<ConversationRelayInterruptible> $welcomeGreetingInterruptible
     */
    public function withWelcomeGreetingInterruptible(
        ConversationRelayInterruptible|string $welcomeGreetingInterruptible
    ): self {
        $self = clone $this;
        $self['welcomeGreetingInterruptible'] = $welcomeGreetingInterruptible;

        return $self;
    }
}
