<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionStartConversationRelayParams;

use Telnyx\Calls\Actions\ActionStartConversationRelayParams\InterruptionSettings\Interruptible;
use Telnyx\Calls\Actions\ActionStartConversationRelayParams\InterruptionSettings\InterruptibleGreeting;
use Telnyx\Calls\Actions\ActionStartConversationRelayParams\InterruptionSettings\WelcomeGreetingInterruptible;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Settings for handling caller interruptions during Conversation Relay speech.
 *
 * @phpstan-type InterruptionSettingsShape = array{
 *   enable?: bool|null,
 *   interruptible?: null|\Telnyx\Calls\Actions\ActionStartConversationRelayParams\InterruptionSettings\Interruptible|value-of<\Telnyx\Calls\Actions\ActionStartConversationRelayParams\InterruptionSettings\Interruptible>,
 *   interruptibleGreeting?: null|\Telnyx\Calls\Actions\ActionStartConversationRelayParams\InterruptionSettings\InterruptibleGreeting|value-of<\Telnyx\Calls\Actions\ActionStartConversationRelayParams\InterruptionSettings\InterruptibleGreeting>,
 *   welcomeGreetingInterruptible?: null|WelcomeGreetingInterruptible|value-of<WelcomeGreetingInterruptible>,
 * }
 */
final class InterruptionSettings implements BaseModel
{
    /** @use SdkModel<InterruptionSettingsShape> */
    use SdkModel;

    /**
     * Legacy boolean form. `true` is equivalent to `interruptible=any`; `false` is equivalent to `interruptible=none`.
     */
    #[Optional]
    public ?bool $enable;

    /**
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @var value-of<Interruptible>|null $interruptible
     */
    #[Optional(
        enum: Interruptible::class,
    )]
    public ?string $interruptible;

    /**
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @var value-of<InterruptibleGreeting>|null $interruptibleGreeting
     */
    #[Optional(
        'interruptible_greeting',
        enum: InterruptibleGreeting::class,
    )]
    public ?string $interruptibleGreeting;

    /**
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @var value-of<WelcomeGreetingInterruptible>|null $welcomeGreetingInterruptible
     */
    #[Optional(
        'welcome_greeting_interruptible',
        enum: WelcomeGreetingInterruptible::class
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
     * @param Interruptible|value-of<Interruptible>|null $interruptible
     * @param InterruptibleGreeting|value-of<InterruptibleGreeting>|null $interruptibleGreeting
     * @param WelcomeGreetingInterruptible|value-of<WelcomeGreetingInterruptible>|null $welcomeGreetingInterruptible
     */
    public static function with(
        ?bool $enable = null,
        Interruptible|string|null $interruptible = null,
        InterruptibleGreeting|string|null $interruptibleGreeting = null,
        WelcomeGreetingInterruptible|string|null $welcomeGreetingInterruptible = null,
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
     * @param Interruptible|value-of<Interruptible> $interruptible
     */
    public function withInterruptible(
        Interruptible|string $interruptible,
    ): self {
        $self = clone $this;
        $self['interruptible'] = $interruptible;

        return $self;
    }

    /**
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @param InterruptibleGreeting|value-of<InterruptibleGreeting> $interruptibleGreeting
     */
    public function withInterruptibleGreeting(
        InterruptibleGreeting|string $interruptibleGreeting,
    ): self {
        $self = clone $this;
        $self['interruptibleGreeting'] = $interruptibleGreeting;

        return $self;
    }

    /**
     * Controls when caller input can interrupt assistant speech. `any` allows speech or DTMF interruptions; `none` disables interruptions; `speech` allows speech only; `dtmf` allows DTMF only.
     *
     * @param WelcomeGreetingInterruptible|value-of<WelcomeGreetingInterruptible> $welcomeGreetingInterruptible
     */
    public function withWelcomeGreetingInterruptible(
        WelcomeGreetingInterruptible|string $welcomeGreetingInterruptible
    ): self {
        $self = clone $this;
        $self['welcomeGreetingInterruptible'] = $welcomeGreetingInterruptible;

        return $self;
    }
}
