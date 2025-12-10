<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\VoiceSettings\BackgroundAudio;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MediaURLShape = array{type?: 'media_url', value: string}
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
    #[Required]
    public string $type = 'media_url';

    /**
     * HTTPS URL to an MP3 file.
     */
    #[Required]
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
        $self = new self;

        $self['value'] = $value;

        return $self;
    }

    /**
     * HTTPS URL to an MP3 file.
     */
    public function withValue(string $value): self
    {
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
