<?php

declare(strict_types=1);

namespace Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse\Data;

use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse\Data\SimCardActionsSummary\Status;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SimCardActionsSummaryShape = array{
 *   count?: int, status?: value-of<Status>
 * }
 */
final class SimCardActionsSummary implements BaseModel
{
    /** @use SdkModel<SimCardActionsSummaryShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?int $count;

    /** @var value-of<Status>|null $status */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

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
    public static function with(
        ?int $count = null,
        Status|string|null $status = null
    ): self {
        $obj = new self;

        null !== $count && $obj->count = $count;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    public function withCount(int $count): self
    {
        $obj = clone $this;
        $obj->count = $count;

        return $obj;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
