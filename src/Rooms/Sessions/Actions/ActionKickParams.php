<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams\Participants;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams\Participants\UnionMember0;

/**
 * Kick participants from a room session.
 *
 * @see Telnyx\Services\Rooms\Sessions\ActionsService::kick()
 *
 * @phpstan-type ActionKickParamsShape = array{
 *   exclude?: list<string>,
 *   participants?: UnionMember0|list<string>|value-of<UnionMember0>,
 * }
 */
final class ActionKickParams implements BaseModel
{
    /** @use SdkModel<ActionKickParamsShape> */
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
     * @var list<string>|value-of<UnionMember0>|null $participants
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
     * @param UnionMember0|list<string>|value-of<UnionMember0> $participants
     */
    public static function with(
        ?array $exclude = null,
        UnionMember0|array|string|null $participants = null
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
     * @param UnionMember0|list<string>|value-of<UnionMember0> $participants
     */
    public function withParticipants(
        UnionMember0|array|string $participants
    ): self {
        $self = clone $this;
        $self['participants'] = $participants;

        return $self;
    }
}
