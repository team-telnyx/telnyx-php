<?php

declare(strict_types=1);

namespace Telnyx\Recordings\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Recordings\Actions\ActionDeleteResponse\Status;

/**
 * @phpstan-type ActionDeleteResponseShape = array{
 *   status?: null|Status|value-of<Status>
 * }
 */
final class ActionDeleteResponse implements BaseModel
{
    /** @use SdkModel<ActionDeleteResponseShape> */
    use SdkModel;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
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
     * @param Status|value-of<Status>|null $status
     */
    public static function with(Status|string|null $status = null): self
    {
        $self = new self;

        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
