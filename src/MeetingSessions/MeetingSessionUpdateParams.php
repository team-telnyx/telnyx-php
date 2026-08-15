<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates mutable properties of a meeting session. Only sessions in the scheduled state can be updated; any other state returns 409 with the invalid_state error code. All request fields are optional, and an empty object is a valid no-op update.
 *
 * @see Telnyx\Services\MeetingSessionsService::update()
 *
 * @phpstan-type MeetingSessionUpdateParamsShape = array{
 *   botName?: string|null, joinAt?: \DateTimeInterface|null
 * }
 */
final class MeetingSessionUpdateParams implements BaseModel
{
    /** @use SdkModel<MeetingSessionUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Updated display name for the bot.
     */
    #[Optional('bot_name')]
    public ?string $botName;

    /**
     * ISO-8601 timestamp for the bot to join. May be updated to reschedule.
     */
    #[Optional('join_at')]
    public ?\DateTimeInterface $joinAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $botName = null,
        ?\DateTimeInterface $joinAt = null
    ): self {
        $self = new self;

        null !== $botName && $self['botName'] = $botName;
        null !== $joinAt && $self['joinAt'] = $joinAt;

        return $self;
    }

    /**
     * Updated display name for the bot.
     */
    public function withBotName(string $botName): self
    {
        $self = clone $this;
        $self['botName'] = $botName;

        return $self;
    }

    /**
     * ISO-8601 timestamp for the bot to join. May be updated to reschedule.
     */
    public function withJoinAt(\DateTimeInterface $joinAt): self
    {
        $self = clone $this;
        $self['joinAt'] = $joinAt;

        return $self;
    }
}
