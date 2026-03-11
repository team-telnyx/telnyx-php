<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Templates;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Category;

/**
 * Create a Whatsapp message template.
 *
 * @see Telnyx\Services\Whatsapp\TemplatesService::create()
 *
 * @phpstan-type TemplateCreateParamsShape = array{
 *   category: Category|value-of<Category>,
 *   components: list<array<string,mixed>>,
 *   language: string,
 *   name: string,
 *   wabaID: string,
 * }
 */
final class TemplateCreateParams implements BaseModel
{
    /** @use SdkModel<TemplateCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /** @var value-of<Category> $category */
    #[Required(enum: Category::class)]
    public string $category;

    /** @var list<array<string,mixed>> $components */
    #[Required(list: new MapOf('mixed'))]
    public array $components;

    #[Required]
    public string $language;

    #[Required]
    public string $name;

    #[Required('waba_id')]
    public string $wabaID;

    /**
     * `new TemplateCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TemplateCreateParams::with(
     *   category: ..., components: ..., language: ..., name: ..., wabaID: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TemplateCreateParams)
     *   ->withCategory(...)
     *   ->withComponents(...)
     *   ->withLanguage(...)
     *   ->withName(...)
     *   ->withWabaID(...)
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
     * @param Category|value-of<Category> $category
     * @param list<array<string,mixed>> $components
     */
    public static function with(
        Category|string $category,
        array $components,
        string $language,
        string $name,
        string $wabaID,
    ): self {
        $self = new self;

        $self['category'] = $category;
        $self['components'] = $components;
        $self['language'] = $language;
        $self['name'] = $name;
        $self['wabaID'] = $wabaID;

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

    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withWabaID(string $wabaID): self
    {
        $self = clone $this;
        $self['wabaID'] = $wabaID;

        return $self;
    }
}
