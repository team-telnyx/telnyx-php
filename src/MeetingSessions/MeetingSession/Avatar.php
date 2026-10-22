<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSession;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * The assistant's avatar, captured from its `avatar_settings` when the session was created. For display only; later changes to the assistant do not update it.
 *
 * @phpstan-type AvatarShape = array{
 *   avatarID: string, backgroundID: string, model: string, provider: 'telnyx'
 * }
 */
final class Avatar implements BaseModel
{
    /** @use SdkModel<AvatarShape> */
    use SdkModel;

    /**
     * Avatar provider identifier.
     *
     * @var 'telnyx' $provider
     */
    #[Required]
    public string $provider = 'telnyx';

    /**
     * Identifier of the avatar.
     */
    #[Required('avatar_id')]
    public string $avatarID;

    /**
     * Identifier of the avatar's background.
     */
    #[Required('background_id')]
    public string $backgroundID;

    /**
     * Avatar rendering model, for example `foxtrot-1`.
     */
    #[Required]
    public string $model;

    /**
     * `new Avatar()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Avatar::with(avatarID: ..., backgroundID: ..., model: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Avatar)->withAvatarID(...)->withBackgroundID(...)->withModel(...)
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
     */
    public static function with(
        string $avatarID,
        string $backgroundID,
        string $model
    ): self {
        $self = new self;

        $self['avatarID'] = $avatarID;
        $self['backgroundID'] = $backgroundID;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Identifier of the avatar.
     */
    public function withAvatarID(string $avatarID): self
    {
        $self = clone $this;
        $self['avatarID'] = $avatarID;

        return $self;
    }

    /**
     * Identifier of the avatar's background.
     */
    public function withBackgroundID(string $backgroundID): self
    {
        $self = clone $this;
        $self['backgroundID'] = $backgroundID;

        return $self;
    }

    /**
     * Avatar rendering model, for example `foxtrot-1`.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Avatar provider identifier.
     *
     * @param 'telnyx' $provider
     */
    public function withProvider(string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }
}
