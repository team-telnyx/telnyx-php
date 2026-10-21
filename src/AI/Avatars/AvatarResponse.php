<?php

declare(strict_types=1);

namespace Telnyx\AI\Avatars;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type AvatarShape from \Telnyx\AI\Avatars\Avatar
 *
 * @phpstan-type AvatarResponseShape = array{data: Avatar|AvatarShape}
 */
final class AvatarResponse implements BaseModel
{
    /** @use SdkModel<AvatarResponseShape> */
    use SdkModel;

    #[Required]
    public Avatar $data;

    /**
     * `new AvatarResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AvatarResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AvatarResponse)->withData(...)
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
     * @param Avatar|AvatarShape $data
     */
    public static function with(Avatar|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Avatar|AvatarShape $data
     */
    public function withData(Avatar|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
