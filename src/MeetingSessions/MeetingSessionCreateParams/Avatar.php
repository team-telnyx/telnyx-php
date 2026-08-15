<?php

declare(strict_types=1);

namespace Telnyx\MeetingSessions\MeetingSessionCreateParams;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Request options for attaching a bring-your-own-key avatar to the session.
 *
 * @phpstan-type AvatarShape = array{
 *   apiKey: string, avatarID: string, provider: 'anam'
 * }
 */
final class Avatar implements BaseModel
{
    /** @use SdkModel<AvatarShape> */
    use SdkModel;

    /**
     * Avatar provider identifier. Currently only "anam" is supported.
     *
     * @var 'anam' $provider
     */
    #[Required]
    public string $provider = 'anam';

    /**
     * Bring-your-own-key API key for the avatar provider. The key is never stored or returned by the API.
     */
    #[Required('api_key')]
    public string $apiKey;

    /**
     * Identifier of the avatar to use.
     */
    #[Required('avatar_id')]
    public string $avatarID;

    /**
     * `new Avatar()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Avatar::with(apiKey: ..., avatarID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Avatar)->withAPIKey(...)->withAvatarID(...)
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
    public static function with(string $apiKey, string $avatarID): self
    {
        $self = new self;

        $self['apiKey'] = $apiKey;
        $self['avatarID'] = $avatarID;

        return $self;
    }

    /**
     * Bring-your-own-key API key for the avatar provider. The key is never stored or returned by the API.
     */
    public function withAPIKey(string $apiKey): self
    {
        $self = clone $this;
        $self['apiKey'] = $apiKey;

        return $self;
    }

    /**
     * Identifier of the avatar to use.
     */
    public function withAvatarID(string $avatarID): self
    {
        $self = clone $this;
        $self['avatarID'] = $avatarID;

        return $self;
    }

    /**
     * Avatar provider identifier. Currently only "anam" is supported.
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
