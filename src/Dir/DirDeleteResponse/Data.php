<?php

declare(strict_types=1);

namespace Telnyx\Dir\DirDeleteResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\DirDeleteResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{id: string, status: Status|value-of<Status>}
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Id of the DIR whose deletion was requested.
     */
    #[Required]
    public string $id;

    /**
     * Always `delete_requested`: the DIR has been queued for removal, not yet removed.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(id: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withID(...)->withStatus(...)
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
    public static function with(string $id, Status|string $status): self
    {
        $self = new self;

        $self['id'] = $id;
        $self['status'] = $status;

        return $self;
    }

    /**
     * Id of the DIR whose deletion was requested.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Always `delete_requested`: the DIR has been queued for removal, not yet removed.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
