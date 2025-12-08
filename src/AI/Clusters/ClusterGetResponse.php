<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters;

use Telnyx\AI\Clusters\ClusterGetResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberAssignmentByProfile\TaskStatus;

/**
 * @phpstan-type ClusterGetResponseShape = array{data: Data}
 */
final class ClusterGetResponse implements BaseModel
{
    /** @use SdkModel<ClusterGetResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new ClusterGetResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClusterGetResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClusterGetResponse)->withData(...)
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
     *   bucket: string, clusters: list<mixed>, status: value-of<TaskStatus>
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
     *   bucket: string, clusters: list<mixed>, status: value-of<TaskStatus>
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
