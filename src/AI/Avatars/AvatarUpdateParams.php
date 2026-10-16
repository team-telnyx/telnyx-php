<?php

declare(strict_types=1);

namespace Telnyx\AI\Avatars;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Updates the customer-facing name of a custom avatar owned by the authenticated organization. Stock avatars cannot be modified. To replace the image, create a new custom avatar so existing references keep their original content.
 *
 * @see Telnyx\Services\AI\AvatarsService::update()
 *
 * @phpstan-type AvatarUpdateParamsShape = array{name: string}
 */
final class AvatarUpdateParams implements BaseModel
{
    /** @use SdkModel<AvatarUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * New customer-facing name of the custom avatar.
     */
    #[Required]
    public string $name;

    /**
     * `new AvatarUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AvatarUpdateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AvatarUpdateParams)->withName(...)
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
    public static function with(string $name): self
    {
        $self = new self;

        $self['name'] = $name;

        return $self;
    }

    /**
     * New customer-facing name of the custom avatar.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
