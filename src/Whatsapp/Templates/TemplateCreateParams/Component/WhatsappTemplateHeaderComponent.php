<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Templates\TemplateCreateParams\Component;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateHeaderComponent\Example;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateHeaderComponent\Format;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateHeaderComponent\Type;

/**
 * Optional header displayed at the top of the message.
 *
 * @phpstan-import-type ExampleShape from \Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateHeaderComponent\Example
 *
 * @phpstan-type WhatsappTemplateHeaderComponentShape = array{
 *   format: Format|value-of<Format>,
 *   type: Type|value-of<Type>,
 *   example?: null|Example|ExampleShape,
 *   text?: string|null,
 * }
 */
final class WhatsappTemplateHeaderComponent implements BaseModel
{
    /** @use SdkModel<WhatsappTemplateHeaderComponentShape> */
    use SdkModel;

    /**
     * Header format type: TEXT (supports one variable), IMAGE, VIDEO, DOCUMENT, or LOCATION.
     *
     * @var value-of<Format> $format
     */
    #[Required(enum: Format::class)]
    public string $format;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * Sample values for header variables.
     */
    #[Optional]
    public ?Example $example;

    /**
     * Header text. Required when format is TEXT. Supports one variable ({{1}}). Variables cannot be at the start or end.
     */
    #[Optional]
    public ?string $text;

    /**
     * `new WhatsappTemplateHeaderComponent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WhatsappTemplateHeaderComponent::with(format: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WhatsappTemplateHeaderComponent)->withFormat(...)->withType(...)
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
     * @param Format|value-of<Format> $format
     * @param Type|value-of<Type> $type
     * @param Example|ExampleShape|null $example
     */
    public static function with(
        Format|string $format,
        Type|string $type,
        Example|array|null $example = null,
        ?string $text = null,
    ): self {
        $self = new self;

        $self['format'] = $format;
        $self['type'] = $type;

        null !== $example && $self['example'] = $example;
        null !== $text && $self['text'] = $text;

        return $self;
    }

    /**
     * Header format type: TEXT (supports one variable), IMAGE, VIDEO, DOCUMENT, or LOCATION.
     *
     * @param Format|value-of<Format> $format
     */
    public function withFormat(Format|string $format): self
    {
        $self = clone $this;
        $self['format'] = $format;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Sample values for header variables.
     *
     * @param Example|ExampleShape $example
     */
    public function withExample(Example|array $example): self
    {
        $self = clone $this;
        $self['example'] = $example;

        return $self;
    }

    /**
     * Header text. Required when format is TEXT. Supports one variable ({{1}}). Variables cannot be at the start or end.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
