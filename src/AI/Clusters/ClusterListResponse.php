<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters;

use Telnyx\AI\Assistants\Tests\TestSuites\Runs\Meta;
use Telnyx\AI\Clusters\ClusterListResponse\Data;
use Telnyx\Core\Attributes\Required;
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
    #[Required(list: Data::class)]
    public array $data;

    #[Required]
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
     *   createdAt: \DateTimeInterface,
     *   finishedAt: \DateTimeInterface,
     *   minClusterSize: int,
     *   minSubclusterSize: int,
     *   status: value-of<TaskStatus>,
     *   taskID: string,
     * }> $data
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public static function with(array $data, Meta|array $meta): self
    {
        $self = new self;

        $self['data'] = $data;
        $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|array{
     *   bucket: string,
     *   createdAt: \DateTimeInterface,
     *   finishedAt: \DateTimeInterface,
     *   minClusterSize: int,
     *   minSubclusterSize: int,
     *   status: value-of<TaskStatus>,
     *   taskID: string,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Meta|array{
     *   pageNumber: int, pageSize: int, totalPages: int, totalResults: int
     * } $meta
     */
    public function withMeta(Meta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
