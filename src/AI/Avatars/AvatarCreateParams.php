<?php

declare(strict_types=1);

namespace Telnyx\AI\Avatars;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\FileParam;

/**
 * Uploads an image, validates its file type, size, safe decoding, and resolution, stores it in Telnyx-managed private storage, and creates an avatar owned by the authenticated organization. Creating an avatar does not update an AI Assistant; use the returned ID separately wherever the avatar is consumed. The avatar image is stored independently from the rendering model and background, which are selected where the avatar is consumed. Supported image types are JPEG, PNG, and WebP. Images may be up to 10 MiB, must be between 256 and 8192 pixels on each side, and may contain at most 40 megapixels. A per-organization custom-avatar quota applies; the create request returns an error when the quota is reached. For best results, use a 16:9 landscape image, preferably 1920 by 1080 pixels and at least 1280 by 720 pixels. Show one centered, front-facing person from the shoulders up, keep the full head and hair visible with space around it, and use a sharp, evenly lit image with unobstructed eyes and mouth. Use a transparent PNG or WebP when the avatar will be combined with a selectable background. These composition recommendations are not enforced in the first release; the first release does not validate the number of faces, pose, or image content.
 *
 * @see Telnyx\Services\AI\AvatarsService::create()
 *
 * @phpstan-type AvatarCreateParamsShape = array{
 *   imageFile: string|FileParam, name: string
 * }
 */
final class AvatarCreateParams implements BaseModel
{
    /** @use SdkModel<AvatarCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * JPEG, PNG, or WebP image file. The maximum file size is 10 MiB.
     */
    #[Required('image_file')]
    public string $imageFile;

    /**
     * Customer-facing name of the custom avatar.
     */
    #[Required]
    public string $name;

    /**
     * `new AvatarCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AvatarCreateParams::with(imageFile: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AvatarCreateParams)->withImageFile(...)->withName(...)
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
    public static function with(string|FileParam $imageFile, string $name): self
    {
        $self = new self;

        $self['imageFile'] = $imageFile;
        $self['name'] = $name;

        return $self;
    }

    /**
     * JPEG, PNG, or WebP image file. The maximum file size is 10 MiB.
     */
    public function withImageFile(string|FileParam $imageFile): self
    {
        $self = clone $this;
        $self['imageFile'] = $imageFile;

        return $self;
    }

    /**
     * Customer-facing name of the custom avatar.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }
}
