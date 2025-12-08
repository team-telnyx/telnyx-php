<?php

declare(strict_types=1);

namespace Telnyx\Portouts\Comments;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Metadata;
use Telnyx\Portouts\Comments\CommentListResponse\Data;

/**
 * @phpstan-type CommentListResponseShape = array{
 *   data?: list<Data>|null, meta?: Metadata|null
 * }
 */
final class CommentListResponse implements BaseModel
{
    /** @use SdkModel<CommentListResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Api(list: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?Metadata $meta;

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
     *   id: string,
     *   body: string,
     *   created_at: string,
     *   user_id: string,
     *   portout_id?: string|null,
     *   record_type?: string|null,
     * }> $data
     * @param Metadata|array{
     *   page_number?: float|null,
     *   page_size?: float|null,
     *   total_pages?: float|null,
     *   total_results?: float|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        Metadata|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   id: string,
     *   body: string,
     *   created_at: string,
     *   user_id: string,
     *   portout_id?: string|null,
     *   record_type?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Metadata|array{
     *   page_number?: float|null,
     *   page_size?: float|null,
     *   total_pages?: float|null,
     *   total_results?: float|null,
     * } $meta
     */
    public function withMeta(Metadata|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
