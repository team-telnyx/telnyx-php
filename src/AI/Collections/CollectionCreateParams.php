<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections;

use Telnyx\AI\Collections\Settings\RetrievalSettingsWrapper;
use Telnyx\AI\Collections\Sources\SourceRequest;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Creates a new collection scoped to your organization. Optionally attach sources and retrieval settings at creation time. If `slug` is omitted, one is derived from `name` and must be unique within your organization.
 *
 * @see Telnyx\Services\AI\CollectionsService::create()
 *
 * @phpstan-import-type RetrievalSettingsWrapperShape from \Telnyx\AI\Collections\Settings\RetrievalSettingsWrapper
 * @phpstan-import-type SourceRequestShape from \Telnyx\AI\Collections\Sources\SourceRequest
 *
 * @phpstan-type CollectionCreateParamsShape = array{
 *   name: string,
 *   description?: string|null,
 *   settings?: null|RetrievalSettingsWrapper|RetrievalSettingsWrapperShape,
 *   slug?: string|null,
 *   sources?: list<SourceRequest|SourceRequestShape>|null,
 * }
 */
final class CollectionCreateParams implements BaseModel
{
    /** @use SdkModel<CollectionCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Human-readable collection name.
     */
    #[Required]
    public string $name;

    /**
     * Optional description.
     */
    #[Optional]
    public ?string $description;

    /**
     * Optional retrieval settings.
     */
    #[Optional]
    public ?RetrievalSettingsWrapper $settings;

    /**
     * Optional slug (unique per organization). Derived from `name` when omitted.
     */
    #[Optional]
    public ?string $slug;

    /**
     * Optional sources to attach at creation time.
     *
     * @var list<SourceRequest>|null $sources
     */
    #[Optional(list: SourceRequest::class)]
    public ?array $sources;

    /**
     * `new CollectionCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CollectionCreateParams::with(name: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CollectionCreateParams)->withName(...)
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
     * @param RetrievalSettingsWrapper|RetrievalSettingsWrapperShape|null $settings
     * @param list<SourceRequest|SourceRequestShape>|null $sources
     */
    public static function with(
        string $name,
        ?string $description = null,
        RetrievalSettingsWrapper|array|null $settings = null,
        ?string $slug = null,
        ?array $sources = null,
    ): self {
        $self = new self;

        $self['name'] = $name;

        null !== $description && $self['description'] = $description;
        null !== $settings && $self['settings'] = $settings;
        null !== $slug && $self['slug'] = $slug;
        null !== $sources && $self['sources'] = $sources;

        return $self;
    }

    /**
     * Human-readable collection name.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Optional description.
     */
    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Optional retrieval settings.
     *
     * @param RetrievalSettingsWrapper|RetrievalSettingsWrapperShape $settings
     */
    public function withSettings(RetrievalSettingsWrapper|array $settings): self
    {
        $self = clone $this;
        $self['settings'] = $settings;

        return $self;
    }

    /**
     * Optional slug (unique per organization). Derived from `name` when omitted.
     */
    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    /**
     * Optional sources to attach at creation time.
     *
     * @param list<SourceRequest|SourceRequestShape> $sources
     */
    public function withSources(array $sources): self
    {
        $self = clone $this;
        $self['sources'] = $sources;

        return $self;
    }
}
