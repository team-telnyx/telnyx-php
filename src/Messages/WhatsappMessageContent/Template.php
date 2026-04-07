<?php

declare(strict_types=1);

namespace Telnyx\Messages\WhatsappMessageContent;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\WhatsappMessageContent\Template\Component;
use Telnyx\Messages\WhatsappMessageContent\Template\Language;

/**
 * Template message object. Provide either template_id or name + language to identify the template.
 *
 * @phpstan-import-type ComponentShape from \Telnyx\Messages\WhatsappMessageContent\Template\Component
 * @phpstan-import-type LanguageShape from \Telnyx\Messages\WhatsappMessageContent\Template\Language
 *
 * @phpstan-type TemplateShape = array{
 *   components?: list<Component|ComponentShape>|null,
 *   language?: null|Language|LanguageShape,
 *   name?: string|null,
 *   templateID?: string|null,
 * }
 */
final class Template implements BaseModel
{
    /** @use SdkModel<TemplateShape> */
    use SdkModel;

    /**
     * Template parameter values for header, body, and button components.
     *
     * @var list<Component>|null $components
     */
    #[Optional(list: Component::class)]
    public ?array $components;

    /**
     * Template language. Required unless template_id is provided.
     */
    #[Optional]
    public ?Language $language;

    /**
     * Template name as registered with Meta. Required unless template_id is provided.
     */
    #[Optional]
    public ?string $name;

    /**
     * Telnyx template ID (the id field from template list/get responses). When provided, name and language are resolved automatically.
     */
    #[Optional('template_id')]
    public ?string $templateID;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Component|ComponentShape>|null $components
     * @param Language|LanguageShape|null $language
     */
    public static function with(
        ?array $components = null,
        Language|array|null $language = null,
        ?string $name = null,
        ?string $templateID = null,
    ): self {
        $self = new self;

        null !== $components && $self['components'] = $components;
        null !== $language && $self['language'] = $language;
        null !== $name && $self['name'] = $name;
        null !== $templateID && $self['templateID'] = $templateID;

        return $self;
    }

    /**
     * Template parameter values for header, body, and button components.
     *
     * @param list<Component|ComponentShape> $components
     */
    public function withComponents(array $components): self
    {
        $self = clone $this;
        $self['components'] = $components;

        return $self;
    }

    /**
     * Template language. Required unless template_id is provided.
     *
     * @param Language|LanguageShape $language
     */
    public function withLanguage(Language|array $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Template name as registered with Meta. Required unless template_id is provided.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Telnyx template ID (the id field from template list/get responses). When provided, name and language are resolved automatically.
     */
    public function withTemplateID(string $templateID): self
    {
        $self = clone $this;
        $self['templateID'] = $templateID;

        return $self;
    }
}
