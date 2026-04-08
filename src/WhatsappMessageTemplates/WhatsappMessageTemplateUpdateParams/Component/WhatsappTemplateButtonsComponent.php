<?php

declare(strict_types=1);

namespace Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateButtonsComponent\Button;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateButtonsComponent\Type;

/**
 * Optional interactive buttons. Maximum 3 buttons per template.
 *
 * @phpstan-import-type ButtonShape from \Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateButtonsComponent\Button
 *
 * @phpstan-type WhatsappTemplateButtonsComponentShape = array{
 *   buttons: list<Button|ButtonShape>, type: Type|value-of<Type>
 * }
 */
final class WhatsappTemplateButtonsComponent implements BaseModel
{
    /** @use SdkModel<WhatsappTemplateButtonsComponentShape> */
    use SdkModel;

    /**
     * Array of button objects. Meta supports various combinations of button types.
     *
     * @var list<Button> $buttons
     */
    #[Required(list: Button::class)]
    public array $buttons;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new WhatsappTemplateButtonsComponent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WhatsappTemplateButtonsComponent::with(buttons: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WhatsappTemplateButtonsComponent)->withButtons(...)->withType(...)
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
     * @param list<Button|ButtonShape> $buttons
     * @param Type|value-of<Type> $type
     */
    public static function with(array $buttons, Type|string $type): self
    {
        $self = new self;

        $self['buttons'] = $buttons;
        $self['type'] = $type;

        return $self;
    }

    /**
     * Array of button objects. Meta supports various combinations of button types.
     *
     * @param list<Button|ButtonShape> $buttons
     */
    public function withButtons(array $buttons): self
    {
        $self = clone $this;
        $self['buttons'] = $buttons;

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
}
