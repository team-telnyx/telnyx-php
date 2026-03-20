<?php

declare(strict_types=1);

namespace Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateHeaderComponent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Sample values for header variables.
 *
 * @phpstan-type ExampleShape = array{
 *   headerHandle?: list<string>|null, headerText?: list<string>|null
 * }
 */
final class Example implements BaseModel
{
    /** @use SdkModel<ExampleShape> */
    use SdkModel;

    /**
     * Media handle for IMAGE, VIDEO, or DOCUMENT headers.
     *
     * @var list<string>|null $headerHandle
     */
    #[Optional('header_handle', list: 'string')]
    public ?array $headerHandle;

    /**
     * Sample values for text header variables.
     *
     * @var list<string>|null $headerText
     */
    #[Optional('header_text', list: 'string')]
    public ?array $headerText;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string>|null $headerHandle
     * @param list<string>|null $headerText
     */
    public static function with(
        ?array $headerHandle = null,
        ?array $headerText = null
    ): self {
        $self = new self;

        null !== $headerHandle && $self['headerHandle'] = $headerHandle;
        null !== $headerText && $self['headerText'] = $headerText;

        return $self;
    }

    /**
     * Media handle for IMAGE, VIDEO, or DOCUMENT headers.
     *
     * @param list<string> $headerHandle
     */
    public function withHeaderHandle(array $headerHandle): self
    {
        $self = clone $this;
        $self['headerHandle'] = $headerHandle;

        return $self;
    }

    /**
     * Sample values for text header variables.
     *
     * @param list<string> $headerText
     */
    public function withHeaderText(array $headerText): self
    {
        $self = clone $this;
        $self['headerText'] = $headerText;

        return $self;
    }
}
