<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings;

use Telnyx\AI\Embeddings\EmbeddingGetResponse\Data;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type EmbeddingGetResponseShape = array{data: Data}
 */
final class EmbeddingGetResponse implements BaseModel
{
    /** @use SdkModel<EmbeddingGetResponseShape> */
    use SdkModel;

    #[Api]
    public Data $data;

    /**
     * `new EmbeddingGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * EmbeddingGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new EmbeddingGetResponse)->withData(...)
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
     *   status?: value-of<BackgroundTaskStatus>|null,
     *   task_id?: string|null,
     *   task_name?: string|null,
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
     *   status?: value-of<BackgroundTaskStatus>|null,
     *   task_id?: string|null,
     *   task_name?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
