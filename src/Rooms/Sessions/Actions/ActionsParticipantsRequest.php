<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\Sessions\Actions\ActionsParticipantsRequest\Participants;
use Telnyx\Rooms\Sessions\Actions\ActionsParticipantsRequest\Participants\AllParticipants;

/**
 * @phpstan-import-type ParticipantsShape from \Telnyx\Rooms\Sessions\Actions\ActionsParticipantsRequest\Participants
 *
 * @phpstan-type ActionsParticipantsRequestShape = array{
 *   exclude?: list<string>|null, participants?: ParticipantsShape|null
 * }
 */
final class ActionsParticipantsRequest implements BaseModel
{
    /** @use SdkModel<ActionsParticipantsRequestShape> */
    use SdkModel;

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
     * @param list<string>|null $exclude
     * @param ParticipantsShape|null $participants
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
     * @param ParticipantsShape $participants
     */
    public function withParticipants(
        AllParticipants|array|string $participants
    ): self {
        $self = clone $this;
        $self['participants'] = $participants;

        return $self;
    }
}
