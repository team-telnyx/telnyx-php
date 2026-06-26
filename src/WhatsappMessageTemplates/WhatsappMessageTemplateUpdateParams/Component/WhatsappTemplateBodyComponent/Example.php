<?php

declare(strict_types=1);

namespace Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateBodyComponent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\ListOf;

/**
 * Sample values for body variables. Required when body text contains parameters.
 *
 * @phpstan-type ExampleShape = array{bodyText?: list<list<string>>|null}
 */
final class Example implements BaseModel
{
    /** @use SdkModel<ExampleShape> */
    use SdkModel;

    /**
     * Array containing one array of sample values, one per variable in order.
     *
     * @var list<list<string>>|null $bodyText
     */
    #[Optional('body_text', list: new ListOf('string'))]
    public ?array $bodyText;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<list<string>>|null $bodyText
     */
    public static function with(?array $bodyText = null): self
    {
        $self = new self;

        null !== $bodyText && $self['bodyText'] = $bodyText;

        return $self;
    }

    /**
     * Array containing one array of sample values, one per variable in order.
     *
     * @param list<list<string>> $bodyText
     */
    public function withBodyText(array $bodyText): self
    {
        $self = clone $this;
        $self['bodyText'] = $bodyText;

        return $self;
    }
}
