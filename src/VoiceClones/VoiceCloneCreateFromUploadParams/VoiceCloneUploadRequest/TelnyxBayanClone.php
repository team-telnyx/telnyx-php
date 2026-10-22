<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\FileParam;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\TelnyxBayanClone\Gender;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\TelnyxBayanClone\Language;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\TelnyxBayanClone\ModelID;
use Telnyx\VoiceClones\VoiceCloneCreateFromUploadParams\VoiceCloneUploadRequest\TelnyxBayanClone\Provider;

/**
 * Upload-based voice clone using the Telnyx Bayan model (Arabic and English). The clone is `active` on creation. Use it as voice `Telnyx.Bayan.<clone_id>`.
 *
 * @phpstan-type TelnyxBayanCloneShape = array{
 *   audioFile: string|FileParam,
 *   gender: Gender|value-of<Gender>,
 *   modelID: ModelID|value-of<ModelID>,
 *   name: string,
 *   refText: string,
 *   label?: string|null,
 *   language?: null|Language|value-of<Language>,
 *   provider?: null|Provider|value-of<Provider>,
 * }
 */
final class TelnyxBayanClone implements BaseModel
{
    /** @use SdkModel<TelnyxBayanCloneShape> */
    use SdkModel;

    /**
     * Audio file to clone the voice from. Supported formats: WAV, MP3, FLAC, OGG, M4A. Converted to 24 kHz mono WAV and trimmed to the first 10 seconds. For best quality, provide about 10 seconds of clean, single-speaker speech. Maximum size: 20MB.
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
     * TTS model identifier. Must be `Bayan`.
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
     * Exact transcript of the reference audio. Required for Bayan: a missing, empty, or whitespace-only value returns `422` with `source.pointer` `/ref_text`. An inaccurate transcript can make synthesis with the clone truncated or garbled. Record a known script of about 10 seconds and pass it verbatim.
     */
    #[Required('ref_text')]
    public string $refText;

    /**
     * Optional custom label describing the voice style.
     */
    #[Optional]
    public ?string $label;

    /**
     * Language of the reference audio: `ar` (Arabic) or `en` (English). Defaults to `ar`. Other values return `422`.
     *
     * @var value-of<Language>|null $language
     */
    #[Optional(enum: Language::class)]
    public ?string $language;

    /**
     * Voice synthesis provider. Defaults to `telnyx`.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Optional(enum: Provider::class)]
    public ?string $provider;

    /**
     * `new TelnyxBayanClone()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TelnyxBayanClone::with(
     *   audioFile: ..., gender: ..., modelID: ..., name: ..., refText: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TelnyxBayanClone)
     *   ->withAudioFile(...)
     *   ->withGender(...)
     *   ->withModelID(...)
     *   ->withName(...)
     *   ->withRefText(...)
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
     * @param Language|value-of<Language>|null $language
     * @param Provider|value-of<Provider>|null $provider
     */
    public static function with(
        string|FileParam $audioFile,
        Gender|string $gender,
        ModelID|string $modelID,
        string $name,
        string $refText,
        ?string $label = null,
        Language|string|null $language = null,
        Provider|string|null $provider = null,
    ): self {
        $self = new self;

        $self['audioFile'] = $audioFile;
        $self['gender'] = $gender;
        $self['modelID'] = $modelID;
        $self['name'] = $name;
        $self['refText'] = $refText;

        null !== $label && $self['label'] = $label;
        null !== $language && $self['language'] = $language;
        null !== $provider && $self['provider'] = $provider;

        return $self;
    }

    /**
     * Audio file to clone the voice from. Supported formats: WAV, MP3, FLAC, OGG, M4A. Converted to 24 kHz mono WAV and trimmed to the first 10 seconds. For best quality, provide about 10 seconds of clean, single-speaker speech. Maximum size: 20MB.
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
     * TTS model identifier. Must be `Bayan`.
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
     * Exact transcript of the reference audio. Required for Bayan: a missing, empty, or whitespace-only value returns `422` with `source.pointer` `/ref_text`. An inaccurate transcript can make synthesis with the clone truncated or garbled. Record a known script of about 10 seconds and pass it verbatim.
     */
    public function withRefText(string $refText): self
    {
        $self = clone $this;
        $self['refText'] = $refText;

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
     * Language of the reference audio: `ar` (Arabic) or `en` (English). Defaults to `ar`. Other values return `422`.
     *
     * @param Language|value-of<Language> $language
     */
    public function withLanguage(Language|string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Voice synthesis provider. Defaults to `telnyx`.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }
}
