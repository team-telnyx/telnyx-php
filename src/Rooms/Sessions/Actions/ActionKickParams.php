<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Sessions\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams\Participants;
use Telnyx\Rooms\Sessions\Actions\ActionKickParams\Participants\UnionMember0;

/**
 * Kick participants from a room session.
 *
 * @see Telnyx\STAINLESS_FIXME_Rooms\STAINLESS_FIXME_Sessions\ActionsService::kick()
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
    #[Api(list: 'string', optional: true)]
    public ?array $exclude;

    /**
     * Either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant.
     *
     * @var list<string>|value-of<UnionMember0>|null $participants
     */
    #[Api(union: Participants::class, optional: true)]
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
        $obj = new self;

        null !== $exclude && $obj->exclude = $exclude;
        null !== $participants && $obj['participants'] = $participants;

        return $obj;
    }

    /**
     * List of participant id to exclude from the action.
     *
     * @param list<string> $exclude
     */
    public function withExclude(array $exclude): self
    {
        $obj = clone $this;
        $obj->exclude = $exclude;

        return $obj;
    }

    /**
     * Either a list of participant id to perform the action on, or the keyword "all" to perform the action on all participant.
     *
     * @param UnionMember0|list<string>|value-of<UnionMember0> $participants
     */
    public function withParticipants(
        UnionMember0|array|string $participants
    ): self {
        $obj = clone $this;
        $obj['participants'] = $participants;

        return $obj;
    }
}
