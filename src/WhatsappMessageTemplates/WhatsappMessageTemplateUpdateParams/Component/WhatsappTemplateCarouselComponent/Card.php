<?php

declare(strict_types=1);

namespace Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateCarouselComponent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;

/**
 * @phpstan-type CardShape = array{components?: list<array<string,mixed>>|null}
 */
final class Card implements BaseModel
{
    /** @use SdkModel<CardShape> */
    use SdkModel;

    /** @var list<array<string,mixed>>|null $components */
    #[Optional(list: new MapOf('mixed'))]
    public ?array $components;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<array<string,mixed>>|null $components
     */
    public static function with(?array $components = null): self
    {
        $self = new self;

        null !== $components && $self['components'] = $components;

        return $self;
    }

    /**
     * @param list<array<string,mixed>> $components
     */
    public function withComponents(array $components): self
    {
        $self = clone $this;
        $self['components'] = $components;

        return $self;
    }
}
