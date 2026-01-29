<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type VoiceShape = array{
 *   id?: string|null,
 *   accent?: string|null,
 *   age?: string|null,
 *   gender?: string|null,
 *   label?: string|null,
 *   language?: string|null,
 *   name?: string|null,
 *   provider?: string|null,
 * }
 */
final class Voice implements BaseModel
{
    /** @use SdkModel<VoiceShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $accent;

    #[Optional]
    public ?string $age;

    #[Optional]
    public ?string $gender;

    #[Optional]
    public ?string $label;

    #[Optional]
    public ?string $language;

    #[Optional]
    public ?string $name;

    #[Optional]
    public ?string $provider;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $id = null,
        ?string $accent = null,
        ?string $age = null,
        ?string $gender = null,
        ?string $label = null,
        ?string $language = null,
        ?string $name = null,
        ?string $provider = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $accent && $self['accent'] = $accent;
        null !== $age && $self['age'] = $age;
        null !== $gender && $self['gender'] = $gender;
        null !== $label && $self['label'] = $label;
        null !== $language && $self['language'] = $language;
        null !== $name && $self['name'] = $name;
        null !== $provider && $self['provider'] = $provider;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withAccent(string $accent): self
    {
        $self = clone $this;
        $self['accent'] = $accent;

        return $self;
    }

    public function withAge(string $age): self
    {
        $self = clone $this;
        $self['age'] = $age;

        return $self;
    }

    public function withGender(string $gender): self
    {
        $self = clone $this;
        $self['gender'] = $gender;

        return $self;
    }

    public function withLabel(string $label): self
    {
        $self = clone $this;
        $self['label'] = $label;

        return $self;
    }

    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withProvider(string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }
}
