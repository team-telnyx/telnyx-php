<?php

declare(strict_types=1);

namespace Telnyx\WhatsappMessageTemplates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Category;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component;

/**
 * Update a Whatsapp message template.
 *
 * @see Telnyx\Services\WhatsappMessageTemplatesService::update()
 *
 * @phpstan-import-type ComponentVariants from \Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component
 * @phpstan-import-type ComponentShape from \Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component
 *
 * @phpstan-type WhatsappMessageTemplateUpdateParamsShape = array{
 *   category?: null|Category|value-of<Category>,
 *   components?: list<ComponentShape>|null,
 * }
 */
final class WhatsappMessageTemplateUpdateParams implements BaseModel
{
    /** @use SdkModel<WhatsappMessageTemplateUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Category>|null $category */
    #[Optional(enum: Category::class)]
    public ?string $category;

    /**
     * Updated template components. Same structure as the create request.
     *
     * @var list<ComponentVariants>|null $components
     */
    #[Optional(list: Component::class)]
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
     * @param Category|value-of<Category>|null $category
     * @param list<ComponentShape>|null $components
     */
    public static function with(
        Category|string|null $category = null,
        ?array $components = null
    ): self {
        $self = new self;

        null !== $category && $self['category'] = $category;
        null !== $components && $self['components'] = $components;

        return $self;
    }

    /**
     * @param Category|value-of<Category> $category
     */
    public function withCategory(Category|string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * Updated template components. Same structure as the create request.
     *
     * @param list<ComponentShape> $components
     */
    public function withComponents(array $components): self
    {
        $self = clone $this;
        $self['components'] = $components;

        return $self;
    }
}
