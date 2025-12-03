<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaURLShape = array{type: 'media_url', value: string}
 */
final class MediaURL implements BaseModel
{
    /** @use SdkModel<MediaURLShape> */
    use SdkModel;

    /**
     * Provide a direct URL to an MP3 file. The audio will loop during the call.
     *
     * @var 'media_url' $type
     */
    #[Api]
    public string $type = 'media_url';

    /**
     * HTTPS URL to an MP3 file.
     */
    #[Api]
    public string $value;

    /**
     * `new MediaURL()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MediaURL::with(value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MediaURL)->withValue(...)
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
     * HTTPS URL to an MP3 file.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj->value = $value;

        return $obj;
    }
}
