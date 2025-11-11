<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberBlocks\Jobs\JobListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter\Status;
use Telnyx\PhoneNumberBlocks\Jobs\JobListParams\Filter\Type;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[type], filter[status].
 *
 * @phpstan-type FilterShape = array{
 *   status?: value-of<Status>|null, type?: value-of<Type>|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Identifies the status of the background job.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Identifies the type of the background job.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        Status|string|null $status = null,
        Type|string|null $type = null
    ): self {
        $obj = new self;

        null !== $status && $obj['status'] = $status;
        null !== $type && $obj['type'] = $type;

        return $obj;
    }

    /**
     * Identifies the status of the background job.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * Identifies the type of the background job.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
