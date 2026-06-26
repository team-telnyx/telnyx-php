<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones\VoiceCloneCreateParams\Params;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Params\MinimaxDesignClone\Gender;
use Telnyx\VoiceClones\VoiceCloneCreateParams\Params\MinimaxDesignClone\Provider;

/**
 * Create a voice clone from a voice design using the Minimax provider.
 *
 * @phpstan-type MinimaxDesignCloneShape = array{
 *   gender: Gender|value-of<Gender>,
 *   language: string,
 *   name: string,
 *   provider: Provider|value-of<Provider>,
 *   voiceDesignID: string,
 * }
 */
final class MinimaxDesignClone implements BaseModel
{
    /** @use SdkModel<MinimaxDesignCloneShape> */
    use SdkModel;

    /**
     * Gender of the voice clone.
     *
     * @var value-of<Gender> $gender
     */
    #[Required(enum: Gender::class)]
    public string $gender;

    /**
     * ISO 639-1 language code for the clone. Supports the Minimax language set.
     */
    #[Required]
    public string $language;

    /**
     * Name for the voice clone.
     */
    #[Required]
    public string $name;

    /**
     * Voice synthesis provider. Must be `minimax`.
     *
     * @var value-of<Provider> $provider
     */
    #[Required(enum: Provider::class)]
    public string $provider;

    /**
     * UUID of the source voice design to clone.
     */
    #[Required('voice_design_id')]
    public string $voiceDesignID;

    /**
     * `new MinimaxDesignClone()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MinimaxDesignClone::with(
     *   gender: ..., language: ..., name: ..., provider: ..., voiceDesignID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MinimaxDesignClone)
     *   ->withGender(...)
     *   ->withLanguage(...)
     *   ->withName(...)
     *   ->withProvider(...)
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
     * @param Provider|value-of<Provider> $provider
     */
    public static function with(
        Gender|string $gender,
        string $language,
        string $name,
        Provider|string $provider,
        string $voiceDesignID,
    ): self {
        $self = new self;

        $self['gender'] = $gender;
        $self['language'] = $language;
        $self['name'] = $name;
        $self['provider'] = $provider;
        $self['voiceDesignID'] = $voiceDesignID;

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
     * ISO 639-1 language code for the clone. Supports the Minimax language set.
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
     * Voice synthesis provider. Must be `minimax`.
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
     * UUID of the source voice design to clone.
     */
    public function withVoiceDesignID(string $voiceDesignID): self
    {
        $self = clone $this;
        $self['voiceDesignID'] = $voiceDesignID;

        return $self;
    }
}
