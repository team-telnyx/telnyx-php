<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\EmbeddingSimilaritySearchResponse\Data;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type metadata_alias = array{
 *   checksum: string,
 *   embedding: string,
 *   filename: string,
 *   source: string,
 *   certainty?: float,
 *   loaderMetadata?: array<string, mixed>,
 * }
 */
final class Metadata implements BaseModel
{
    /** @use SdkModel<metadata_alias> */
    use SdkModel;

    #[Api]
    public string $checksum;

    #[Api]
    public string $embedding;

    #[Api]
    public string $filename;

    #[Api]
    public string $source;

    #[Api(optional: true)]
    public ?float $certainty;

    /** @var array<string, mixed>|null $loaderMetadata */
    #[Api('loader_metadata', map: 'mixed', optional: true)]
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
     * @param array<string, mixed> $loaderMetadata
     */
    public static function with(
        string $checksum,
        string $embedding,
        string $filename,
        string $source,
        ?float $certainty = null,
        ?array $loaderMetadata = null,
    ): self {
        $obj = new self;

        $obj->checksum = $checksum;
        $obj->embedding = $embedding;
        $obj->filename = $filename;
        $obj->source = $source;

        null !== $certainty && $obj->certainty = $certainty;
        null !== $loaderMetadata && $obj->loaderMetadata = $loaderMetadata;

        return $obj;
    }

    public function withChecksum(string $checksum): self
    {
        $obj = clone $this;
        $obj->checksum = $checksum;

        return $obj;
    }

    public function withEmbedding(string $embedding): self
    {
        $obj = clone $this;
        $obj->embedding = $embedding;

        return $obj;
    }

    public function withFilename(string $filename): self
    {
        $obj = clone $this;
        $obj->filename = $filename;

        return $obj;
    }

    public function withSource(string $source): self
    {
        $obj = clone $this;
        $obj->source = $source;

        return $obj;
    }

    public function withCertainty(float $certainty): self
    {
        $obj = clone $this;
        $obj->certainty = $certainty;

        return $obj;
    }

    /**
     * @param array<string, mixed> $loaderMetadata
     */
    public function withLoaderMetadata(array $loaderMetadata): self
    {
        $obj = clone $this;
        $obj->loaderMetadata = $loaderMetadata;

        return $obj;
    }
}
