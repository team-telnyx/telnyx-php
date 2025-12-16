<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings;

use Telnyx\AI\Embeddings\EmbeddingSimilaritySearchResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type DataShape from \Telnyx\AI\Embeddings\EmbeddingSimilaritySearchResponse\Data
 *
 * @phpstan-type EmbeddingSimilaritySearchResponseShape = array{
 *   data: list<DataShape>
 * }
 */
final class EmbeddingSimilaritySearchResponse implements BaseModel
{
    /** @use SdkModel<EmbeddingSimilaritySearchResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
    public array $data;

    /**
     * `new EmbeddingSimilaritySearchResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmbeddingSimilaritySearchResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmbeddingSimilaritySearchResponse)->withData(...)
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
     * @param list<DataShape> $data
     */
    public static function with(array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param list<DataShape> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
