<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Gender;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Provider;

/**
 * Creates a new voice clone by capturing the voice identity of an existing voice design. The clone can then be used for text-to-speech synthesis.
 *
 * @see Telnyx\Services\VoiceClonesService::create()
 *
 * @phpstan-type VoiceCloneCreateParamsShape = array{
 *   gender: Gender|value-of<Gender>,
 *   language: string,
 *   name: string,
 *   voiceDesignID: string,
 *   provider?: null|Provider|value-of<Provider>,
 * }
 */
final class VoiceCloneCreateParams implements BaseModel
{
    /** @use SdkModel<VoiceCloneCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Gender of the voice clone.
     *
     * @var value-of<Gender> $gender
     */
    #[Required(enum: Gender::class)]
    public string $gender;

    /**
     * ISO 639-1 language code for the clone (e.g. `en`, `fr`, `de`).
     */
    #[Required]
    public string $language;

    /**
     * Name for the voice clone.
     */
    #[Required]
    public string $name;

    /**
     * UUID of the source voice design to clone.
     */
    #[Required('voice_design_id')]
    public string $voiceDesignID;

    /**
     * Voice synthesis provider. Case-insensitive. Defaults to `telnyx`.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Optional(enum: Provider::class)]
    public ?string $provider;

    /**
     * `new VoiceCloneCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceCloneCreateParams::with(
     *   gender: ..., language: ..., name: ..., voiceDesignID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VoiceCloneCreateParams)
     *   ->withGender(...)
     *   ->withLanguage(...)
     *   ->withName(...)
     *   ->withVoiceDesignID(...)
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
     * @param Provider|value-of<Provider>|null $provider
     */
    public static function with(
        Gender|string $gender,
        string $language,
        string $name,
        string $voiceDesignID,
        Provider|string|null $provider = null,
    ): self {
        $self = new self;

        $self['gender'] = $gender;
        $self['language'] = $language;
        $self['name'] = $name;
        $self['voiceDesignID'] = $voiceDesignID;

        null !== $provider && $self['provider'] = $provider;

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
     * ISO 639-1 language code for the clone (e.g. `en`, `fr`, `de`).
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
     * UUID of the source voice design to clone.
     */
    public function withVoiceDesignID(string $voiceDesignID): self
    {
        $self = clone $this;
        $self['voiceDesignID'] = $voiceDesignID;

        return $self;
    }

    /**
     * Voice synthesis provider. Case-insensitive. Defaults to `telnyx`.
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
