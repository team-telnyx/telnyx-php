<?php

declare(strict_types=1);

namespace Telnyx\Storage\Kvs\KvNewResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Kvs\KvNewResponse\Data\Status;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   name?: string|null,
 *   recordType?: string|null,
 *   status?: null|Status|value-of<Status>,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?string $name;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * Provisioning status. A namespace is usable once `status` is `provision_ok`. Once deletion completes, the namespace no longer appears in the API.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    #[Optional('updated_at')]
    public ?\DateTimeInterface $updatedAt;

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
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $name = null,
        ?string $recordType = null,
        Status|string|null $status = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $name && $self['name'] = $name;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * Provisioning status. A namespace is usable once `status` is `provision_ok`. Once deletion completes, the namespace no longer appears in the API.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
