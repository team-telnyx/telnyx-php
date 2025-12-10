<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\Sessions\Actions\ActionMuteParams\Participants;
use Telnyx\Rooms\Sessions\Actions\ActionMuteParams\Participants\AllParticipants;

/**
 * Mute participants in room session.
 *
 * @see Telnyx\Services\Rooms\Sessions\ActionsService::mute()
 *
 * @phpstan-type ActionMuteParamsShape = array{
 *   exclude?: list<string>,
 *   participants?: AllParticipants|list<string>|value-of<AllParticipants>,
 * }
 */
final class ActionMuteParams implements BaseModel
{
    /** @use SdkModel<ActionMuteParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of participant id to exclude from the action.
     *
     * @var list<string>|null $exclude
     */
    #[Optional(list: 'string')]
    public ?array $exclude;

    /**
     * Either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant.
     *
     * @var list<string>|value-of<AllParticipants>|null $participants
     */
    #[Optional(union: Participants::class)]
    public array|string|null $participants;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $exclude
     * @param AllParticipants|list<string>|value-of<AllParticipants> $participants
     */
    public static function with(
        ?array $exclude = null,
        AllParticipants|array|string|null $participants = null
    ): self {
        $self = new self;

        null !== $exclude && $self['exclude'] = $exclude;
        null !== $participants && $self['participants'] = $participants;

        return $self;
    }

    /**
     * List of participant id to exclude from the action.
     *
     * @param list<string> $exclude
     */
    public function withExclude(array $exclude): self
    {
        $self = clone $this;
        $self['exclude'] = $exclude;

        return $self;
    }

    /**
     * Either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant.
     *
     * @param AllParticipants|list<string>|value-of<AllParticipants> $participants
     */
    public function withParticipants(
        AllParticipants|array|string $participants
    ): self {
        $self = clone $this;
        $self['participants'] = $participants;

        return $self;
    }
}
