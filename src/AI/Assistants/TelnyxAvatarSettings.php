<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\TelnyxAvatarSettings\BackgroundID;
use Telnyx\AI\Assistants\TelnyxAvatarSettings\Model;
use Telnyx\AI\Avatars\AvatarID;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * **Beta:** Configuration for the Telnyx open-source avatar provider. Use one of the six stock avatars or an organization-owned custom avatar returned by the Avatars API. Supported backgrounds are office, studio, and reception.
 *
 * @phpstan-type TelnyxAvatarSettingsShape = array{
 *   avatarID: string|AvatarID|value-of<AvatarID>,
 *   backgroundID: BackgroundID|value-of<BackgroundID>,
 *   model: Model|value-of<Model>,
 *   provider: 'telnyx',
 * }
 */
final class TelnyxAvatarSettings implements BaseModel
{
    /** @use SdkModel<TelnyxAvatarSettingsShape> */
    use SdkModel;

    /**
     * Selects the Telnyx open-source avatar provider.
     *
     * @var 'telnyx' $provider
     */
    #[Required]
    public string $provider = 'telnyx';

    /**
     * The Telnyx stock avatar or organization-owned custom avatar to render.
     *
     * @var string|value-of<AvatarID> $avatarID
     */
    #[Required('avatar_id', enum: AvatarID::class)]
    public string $avatarID;

    /**
     * The background to render.
     *
     * @var value-of<BackgroundID> $backgroundID
     */
    #[Required('background_id', enum: BackgroundID::class)]
    public string $backgroundID;

    /**
     * Required avatar model identifier, separate from `avatar_id`. The supported value is `foxtrot-1`. Omission, null, and unsupported model identifiers are rejected.
     *
     * @var value-of<Model> $model
     */
    #[Required(enum: Model::class)]
    public string $model;

    /**
     * `new TelnyxAvatarSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TelnyxAvatarSettings::with(avatarID: ..., backgroundID: ..., model: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TelnyxAvatarSettings)
     *   ->withAvatarID(...)
     *   ->withBackgroundID(...)
     *   ->withModel(...)
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
     * @param string|AvatarID|value-of<AvatarID> $avatarID
     * @param BackgroundID|value-of<BackgroundID> $backgroundID
     * @param Model|value-of<Model> $model
     */
    public static function with(
        AvatarID|string $avatarID,
        BackgroundID|string $backgroundID,
        Model|string $model,
    ): self {
        $self = new self;

        $self['avatarID'] = $avatarID;
        $self['backgroundID'] = $backgroundID;
        $self['model'] = $model;

        return $self;
    }

    /**
     * The Telnyx stock avatar or organization-owned custom avatar to render.
     *
     * @param string|AvatarID|value-of<AvatarID> $avatarID
     */
    public function withAvatarID(AvatarID|string $avatarID): self
    {
        $self = clone $this;
        $self['avatarID'] = $avatarID;

        return $self;
    }

    /**
     * The background to render.
     *
     * @param BackgroundID|value-of<BackgroundID> $backgroundID
     */
    public function withBackgroundID(BackgroundID|string $backgroundID): self
    {
        $self = clone $this;
        $self['backgroundID'] = $backgroundID;

        return $self;
    }

    /**
     * Required avatar model identifier, separate from `avatar_id`. The supported value is `foxtrot-1`. Omission, null, and unsupported model identifiers are rejected.
     *
     * @param Model|value-of<Model> $model
     */
    public function withModel(Model|string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * Selects the Telnyx open-source avatar provider.
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
