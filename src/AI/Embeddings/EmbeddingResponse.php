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
     *   created_at?: string|null,
     *   finished_at?: string|null,
     *   status?: string|null,
     *   task_id?: string|null,
     *   task_name?: string|null,
     *   user_id?: string|null,
     * } $data
     */
    public static function with(Data|array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   created_at?: string|null,
     *   finished_at?: string|null,
     *   status?: string|null,
     *   task_id?: string|null,
     *   task_name?: string|null,
     *   user_id?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
