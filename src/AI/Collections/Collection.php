<?php

declare(strict_types=1);

namespace Telnyx\AI\Collections;

use Telnyx\AI\Collections\Settings\RetrievalSettingsWrapper;
use Telnyx\AI\Collections\Sources\Source;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type RetrievalSettingsWrapperShape from \Telnyx\AI\Collections\Settings\RetrievalSettingsWrapper
 * @phpstan-import-type SourceShape from \Telnyx\AI\Collections\Sources\Source
 *
 * @phpstan-type CollectionShape = array{
 *   createdAt?: \DateTimeInterface|null,
 *   description?: string|null,
 *   name?: string|null,
 *   recordType?: string|null,
 *   settings?: null|RetrievalSettingsWrapper|RetrievalSettingsWrapperShape,
 *   slug?: string|null,
 *   sources?: list<Source|SourceShape>|null,
 *   status?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 *   uuid?: string|null,
 * }
 */
final class Collection implements BaseModel
{
    /** @use SdkModel<CollectionShape> */
    use SdkModel;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?string $description;

    #[Optional]
    public ?string $name;

    /**
     * Identifies the record type. Always `ai_collection`.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional]
    public ?RetrievalSettingsWrapper $settings;

    #[Optional]
    public ?string $slug;

    /** @var list<Source>|null $sources */
    #[Optional(list: Source::class)]
    public ?array $sources;

    #[Optional]
    public ?string $status;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

    #[Optional]
    public ?string $uuid;

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
     * @param list<Source|SourceShape>|null $sources
     */
    public static function with(
        ?\DateTimeInterface $createdAt = null,
        ?string $description = null,
        ?string $name = null,
        ?string $recordType = null,
        RetrievalSettingsWrapper|array|null $settings = null,
        ?string $slug = null,
        ?array $sources = null,
        ?string $status = null,
        ?\DateTimeInterface $updatedAt = null,
        ?string $uuid = null,
    ): self {
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $description && $self['description'] = $description;
        null !== $name && $self['name'] = $name;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $settings && $self['settings'] = $settings;
        null !== $slug && $self['slug'] = $slug;
        null !== $sources && $self['sources'] = $sources;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $uuid && $self['uuid'] = $uuid;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Identifies the record type. Always `ai_collection`.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * @param RetrievalSettingsWrapper|RetrievalSettingsWrapperShape $settings
     */
    public function withSettings(RetrievalSettingsWrapper|array $settings): self
    {
        $self = clone $this;
        $self['settings'] = $settings;

        return $self;
    }

    public function withSlug(string $slug): self
    {
        $self = clone $this;
        $self['slug'] = $slug;

        return $self;
    }

    /**
     * @param list<Source|SourceShape> $sources
     */
    public function withSources(array $sources): self
    {
        $self = clone $this;
        $self['sources'] = $sources;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withUuid(string $uuid): self
    {
        $self = clone $this;
        $self['uuid'] = $uuid;

        return $self;
    }
}
