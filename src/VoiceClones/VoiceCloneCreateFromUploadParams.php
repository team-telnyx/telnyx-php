<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Gender;

/**
 * Creates a new voice clone by uploading an audio file directly. Supported formats: WAV, MP3, FLAC, OGG, M4A. For best results, provide 5–10 seconds of clear speech. Maximum file size: 2MB.
 *
 * @see Telnyx\Services\VoiceClonesService::createFromUpload()
 *
 * @phpstan-type VoiceCloneCreateFromUploadParamsShape = array{
 *   audioFile: string,
 *   language: string,
 *   name: string,
 *   gender?: null|Gender|value-of<Gender>,
 *   label?: string|null,
 *   refText?: string|null,
 * }
 */
final class VoiceCloneCreateFromUploadParams implements BaseModel
{
    /** @use SdkModel<VoiceCloneCreateFromUploadParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Audio file to clone the voice from. Supported formats: WAV, MP3, FLAC, OGG, M4A. For best quality, provide 5–10 seconds of clear, uninterrupted speech. Maximum size: 2MB.
     */
    #[Required('audio_file')]
    public string $audioFile;

    /**
     * ISO 639-1 language code (e.g. `en`, `fr`) or `auto` for automatic detection.
     */
    #[Required]
    public string $language;

    /**
     * Name for the voice clone.
     */
    #[Required]
    public string $name;

    /**
     * Gender of the voice clone.
     *
     * @var value-of<Gender>|null $gender
     */
    #[Optional(enum: Gender::class)]
    public ?string $gender;

    /**
     * Optional custom label describing the voice style. If omitted, falls back to the source design's prompt text.
     */
    #[Optional]
    public ?string $label;

    /**
     * Optional transcript of the audio file. Providing this improves clone quality.
     */
    #[Optional('ref_text')]
    public ?string $refText;

    /**
     * `new VoiceCloneCreateFromUploadParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceCloneCreateFromUploadParams::with(audioFile: ..., language: ..., name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VoiceCloneCreateFromUploadParams)
     *   ->withAudioFile(...)
     *   ->withLanguage(...)
     *   ->withName(...)
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
     * @param Gender|value-of<Gender>|null $gender
     */
    public static function with(
        string $audioFile,
        string $language,
        string $name,
        Gender|string|null $gender = null,
        ?string $label = null,
        ?string $refText = null,
    ): self {
        $self = new self;

        $self['audioFile'] = $audioFile;
        $self['language'] = $language;
        $self['name'] = $name;

        null !== $gender && $self['gender'] = $gender;
        null !== $label && $self['label'] = $label;
        null !== $refText && $self['refText'] = $refText;

        return $self;
    }

    /**
     * Audio file to clone the voice from. Supported formats: WAV, MP3, FLAC, OGG, M4A. For best quality, provide 5–10 seconds of clear, uninterrupted speech. Maximum size: 2MB.
     */
    public function withAudioFile(string $audioFile): self
    {
        $self = clone $this;
        $self['audioFile'] = $audioFile;

        return $self;
    }

    /**
     * ISO 639-1 language code (e.g. `en`, `fr`) or `auto` for automatic detection.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Name for the voice clone.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Gender of the voice clone.
     *
     * @param Gender|value-of<Gender> $gender
     */
    public function withGender(Gender|string $gender): self
    {
        $self = clone $this;
        $self['gender'] = $gender;

        return $self;
    }

    /**
     * Optional custom label describing the voice style. If omitted, falls back to the source design's prompt text.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * Optional transcript of the audio file. Providing this improves clone quality.
     */
    public function withRefText(string $refText): self
    {
        $self = clone $this;
        $self['refText'] = $refText;

        return $self;
    }
}
