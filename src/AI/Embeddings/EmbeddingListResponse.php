<?php

declare(strict_types=1);

namespace Telnyx\AI\Embeddings;

use Telnyx\AI\Embeddings\EmbeddingListResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type EmbeddingListResponseShape = array{data: list<Data>}
 */
final class EmbeddingListResponse implements BaseModel
{
    /** @use SdkModel<EmbeddingListResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Required(list: Data::class)]
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
     * @param list<Data|array{
     *   created_at: \DateTimeInterface,
     *   status: value-of<BackgroundTaskStatus>,
     *   task_id: string,
     *   task_name: string,
     *   user_id: string,
     *   bucket?: string|null,
     *   finished_at?: \DateTimeInterface|null,
     * }> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   created_at: \DateTimeInterface,
     *   status: value-of<BackgroundTaskStatus>,
     *   task_id: string,
     *   task_name: string,
     *   user_id: string,
     *   bucket?: string|null,
     *   finished_at?: \DateTimeInterface|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
