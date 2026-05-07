<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\XaiVoiceSettings\Type;

/**
 * @phpstan-type XaiVoiceSettingsShape = array{
 *   type: Type|value-of<Type>, language?: string|null
 * }
 */
final class XaiVoiceSettings implements BaseModel
{
    /** @use SdkModel<XaiVoiceSettingsShape> */
    use SdkModel;

    /**
     * Voice settings provider type.
     *
     * @var value-of<Type> $type
     */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * Language code, or `auto` to detect automatically.
     */
    #[Optional]
    public ?string $language;

    /**
     * `new XaiVoiceSettings()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * XaiVoiceSettings::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new XaiVoiceSettings)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        Type|string $type,
        ?string $language = null
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $language && $self['language'] = $language;

        return $self;
    }

    /**
     * Voice settings provider type.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Language code, or `auto` to detect automatically.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }
}
