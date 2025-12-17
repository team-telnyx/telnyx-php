<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\EmbeddingSimilaritySearchResponse\Data;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type MetadataShape = array{
 *   checksum: string,
 *   embedding: string,
 *   filename: string,
 *   source: string,
 *   certainty?: float|null,
 *   loaderMetadata?: array<string,mixed>|null,
 * }
 */
final class Metadata implements BaseModel
{
    /** @use SdkModel<MetadataShape> */
    use SdkModel;

    #[Required]
    public string $checksum;

    #[Required]
    public string $embedding;

    #[Required]
    public string $filename;

    #[Required]
    public string $source;

    #[Optional]
    public ?float $certainty;

    /** @var array<string,mixed>|null $loaderMetadata */
    #[Optional('loader_metadata', map: 'mixed')]
    public ?array $loaderMetadata;

    /**
     * `new Metadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Metadata::with(checksum: ..., embedding: ..., filename: ..., source: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Metadata)
     *   ->withChecksum(...)
     *   ->withEmbedding(...)
     *   ->withFilename(...)
     *   ->withSource(...)
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
     * @param array<string,mixed>|null $loaderMetadata
     */
    public static function with(
        string $checksum,
        string $embedding,
        string $filename,
        string $source,
        ?float $certainty = null,
        ?array $loaderMetadata = null,
    ): self {
        $self = new self;

        $self['checksum'] = $checksum;
        $self['embedding'] = $embedding;
        $self['filename'] = $filename;
        $self['source'] = $source;

        null !== $certainty && $self['certainty'] = $certainty;
        null !== $loaderMetadata && $self['loaderMetadata'] = $loaderMetadata;

        return $self;
    }

    public function withChecksum(string $checksum): self
    {
        $self = clone $this;
        $self['checksum'] = $checksum;

        return $self;
    }

    public function withEmbedding(string $embedding): self
    {
        $self = clone $this;
        $self['embedding'] = $embedding;

        return $self;
    }

    public function withFilename(string $filename): self
    {
        $self = clone $this;
        $self['filename'] = $filename;

        return $self;
    }

    public function withSource(string $source): self
    {
        $self = clone $this;
        $self['source'] = $source;

        return $self;
    }

    public function withCertainty(float $certainty): self
    {
        $self = clone $this;
        $self['certainty'] = $certainty;

        return $self;
    }

    /**
     * @param array<string,mixed> $loaderMetadata
     */
    public function withLoaderMetadata(array $loaderMetadata): self
    {
        $self = clone $this;
        $self['loaderMetadata'] = $loaderMetadata;

        return $self;
    }
}
