<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\MessageTemplates;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateUpdateParams\Category;

/**
 * Update a Whatsapp message template.
 *
 * @see Telnyx\Services\Whatsapp\MessageTemplatesService::update()
 *
 * @phpstan-type MessageTemplateUpdateParamsShape = array{
 *   category?: null|Category|value-of<Category>,
 *   components?: list<array<string,mixed>>|null,
 * }
 */
final class MessageTemplateUpdateParams implements BaseModel
{
    /** @use SdkModel<MessageTemplateUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Category>|null $category */
    #[Optional(enum: Category::class)]
    public ?string $category;

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
     * @param Category|value-of<Category>|null $category
     * @param list<array<string,mixed>>|null $components
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
     * @param list<array<string,mixed>> $components
     */
    public function withComponents(array $components): self
    {
        $self = clone $this;
        $self['components'] = $components;

        return $self;
    }
}
