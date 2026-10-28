<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\FileParam;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\ResembleClone\Gender;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\ResembleClone\Language;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\ResembleClone\ModelID;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\ResembleClone\Provider;

/**
 * Upload-based voice clone using the Resemble provider. The clone is `active` on creation. Use it as voice `Resemble.<model_id>.<clone_id>`.
 *
 * @phpstan-type ResembleCloneShape = array{
 *   audioFile: string|FileParam,
 *   gender: Gender|value-of<Gender>,
 *   modelID: ModelID|value-of<ModelID>,
 *   name: string,
 *   provider: Provider|value-of<Provider>,
 *   label?: string|null,
 *   language?: null|Language|value-of<Language>,
 * }
 */
final class ResembleClone implements BaseModel
{
    /** @use SdkModel<ResembleCloneShape> */
    use SdkModel;

    /**
     * Audio file to clone the voice from. Supported formats: WAV, MP3, FLAC, OGG, M4A. Converted to WAV and trimmed to the first 10 seconds. For best quality, provide about 10 seconds of clean, single-speaker speech. Maximum size: 20MB.
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
     * Resemble model: `Pro`, `Turbo` (English only), or `Urdu`. A clone works only with this model.
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
     * Voice synthesis provider. Must be `resemble`.
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
     * Language of the reference audio, matched case-insensitively. Pro: required, one of `ar`, `da`, `de`, `el`, `en-US`, `es`, `fi`, `fr-fr`, `he`, `hi`, `it`, `ja`, `ko`, `ms`, `nl`, `no`, `pl`, `pt`, `ru`, `sv`, `sw`, `tr`, `zh`. Turbo: `en` or `en-US` (default `en-US`). Urdu: `ur` (default). Other values return `422`.
     *
     * @var value-of<Language>|null $language
     */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /**
     * `new ResembleClone()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ResembleClone::with(
     *   audioFile: ..., gender: ..., modelID: ..., name: ..., provider: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ResembleClone)
     *   ->withAudioFile(...)
     *   ->withGender(...)
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
     * @param Language|value-of<Language>|null $language
     */
    public static function with(
        string|FileParam $audioFile,
        Gender|string $gender,
        ModelID|string $modelID,
        string $name,
        Provider|string $provider,
        ?string $label = null,
        Language|string|null $language = null,
    ): self {
        $self = new self;

        $self['audioFile'] = $audioFile;
        $self['gender'] = $gender;
        $self['modelID'] = $modelID;
        $self['name'] = $name;
        $self['provider'] = $provider;

        null !== $label && $self['label'] = $label;
        null !== $language && $self['language'] = $language;

        return $self;
    }

    /**
     * Audio file to clone the voice from. Supported formats: WAV, MP3, FLAC, OGG, M4A. Converted to WAV and trimmed to the first 10 seconds. For best quality, provide about 10 seconds of clean, single-speaker speech. Maximum size: 20MB.
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
     * Resemble model: `Pro`, `Turbo` (English only), or `Urdu`. A clone works only with this model.
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
     * Voice synthesis provider. Must be `resemble`.
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
     * Language of the reference audio, matched case-insensitively. Pro: required, one of `ar`, `da`, `de`, `el`, `en-US`, `es`, `fi`, `fr-fr`, `he`, `hi`, `it`, `ja`, `ko`, `ms`, `nl`, `no`, `pl`, `pt`, `ru`, `sv`, `sw`, `tr`, `zh`. Turbo: `en` or `en-US` (default `en-US`). Urdu: `ur` (default). Other values return `422`.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }
}
