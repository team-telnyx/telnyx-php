<?php

declare(strict_types=1);

namespace Telnyx\WebSearch\Research\ResearchNewResponse\Data;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WebSearch\Research\ResearchNewResponse\Data\ResearchResponseAsync\Status;

/**
 * Asynchronous research response (when `background` is true).
 *
 * @phpstan-type ResearchResponseAsyncShape = array{
 *   status: Status|value-of<Status>, taskID: string
 * }
 */
final class ResearchResponseAsync implements BaseModel
{
    /** @use SdkModel<ResearchResponseAsyncShape> */
    use SdkModel;

    /**
     * Current status of the research task.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Unique identifier for the research task. Use this to poll the status.
     */
    #[Required('task_id')]
    public string $taskID;

    /**
     * `new ResearchResponseAsync()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ResearchResponseAsync::with(status: ..., taskID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ResearchResponseAsync)->withStatus(...)->withTaskID(...)
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
     * @param Status|value-of<Status> $status
     */
    public static function with(Status|string $status, string $taskID): self
    {
        $self = new self;

        $self['status'] = $status;
        $self['taskID'] = $taskID;

        return $self;
    }

    /**
     * Current status of the research task.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Unique identifier for the research task. Use this to poll the status.
     */
    public function withTaskID(string $taskID): self
    {
        $self = clone $this;
        $self['taskID'] = $taskID;

        return $self;
    }
}
