<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\TelnyxUltraClone\Gender;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\TelnyxUltraClone\ModelID;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\Params\TelnyxUltraClone\Provider;

/**
 * Upload-based voice clone using the Telnyx Ultra model.
 *
 * @phpstan-type TelnyxUltraCloneShape = array{
 *   audioFile: string,
 *   gender: Gender|value-of<Gender>,
 *   language: string,
 *   modelID: ModelID|value-of<ModelID>,
 *   name: string,
 *   provider: Provider|value-of<Provider>,
 *   label?: string|null,
 *   refText?: string|null,
 * }
 */
final class TelnyxUltraClone implements BaseModel
{
    /** @use SdkModel<TelnyxUltraCloneShape> */
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
     * ISO 639-1 language code from the Ultra language set (40 languages).
     */
    #[Required]
    public string $language;

    /**
     * TTS model identifier. Must be `Ultra`.
     *
     * @var value-of<ModelID> $modelID
     */
    #[Required('model_id', enum: ModelID::class)]
    public string $modelID;

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
     * Optional transcript of the audio file. Providing this improves clone quality.
     */
    #[Optional('ref_text')]
    public ?string $refText;

    /**
     * `new TelnyxUltraClone()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TelnyxUltraClone::with(
     *   audioFile: ...,
     *   gender: ...,
     *   language: ...,
     *   modelID: ...,
     *   name: ...,
     *   provider: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TelnyxUltraClone)
     *   ->withAudioFile(...)
     *   ->withGender(...)
     *   ->withLanguage(...)
     *   ->withModelID(...)
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
     * @param ModelID|value-of<ModelID> $modelID
     * @param Provider|value-of<Provider> $provider
     */
    public static function with(
        string $audioFile,
        Gender|string $gender,
        string $language,
        ModelID|string $modelID,
        string $name,
        Provider|string $provider,
        ?string $label = null,
        ?string $refText = null,
    ): self {
        $self = new self;

        $self['audioFile'] = $audioFile;
        $self['gender'] = $gender;
        $self['language'] = $language;
        $self['modelID'] = $modelID;
        $self['name'] = $name;
        $self['provider'] = $provider;

        null !== $label && $self['label'] = $label;
        null !== $refText && $self['refText'] = $refText;

        return $self;
    }

    /**
     * Audio file to clone the voice from. Supported formats: WAV, MP3, FLAC, OGG, M4A. For best quality, provide 5–10 seconds of clear, uninterrupted speech. Maximum size: 5MB.
     */
    public function withAudioFile(string $audioFile): self
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
     * ISO 639-1 language code from the Ultra language set (40 languages).
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * TTS model identifier. Must be `Ultra`.
     *
     * @param ModelID|value-of<ModelID> $modelID
     */
    public function withModelID(ModelID|string $modelID): self
    {
        $self = clone $this;
        $self['modelID'] = $modelID;

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
     * Optional transcript of the audio file. Providing this improves clone quality.
     */
    public function withRefText(string $refText): self
    {
        $self = clone $this;
        $self['refText'] = $refText;

        return $self;
    }
}
