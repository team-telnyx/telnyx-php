<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Templates;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Category;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component;

/**
 * Create a Whatsapp message template.
 *
 * @see Telnyx\Services\Whatsapp\TemplatesService::create()
 *
 * @phpstan-import-type ComponentVariants from \Telnyx\Whatsapp\Templates\TemplateCreateParams\Component
 * @phpstan-import-type ComponentShape from \Telnyx\Whatsapp\Templates\TemplateCreateParams\Component
 *
 * @phpstan-type TemplateCreateParamsShape = array{
 *   category: Category|value-of<Category>,
 *   components: list<ComponentShape>,
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

    /**
     * Template category: AUTHENTICATION, UTILITY, or MARKETING.
     *
     * @var value-of<Category> $category
     */
    #[Required(enum: Category::class)]
    public string $category;

    /**
     * Template components defining message structure. Passed through to Meta Graph API. Templates with variables must include example values. Supports HEADER, BODY, FOOTER, BUTTONS, CAROUSEL and any future Meta component types.
     *
     * @var list<ComponentVariants> $components
     */
    #[Required(list: Component::class)]
    public array $components;

    /**
     * Template language code (e.g. en_US, es, pt_BR).
     */
    #[Required]
    public string $language;

    /**
     * Template name. Lowercase letters, numbers, and underscores only.
     */
    #[Required]
    public string $name;

    /**
     * The WhatsApp Business Account ID.
     */
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
     * @param list<ComponentShape> $components
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
     * Template category: AUTHENTICATION, UTILITY, or MARKETING.
     *
     * @param Category|value-of<Category> $category
     */
    public function withCategory(Category|string $category): self
    {
        $self = clone $this;
        $self['category'] = $category;

        return $self;
    }

    /**
     * Template components defining message structure. Passed through to Meta Graph API. Templates with variables must include example values. Supports HEADER, BODY, FOOTER, BUTTONS, CAROUSEL and any future Meta component types.
     *
     * @param list<ComponentShape> $components
     */
    public function withComponents(array $components): self
    {
        $self = clone $this;
        $self['components'] = $components;

        return $self;
    }

    /**
     * Template language code (e.g. en_US, es, pt_BR).
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Template name. Lowercase letters, numbers, and underscores only.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * The WhatsApp Business Account ID.
     */
    public function withWabaID(string $wabaID): self
    {
        $self = clone $this;
        $self['wabaID'] = $wabaID;

        return $self;
    }
}
