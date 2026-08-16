<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSession;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Avatar configuration if an avatar is attached, otherwise null.
 *
 * @phpstan-type AvatarShape = array{avatarID: string, provider: 'anam'}
 */
final class Avatar implements BaseModel
{
    /** @use SdkModel<AvatarShape> */
    use SdkModel;

    /**
     * Avatar provider identifier.
     *
     * @var 'anam' $provider
     */
    #[Required]
    public string $provider = 'anam';

    /**
     * Identifier of the avatar.
     */
    #[Required('avatar_id')]
    public string $avatarID;

    /**
     * `new Avatar()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Avatar::with(avatarID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Avatar)->withAvatarID(...)
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
    public static function with(string $avatarID): self
    {
        $self = new self;

        $self['avatarID'] = $avatarID;

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
     * Avatar provider identifier.
     *
     * @param 'anam' $provider
     */
    public function withProvider(string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }
}
