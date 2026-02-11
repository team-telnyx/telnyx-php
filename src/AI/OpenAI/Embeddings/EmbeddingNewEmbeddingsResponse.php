<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\Embeddings;

use Telnyx\AI\OpenAI\Embeddings\EmbeddingNewEmbeddingsResponse\Data;
use Telnyx\AI\OpenAI\Embeddings\EmbeddingNewEmbeddingsResponse\Usage;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\AI\OpenAI\Embeddings\EmbeddingNewEmbeddingsResponse\Data
 * @phpstan-import-type UsageShape from \Telnyx\AI\OpenAI\Embeddings\EmbeddingNewEmbeddingsResponse\Usage
 *
 * @phpstan-type EmbeddingNewEmbeddingsResponseShape = array{
 *   data: list<Data|DataShape>,
 *   model: string,
 *   object: string,
 *   usage: Usage|UsageShape,
 * }
 */
final class EmbeddingNewEmbeddingsResponse implements BaseModel
{
    /** @use SdkModel<EmbeddingNewEmbeddingsResponseShape> */
    use SdkModel;

    /**
     * List of embedding objects.
     *
     * @var list<Data> $data
     */
    #[Required(list: Data::class)]
    public array $data;

    /**
     * The model used for embedding.
     */
    #[Required]
    public string $model;

    /**
     * The object type, always 'list'.
     */
    #[Required]
    public string $object;

    #[Required]
    public Usage $usage;

    /**
     * `new EmbeddingNewEmbeddingsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmbeddingNewEmbeddingsResponse::with(
     *   data: ..., model: ..., object: ..., usage: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmbeddingNewEmbeddingsResponse)
     *   ->withData(...)
     *   ->withModel(...)
     *   ->withObject(...)
     *   ->withUsage(...)
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
     * @param list<Data|DataShape> $data
     * @param Usage|UsageShape $usage
     */
    public static function with(
        array $data,
        string $model,
        Usage|array $usage,
        string $object = 'list'
    ): self {
        $self = new self;

        $self['data'] = $data;
        $self['model'] = $model;
        $self['object'] = $object;
        $self['usage'] = $usage;

        return $self;
    }

    /**
     * List of embedding objects.
     *
     * @param list<Data|DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * The model used for embedding.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * The object type, always 'list'.
     */
    public function withObject(string $object): self
    {
        $self = clone $this;
        $self['object'] = $object;

        return $self;
    }

    /**
     * @param Usage|UsageShape $usage
     */
    public function withUsage(Usage|array $usage): self
    {
        $self = clone $this;
        $self['usage'] = $usage;

        return $self;
    }
}
