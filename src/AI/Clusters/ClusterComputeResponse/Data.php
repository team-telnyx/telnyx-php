<?php

declare(strict_types=1);

namespace Telnyx\AI\Clusters\ClusterComputeResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{task_id: string}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Api]
    public string $task_id;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(task_id: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withTaskID(...)
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
     */
    public static function with(string $task_id): self
    {
        $obj = new self;

        $obj['task_id'] = $task_id;

        return $obj;
    }

    public function withTaskID(string $taskID): self
    {
        $obj = clone $this;
        $obj['task_id'] = $taskID;

        return $obj;
    }
}
