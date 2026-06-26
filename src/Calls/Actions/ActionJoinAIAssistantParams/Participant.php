<?php

declare(strict_types=1);

namespace Telnyx\Calls\Actions\ActionJoinAIAssistantParams;

use Telnyx\Calls\Actions\ActionJoinAIAssistantParams\Participant\OnHangup;
use Telnyx\Calls\Actions\ActionJoinAIAssistantParams\Participant\Role;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ParticipantShape = array{
 *   id: string,
 *   role: Role|value-of<Role>,
 *   name?: string|null,
 *   onHangup?: null|OnHangup|value-of<OnHangup>,
 * }
 */
final class Participant implements BaseModel
{
    /** @use SdkModel<ParticipantShape> */
    use SdkModel;

    /**
     * The call_control_id of the participant to add to the conversation.
     */
    #[Required]
    public string $id;

    /**
     * The role of the participant in the conversation.
     *
     * @var value-of<Role> $role
     */
    #[Required(enum: Role::class)]
    public string $role;

    /**
     * Display name for the participant.
     */
    #[Optional]
    public ?string $name;

    /**
     * Determines what happens to the conversation when this participant hangs up.
     *
     * @var value-of<OnHangup>|null $onHangup
     */
    #[Optional('on_hangup', enum: OnHangup::class)]
    public ?string $onHangup;

    /**
     * `new Participant()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Participant::with(id: ..., role: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Participant)->withID(...)->withRole(...)
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
     * @param Role|value-of<Role> $role
     * @param OnHangup|value-of<OnHangup>|null $onHangup
     */
    public static function with(
        string $id,
        Role|string $role,
        ?string $name = null,
        OnHangup|string|null $onHangup = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['role'] = $role;

        null !== $name && $self['name'] = $name;
        null !== $onHangup && $self['onHangup'] = $onHangup;

        return $self;
    }

    /**
     * The call_control_id of the participant to add to the conversation.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * The role of the participant in the conversation.
     *
     * @param Role|value-of<Role> $role
     */
    public function withRole(Role|string $role): self
    {
        $self = clone $this;
        $self['role'] = $role;

        return $self;
    }

    /**
     * Display name for the participant.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Determines what happens to the conversation when this participant hangs up.
     *
     * @param OnHangup|value-of<OnHangup> $onHangup
     */
    public function withOnHangup(OnHangup|string $onHangup): self
    {
        $self = clone $this;
        $self['onHangup'] = $onHangup;

        return $self;
    }
}
