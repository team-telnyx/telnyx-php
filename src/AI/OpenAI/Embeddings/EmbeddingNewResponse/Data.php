<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\Embeddings\EmbeddingNewResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   embedding: list<float>, index: int, object: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The embedding vector.
     *
     * @var list<float> $embedding
     */
    #[Required(list: 'float')]
    public array $embedding;

    /**
     * The index of the embedding in the list of embeddings.
     */
    #[Required]
    public int $index;

    /**
     * The object type, always 'embedding'.
     */
    #[Required]
    public string $object;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(embedding: ..., index: ..., object: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withEmbedding(...)->withIndex(...)->withObject(...)
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
     * @param list<float> $embedding
     */
    public static function with(
        array $embedding,
        int $index,
        string $object = 'embedding'
    ): self {
        $self = new self;

        $self['embedding'] = $embedding;
        $self['index'] = $index;
        $self['object'] = $object;

        return $self;
    }

    /**
     * The embedding vector.
     *
     * @param list<float> $embedding
     */
    public function withEmbedding(array $embedding): self
    {
        $self = clone $this;
        $self['embedding'] = $embedding;

        return $self;
    }

    /**
     * The index of the embedding in the list of embeddings.
     */
    public function withIndex(int $index): self
    {
        $self = clone $this;
        $self['index'] = $index;

        return $self;
    }

    /**
     * The object type, always 'embedding'.
     */
    public function withObject(string $object): self
    {
        $self = clone $this;
        $self['object'] = $object;

        return $self;
    }
}
