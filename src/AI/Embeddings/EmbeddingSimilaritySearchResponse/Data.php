<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings\EmbeddingSimilaritySearchResponse;

use Telnyx\AI\Embeddings\EmbeddingSimilaritySearchResponse\Data\Metadata;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Example document response from embedding service
 * {
 *   "document_chunk": "your status? This is Vanessa Bloome...",
 *   "distance": 0.18607724,
 *   "metadata": {
 *     "source": "https://us-central-1.telnyxstorage.com/scripts/bee_movie_script.txt",
 *     "checksum": "343054dd19bab39bbf6761a3d20f1daa",
 *     "embedding": "openai/text-embedding-ada-002",
 *     "filename": "bee_movie_script.txt",
 *     "certainty": 0.9069613814353943,
 *     "loader_metadata": {}
 *   }
 * }.
 *
 * @phpstan-import-type MetadataShape from \Telnyx\AI\Embeddings\EmbeddingSimilaritySearchResponse\Data\Metadata
 *
 * @phpstan-type DataShape = array{
 *   distance: float, documentChunk: string, metadata: Metadata|MetadataShape
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required]
    public float $distance;

    #[Required('document_chunk')]
    public string $documentChunk;

    #[Required]
    public Metadata $metadata;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(distance: ..., documentChunk: ..., metadata: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withDistance(...)->withDocumentChunk(...)->withMetadata(...)
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
     * @param Metadata|MetadataShape $metadata
     */
    public static function with(
        float $distance,
        string $documentChunk,
        Metadata|array $metadata
    ): self {
        $self = new self;

        $self['distance'] = $distance;
        $self['documentChunk'] = $documentChunk;
        $self['metadata'] = $metadata;

        return $self;
    }

    public function withDistance(float $distance): self
    {
        $self = clone $this;
        $self['distance'] = $distance;

        return $self;
    }

    public function withDocumentChunk(string $documentChunk): self
    {
        $self = clone $this;
        $self['documentChunk'] = $documentChunk;

        return $self;
    }

    /**
     * @param Metadata|MetadataShape $metadata
     */
    public function withMetadata(Metadata|array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }
}
