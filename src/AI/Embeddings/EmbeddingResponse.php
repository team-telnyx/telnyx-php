<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings;

use Telnyx\AI\Embeddings\EmbeddingResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type EmbeddingResponseShape = array{data: Data}
 */
final class EmbeddingResponse implements BaseModel
{
    /** @use SdkModel<EmbeddingResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new EmbeddingResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmbeddingResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmbeddingResponse)->withData(...)
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
     * @param Data|array{
     *   createdAt?: string|null,
     *   finishedAt?: string|null,
     *   status?: string|null,
     *   taskID?: string|null,
     *   taskName?: string|null,
     *   userID?: string|null,
     * } $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{
     *   createdAt?: string|null,
     *   finishedAt?: string|null,
     *   status?: string|null,
     *   taskID?: string|null,
     *   taskName?: string|null,
     *   userID?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
