<?php

declare(strict_types=1);

namespace Telnyx\Porting\PortingListUkCarriersResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   alternativeCupids?: list<string>|null,
 *   createdAt?: \DateTimeInterface|null,
 *   cupid?: string|null,
 *   name?: string|null,
 *   recordType?: string|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the UK carrier.
     */
    #[Optional]
    public ?string $id;

    /**
     * Alternative CUPIDs of the carrier.
     *
     * @var list<string>|null $alternativeCupids
     */
    #[Optional('alternative_cupids', list: 'string')]
    public ?array $alternativeCupids;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    /**
     * The CUPID of the carrier. This is a 3 digit number code that identifies the carrier in the UK.
     */
    #[Optional]
    public ?string $cupid;

    /**
     * The name of the carrier.
     */
    #[Optional]
    public ?string $name;

    /**
     * Identifies the type of the resource.
     */
    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
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
     * @param list<string> $alternativeCupids
     */
    public static function with(
        ?string $id = null,
        ?array $alternativeCupids = null,
        ?\DateTimeInterface $createdAt = null,
        ?string $cupid = null,
        ?string $name = null,
        ?string $recordType = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $alternativeCupids && $self['alternativeCupids'] = $alternativeCupids;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $cupid && $self['cupid'] = $cupid;
        null !== $name && $self['name'] = $name;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the UK carrier.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Alternative CUPIDs of the carrier.
     *
     * @param list<string> $alternativeCupids
     */
    public function withAlternativeCupids(array $alternativeCupids): self
    {
        $self = clone $this;
        $self['alternativeCupids'] = $alternativeCupids;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * The CUPID of the carrier. This is a 3 digit number code that identifies the carrier in the UK.
     */
    public function withCupid(string $cupid): self
    {
        $self = clone $this;
        $self['cupid'] = $cupid;

        return $self;
    }

    /**
     * The name of the carrier.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
