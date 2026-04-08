<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Templates\TemplateCreateParams\Component;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateButtonsComponent\Button;

/**
 * Optional interactive buttons. Maximum 3 buttons per template.
 *
 * @phpstan-import-type ButtonShape from \Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateButtonsComponent\Button
 *
 * @phpstan-type WhatsappTemplateButtonsComponentShape = array{
 *   buttons: list<Button|ButtonShape>, type: 'BUTTONS'
 * }
 */
final class WhatsappTemplateButtonsComponent implements BaseModel
{
    /** @use SdkModel<WhatsappTemplateButtonsComponentShape> */
    use SdkModel;

    /** @var 'BUTTONS' $type */
    #[Required]
    public string $type = 'BUTTONS';

    /**
     * Array of button objects. Meta supports various combinations of button types.
     *
     * @var list<Button> $buttons
     */
    #[Required(list: Button::class)]
    public array $buttons;

    /**
     * `new WhatsappTemplateButtonsComponent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WhatsappTemplateButtonsComponent::with(buttons: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WhatsappTemplateButtonsComponent)->withButtons(...)
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
     */
    public static function with(array $buttons): self
    {
        $self = new self;

        $self['buttons'] = $buttons;

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
     * @param 'BUTTONS' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
