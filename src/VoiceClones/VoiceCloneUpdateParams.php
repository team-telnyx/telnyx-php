<?php

declare(strict_types=1);

namespace Telnyx\VoiceClones;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceClones\VoiceCloneUpdateParams\Gender;

/**
 * Updates the name, language, or gender of a voice clone.
 *
 * @see Telnyx\Services\VoiceClonesService::update()
 *
 * @phpstan-type VoiceCloneUpdateParamsShape = array{
 *   name: string, gender?: null|Gender|value-of<Gender>, language?: string|null
 * }
 */
final class VoiceCloneUpdateParams implements BaseModel
{
    /** @use SdkModel<VoiceCloneUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * New name for the voice clone.
     */
    #[Required]
    public string $name;

    /**
     * Updated gender for the voice clone.
     *
     * @var value-of<Gender>|null $gender
     */
    #[Optional(enum: Gender::class)]
    public ?string $gender;

    /**
     * Updated ISO 639-1 language code or `auto`.
     */
    #[Optional]
    public ?string $language;

    /**
     * `new VoiceCloneUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceCloneUpdateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VoiceCloneUpdateParams)->withName(...)
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
        string $name,
        Gender|string|null $gender = null,
        ?string $language = null
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $gender && $self['gender'] = $gender;
        null !== $language && $self['language'] = $language;

        return $self;
    }

    /**
     * New name for the voice clone.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Updated gender for the voice clone.
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
     * Updated ISO 639-1 language code or `auto`.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }
}
