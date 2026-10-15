<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\AvatarSettingsRequest\BackgroundID;
use Telnyx\AI\Assistants\AvatarSettingsRequest\Model;
use Telnyx\AI\Avatars\AvatarID;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * **Beta:** Configuration for the Telnyx open-source avatar provider. Use a stock avatar or an organization-owned custom avatar returned by the Avatars API. Discover the available stock catalog with GET /v2/ai/avatars and filter[avatar_type]=stock; follow meta.total_pages to load every page. Supported backgrounds are office, studio, and reception.
 *
 * @phpstan-type AvatarSettingsRequestShape = array{
 *   avatarID: string|AvatarID|value-of<AvatarID>,
 *   backgroundID: BackgroundID|value-of<BackgroundID>,
 *   model: Model|value-of<Model>,
 *   provider: 'telnyx',
 * }
 */
final class AvatarSettingsRequest implements BaseModel
{
    /** @use SdkModel<AvatarSettingsRequestShape> */
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
     * `new AvatarSettingsRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AvatarSettingsRequest::with(avatarID: ..., backgroundID: ..., model: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AvatarSettingsRequest)
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
