<?php

declare(strict_types=1);

namespace Telnyx\AI\Memory\Namespaces\NamespaceGetResponse;

use Telnyx\AI\Memory\Namespaces\NamespaceGetResponse\Data\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;

/**
 * @phpstan-type DataShape = array{
 *   operationID: string,
 *   status: Status|value-of<Status>,
 *   completedAt?: string|null,
 *   createdAt?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Required('operation_id')]
    public string $operationID;

    /**
     * Where the write is. `completed`, `failed` and `cancelled` are terminal: stop polling at any of them, and treat `failed` and `cancelled` as writes that did not happen.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    #[Optional('completed_at', nullable: true)]
    public ?string $completedAt;

    #[Optional('created_at', nullable: true)]
    public ?string $createdAt;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(operationID: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withOperationID(...)->withStatus(...)
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
    public static function with(
        string $operationID,
        Status|string $status,
        string|Omitted|null $completedAt = Omitted::VALUE,
        string|Omitted|null $createdAt = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['operationID'] = $operationID;
        $self['status'] = $status;

        Omitted::VALUE !== $completedAt && $self['completedAt'] = $completedAt;
        Omitted::VALUE !== $createdAt && $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withOperationID(string $operationID): self
    {
        $self = clone $this;
        $self['operationID'] = $operationID;

        return $self;
    }

    /**
     * Where the write is. `completed`, `failed` and `cancelled` are terminal: stop polling at any of them, and treat `failed` and `cancelled` as writes that did not happen.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withCompletedAt(?string $completedAt): self
    {
        $self = clone $this;
        $self['completedAt'] = $completedAt;

        return $self;
    }

    public function withCreatedAt(?string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }
}
