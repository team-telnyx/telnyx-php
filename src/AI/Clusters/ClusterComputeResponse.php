<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters;

use Telnyx\AI\Clusters\ClusterComputeResponse\Data;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ClusterComputeResponseShape = array{data: Data}
 */
final class ClusterComputeResponse implements BaseModel
{
    /** @use SdkModel<ClusterComputeResponseShape> */
    use SdkModel;

    #[Required]
    public Data $data;

    /**
     * `new ClusterComputeResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ClusterComputeResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ClusterComputeResponse)->withData(...)
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
     * @param Data|array{taskID: string} $data
     */
    public static function with(Data|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|array{taskID: string} $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
