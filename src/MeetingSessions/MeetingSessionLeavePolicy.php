<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * Automatic departure settings for Google Meet and Teams. Omitted fields use the default behavior. Set at creation; cannot be changed later. Zoom ignores this policy.
 *
 * @phpstan-type MeetingSessionLeavePolicyShape = array{
 *   aloneSeconds?: int|null,
 *   botNameKeywords?: list<string>|null,
 *   hostWaitSeconds?: int|null,
 *   lobbyWaitSeconds?: int|null,
 *   maxDurationSeconds?: int|null,
 *   silenceGraceSeconds?: int|null,
 *   silenceSeconds?: int|null,
 * }
 */
final class MeetingSessionLeavePolicy implements BaseModel
{
    /** @use SdkModel<MeetingSessionLeavePolicyShape> */
    use SdkModel;

    /**
     * Seconds alone after another participant has attended and left. Does not start just because the bot arrives first.
     */
    #[Optional('alone_seconds')]
    public ?int $aloneSeconds;

    /**
     * Case-insensitive names or phrases identifying other bots to exclude when deciding whether this bot is alone. Matching splits names on spaces, hyphens and underscores. Null or an empty array disables filtering.
     *
     * @var list<string>|null $botNameKeywords
     */
    #[Optional('bot_name_keywords', list: 'string', nullable: true)]
    public ?array $botNameKeywords;

    /**
     * Seconds to wait for the host to start the meeting.
     */
    #[Optional('host_wait_seconds')]
    public ?int $hostWaitSeconds;

    /**
     * Seconds to wait for lobby admission.
     */
    #[Optional('lobby_wait_seconds')]
    public ?int $lobbyWaitSeconds;

    /**
     * Maximum seconds after joining. Null means no per-join duration limit; service safety limits still apply.
     */
    #[Optional('max_duration_seconds', nullable: true)]
    public ?int $maxDurationSeconds;

    /**
     * Seconds after joining before silence detection starts a fresh inactivity timer.
     */
    #[Optional('silence_grace_seconds')]
    public ?int $silenceGraceSeconds;

    /**
     * Continuous audio inactivity before departure after the silence grace period.
     */
    #[Optional('silence_seconds')]
    public ?int $silenceSeconds;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|Omitted|null $botNameKeywords
     */
    public static function with(
        array|Omitted|null $botNameKeywords = Omitted::VALUE,
        int|Omitted|null $maxDurationSeconds = Omitted::VALUE,
        ?int $aloneSeconds = null,
        ?int $hostWaitSeconds = null,
        ?int $lobbyWaitSeconds = null,
        ?int $silenceGraceSeconds = null,
        ?int $silenceSeconds = null,
    ): self {
        $self = new self;

        null !== $aloneSeconds && $self['aloneSeconds'] = $aloneSeconds;
        Omitted::VALUE !== $botNameKeywords && $self['botNameKeywords'] = $botNameKeywords;
        null !== $hostWaitSeconds && $self['hostWaitSeconds'] = $hostWaitSeconds;
        null !== $lobbyWaitSeconds && $self['lobbyWaitSeconds'] = $lobbyWaitSeconds;
        Omitted::VALUE !== $maxDurationSeconds && $self['maxDurationSeconds'] = $maxDurationSeconds;
        null !== $silenceGraceSeconds && $self['silenceGraceSeconds'] = $silenceGraceSeconds;
        null !== $silenceSeconds && $self['silenceSeconds'] = $silenceSeconds;

        return $self;
    }

    /**
     * Seconds alone after another participant has attended and left. Does not start just because the bot arrives first.
     */
    public function withAloneSeconds(int $aloneSeconds): self
    {
        $self = clone $this;
        $self['aloneSeconds'] = $aloneSeconds;

        return $self;
    }

    /**
     * Case-insensitive names or phrases identifying other bots to exclude when deciding whether this bot is alone. Matching splits names on spaces, hyphens and underscores. Null or an empty array disables filtering.
     *
     * @param list<string>|null $botNameKeywords
     */
    public function withBotNameKeywords(?array $botNameKeywords): self
    {
        $self = clone $this;
        $self['botNameKeywords'] = $botNameKeywords;

        return $self;
    }

    /**
     * Seconds to wait for the host to start the meeting.
     */
    public function withHostWaitSeconds(int $hostWaitSeconds): self
    {
        $self = clone $this;
        $self['hostWaitSeconds'] = $hostWaitSeconds;

        return $self;
    }

    /**
     * Seconds to wait for lobby admission.
     */
    public function withLobbyWaitSeconds(int $lobbyWaitSeconds): self
    {
        $self = clone $this;
        $self['lobbyWaitSeconds'] = $lobbyWaitSeconds;

        return $self;
    }

    /**
     * Maximum seconds after joining. Null means no per-join duration limit; service safety limits still apply.
     */
    public function withMaxDurationSeconds(?int $maxDurationSeconds): self
    {
        $self = clone $this;
        $self['maxDurationSeconds'] = $maxDurationSeconds;

        return $self;
    }

    /**
     * Seconds after joining before silence detection starts a fresh inactivity timer.
     */
    public function withSilenceGraceSeconds(int $silenceGraceSeconds): self
    {
        $self = clone $this;
        $self['silenceGraceSeconds'] = $silenceGraceSeconds;

        return $self;
    }

    /**
     * Continuous audio inactivity before departure after the silence grace period.
     */
    public function withSilenceSeconds(int $silenceSeconds): self
    {
        $self = clone $this;
        $self['silenceSeconds'] = $silenceSeconds;

        return $self;
    }
}
