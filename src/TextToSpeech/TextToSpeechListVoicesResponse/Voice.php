<?php

declare(strict_types=1);

namespace Telnyx\TextToSpeech\TextToSpeechListVoicesResponse;

use Telnyx\Core\Attributes\Api;
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

    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?string $accent;

    #[Api(optional: true)]
    public ?string $age;

    #[Api(optional: true)]
    public ?string $gender;

    #[Api(optional: true)]
    public ?string $label;

    #[Api(optional: true)]
    public ?string $language;

    #[Api(optional: true)]
    public ?string $name;

    #[Api(optional: true)]
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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $accent && $obj['accent'] = $accent;
        null !== $age && $obj['age'] = $age;
        null !== $gender && $obj['gender'] = $gender;
        null !== $label && $obj['label'] = $label;
        null !== $language && $obj['language'] = $language;
        null !== $name && $obj['name'] = $name;
        null !== $provider && $obj['provider'] = $provider;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withAccent(string $accent): self
    {
        $obj = clone $this;
        $obj['accent'] = $accent;

        return $obj;
    }

    public function withAge(string $age): self
    {
        $obj = clone $this;
        $obj['age'] = $age;

        return $obj;
    }

    public function withGender(string $gender): self
    {
        $obj = clone $this;
        $obj['gender'] = $gender;

        return $obj;
    }

    public function withLabel(string $label): self
    {
        $obj = clone $this;
        $obj['label'] = $label;

        return $obj;
    }

    public function withLanguage(string $language): self
    {
        $obj = clone $this;
        $obj['language'] = $language;

        return $obj;
    }

    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    public function withProvider(string $provider): self
    {
        $obj = clone $this;
        $obj['provider'] = $provider;

        return $obj;
    }
}
