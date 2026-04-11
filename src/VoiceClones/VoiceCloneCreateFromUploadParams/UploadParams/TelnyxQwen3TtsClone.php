<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\FileParam;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams\TelnyxQwen3TtsClone\Gender;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams\TelnyxQwen3TtsClone\ModelID;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\UploadParams\TelnyxQwen3TtsClone\Provider;

/**
 * Upload-based voice clone using the Telnyx Qwen3TTS model (default).
 *
 * @phpstan-type TelnyxQwen3TtsCloneShape = array{
 *   audioFile: string|FileParam,
 *   gender: Gender|value-of<Gender>,
 *   language: string,
 *   name: string,
 *   provider: Provider|value-of<Provider>,
 *   label?: string|null,
 *   modelID?: null|ModelID|value-of<ModelID>,
 *   refText?: string|null,
 * }
 */
final class TelnyxQwen3TtsClone implements BaseModel
{
    /** @use SdkModel<TelnyxQwen3TtsCloneShape> */
    use SdkModel;

    /**
     * Audio file to clone the voice from. Supported formats: WAV, MP3, FLAC, OGG, M4A. For best quality, provide 5–10 seconds of clear, uninterrupted speech. Maximum size: 5MB.
     */
    #[Required('audio_file')]
    public string $audioFile;

    /**
     * Gender of the voice clone.
     *
     * @var value-of<Gender> $gender
     */
    #[Required(enum: Gender::class)]
    public string $gender;

    /**
     * ISO 639-1 language code from the Qwen language set.
     */
    #[Required]
    public string $language;

    /**
     * Name for the voice clone.
     */
    #[Required]
    public string $name;

    /**
     * Voice synthesis provider. Must be `telnyx`.
     *
     * @var value-of<Provider> $provider
     */
    #[Required(enum: Provider::class)]
    public string $provider;

    /**
     * Optional custom label describing the voice style.
     */
    #[Optional]
    public ?string $label;

    /**
     * TTS model identifier. Nullable/omittable — defaults to Qwen3TTS.
     *
     * @var value-of<ModelID>|null $modelID
     */
    #[Optional('model_id', enum: ModelID::class, nullable: true)]
    public ?string $modelID;

    /**
     * Optional transcript of the audio file. Providing this improves clone quality.
     */
    #[Optional('ref_text')]
    public ?string $refText;

    /**
     * `new TelnyxQwen3TtsClone()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TelnyxQwen3TtsClone::with(
     *   audioFile: ..., gender: ..., language: ..., name: ..., provider: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TelnyxQwen3TtsClone)
     *   ->withAudioFile(...)
     *   ->withGender(...)
     *   ->withLanguage(...)
     *   ->withName(...)
     *   ->withProvider(...)
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
     * @param Gender|value-of<Gender> $gender
     * @param Provider|value-of<Provider> $provider
     * @param ModelID|value-of<ModelID>|null $modelID
     */
    public static function with(
        string|FileParam $audioFile,
        Gender|string $gender,
        string $language,
        string $name,
        Provider|string $provider,
        ?string $label = null,
        ModelID|string|null $modelID = null,
        ?string $refText = null,
    ): self {
        $self = new self;

        $self['audioFile'] = $audioFile;
        $self['gender'] = $gender;
        $self['language'] = $language;
        $self['name'] = $name;
        $self['provider'] = $provider;

        null !== $label && $self['label'] = $label;
        null !== $modelID && $self['modelID'] = $modelID;
        null !== $refText && $self['refText'] = $refText;

        return $self;
    }

    /**
     * Audio file to clone the voice from. Supported formats: WAV, MP3, FLAC, OGG, M4A. For best quality, provide 5–10 seconds of clear, uninterrupted speech. Maximum size: 5MB.
     */
    public function withAudioFile(string|FileParam $audioFile): self
    {
        $self = clone $this;
        $self['audioFile'] = $audioFile;

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
     * ISO 639-1 language code from the Qwen language set.
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
     * Voice synthesis provider. Must be `telnyx`.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * Optional custom label describing the voice style.
     */
    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    /**
     * TTS model identifier. Nullable/omittable — defaults to Qwen3TTS.
     *
     * @param ModelID|value-of<ModelID>|null $modelID
     */
    public function withModelID(ModelID|string|null $modelID): self
    {
        $self = clone $this;
        $self['modelID'] = $modelID;

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
