<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Templates\TemplateCreateParams\Component;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateBodyComponent\Example;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateBodyComponent\Type;

/**
 * The main text content of the message. Supports multiple variable parameters ({{1}}, {{2}}, etc.). Variables cannot be at the start or end. Maximum 1024 characters.
 *
 * @phpstan-import-type ExampleShape from \Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateBodyComponent\Example
 *
 * @phpstan-type WhatsappTemplateBodyComponentShape = array{
 *   type: Type|value-of<Type>,
 *   example?: null|Example|ExampleShape,
 *   text?: string|null,
 * }
 */
final class WhatsappTemplateBodyComponent implements BaseModel
{
    /** @use SdkModel<WhatsappTemplateBodyComponentShape> */
    use SdkModel;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * Sample values for body variables. Required when body text contains parameters.
     */
    #[Optional]
    public ?Example $example;

    /**
     * Body text content. Use {{1}}, {{2}}, etc. for variable placeholders. Required for MARKETING and UTILITY templates. Optional for AUTHENTICATION templates where Meta provides the built-in OTP body.
     */
    #[Optional]
    public ?string $text;

    /**
     * `new WhatsappTemplateBodyComponent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WhatsappTemplateBodyComponent::with(type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WhatsappTemplateBodyComponent)->withType(...)
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
     * @param Example|ExampleShape|null $example
     */
    public static function with(
        Type|string $type,
        Example|array|null $example = null,
        ?string $text = null
    ): self {
        $self = new self;

        $self['type'] = $type;

        null !== $example && $self['example'] = $example;
        null !== $text && $self['text'] = $text;

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
     * Sample values for body variables. Required when body text contains parameters.
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
     * Body text content. Use {{1}}, {{2}}, etc. for variable placeholders. Required for MARKETING and UTILITY templates. Optional for AUTHENTICATION templates where Meta provides the built-in OTP body.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }
}
