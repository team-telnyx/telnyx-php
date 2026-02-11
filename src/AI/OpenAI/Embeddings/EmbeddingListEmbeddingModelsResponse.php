<?php

declare(strict_types=1);

namespace Telnyx\AI\OpenAI\Embeddings;

use Telnyx\AI\OpenAI\Embeddings\EmbeddingListEmbeddingModelsResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\AI\OpenAI\Embeddings\EmbeddingListEmbeddingModelsResponse\Data
 *
 * @phpstan-type EmbeddingListEmbeddingModelsResponseShape = array{
 *   data: list<Data|DataShape>, object: string
 * }
 */
final class EmbeddingListEmbeddingModelsResponse implements BaseModel
{
    /** @use SdkModel<EmbeddingListEmbeddingModelsResponseShape> */
    use SdkModel;

    /**
     * List of available embedding models.
     *
     * @var list<Data> $data
     */
    #[Required(list: Data::class)]
    public array $data;

    /**
     * The object type, always 'list'.
     */
    #[Required]
    public string $object;

    /**
     * `new EmbeddingListEmbeddingModelsResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmbeddingListEmbeddingModelsResponse::with(data: ..., object: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmbeddingListEmbeddingModelsResponse)->withData(...)->withObject(...)
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
     */
    public static function with(array $data, string $object = 'list'): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['object'] = $object;

        return $self;
    }

    /**
     * List of available embedding models.
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
     * The object type, always 'list'.
     */
    public function withObject(string $object): self
    {
        $self = clone $this;
        $self['object'] = $object;

        return $self;
    }
}
