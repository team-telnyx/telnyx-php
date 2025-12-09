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
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $alternativeCupids && $obj['alternativeCupids'] = $alternativeCupids;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $cupid && $obj['cupid'] = $cupid;
        null !== $name && $obj['name'] = $name;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * Identifies the UK carrier.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * Alternative CUPIDs of the carrier.
     *
     * @param list<string> $alternativeCupids
     */
    public function withAlternativeCupids(array $alternativeCupids): self
    {
        $obj = clone $this;
        $obj['alternativeCupids'] = $alternativeCupids;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    /**
     * The CUPID of the carrier. This is a 3 digit number code that identifies the carrier in the UK.
     */
    public function withCupid(string $cupid): self
    {
        $obj = clone $this;
        $obj['cupid'] = $cupid;

        return $obj;
    }

    /**
     * The name of the carrier.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
