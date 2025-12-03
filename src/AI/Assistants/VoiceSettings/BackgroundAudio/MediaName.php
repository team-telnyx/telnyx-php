<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaNameShape = array{type: 'media_name', value: string}
 */
final class MediaName implements BaseModel
{
    /** @use SdkModel<MediaNameShape> */
    use SdkModel;

    /**
     * Reference a previously uploaded media by its name from Telnyx Media Storage.
     *
     * @var 'media_name' $type
     */
    #[Api]
    public string $type = 'media_name';

    /**
     * The `name` of a media asset created via [Media Storage API](https://developers.telnyx.com/api/media-storage/create-media-storage). The audio will loop during the call.
     */
    #[Api]
    public string $value;

    /**
     * `new MediaName()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaName::with(value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaName)->withValue(...)
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
    public static function with(string $value): self
    {
        $obj = new self;

        $obj->value = $value;

        return $obj;
    }

    /**
     * The `name` of a media asset created via [Media Storage API](https://developers.telnyx.com/api/media-storage/create-media-storage). The audio will loop during the call.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
