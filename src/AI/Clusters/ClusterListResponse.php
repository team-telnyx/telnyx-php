<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\AI\Clusters\ClusterListResponse\Data;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberAssignmentByProfile\TaskStatus;

/**
 * @phpstan-type ClusterListResponseShape = array{data: list<Data>, meta: Meta}
 */
final class ClusterListResponse implements BaseModel
{
    /** @use SdkModel<ClusterListResponseShape> */
    use SdkModel;

    /** @var list<Data> $data */
    #[Api(list: Data::class)]
    public array $data;

    #[Api]
    public Meta $meta;

    /**
     * `new ClusterListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClusterListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClusterListResponse)->withData(...)->withMeta(...)
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
     *   bucket: string,
     *   created_at: \DateTimeInterface,
     *   finished_at: \DateTimeInterface,
     *   min_cluster_size: int,
     *   min_subcluster_size: int,
     *   status: value-of<TaskStatus>,
     *   task_id: string,
     * }> $data
     * @param Meta|array{
     *   page_number: int, page_size: int, total_pages: int, total_results: int
     * } $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $obj = new self;

        $obj['data'] = $data;
        $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Data|array{
     *   bucket: string,
     *   created_at: \DateTimeInterface,
     *   finished_at: \DateTimeInterface,
     *   min_cluster_size: int,
     *   min_subcluster_size: int,
     *   status: value-of<TaskStatus>,
     *   task_id: string,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Meta|array{
     *   page_number: int, page_size: int, total_pages: int, total_results: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
