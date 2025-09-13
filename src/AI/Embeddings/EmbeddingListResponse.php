<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings;

use Telnyx\AI\Embeddings\EmbeddingListResponse\Data;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type embedding_list_response = array{data: list<Data>}
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class EmbeddingListResponse implements BaseModel
{
    /** @use SdkModel<embedding_list_response> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Api(list: Data::class)]
    public array $data;

    /**
     * `new EmbeddingListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmbeddingListResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmbeddingListResponse)->withData(...)
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
     * @param list<Data> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    /**
     * @param list<Data> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
