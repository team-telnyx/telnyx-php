<?php

declare(strict_types=1);

namespace Telnyx\Porting\PortingListUkCarriersResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   alternative_cupids?: list<string>|null,
 *   created_at?: \DateTimeInterface|null,
 *   cupid?: string|null,
 *   name?: string|null,
 *   record_type?: string|null,
 *   updated_at?: \DateTimeInterface|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the UK carrier.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * Alternative CUPIDs of the carrier.
     *
     * @var list<string>|null $alternative_cupids
     */
    #[Api(list: 'string', optional: true)]
    public ?array $alternative_cupids;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $created_at;

    /**
     * The CUPID of the carrier. This is a 3 digit number code that identifies the carrier in the UK.
     */
    #[Api(optional: true)]
    public ?string $cupid;

    /**
     * The name of the carrier.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Identifies the type of the resource.
     */
    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?\DateTimeInterface $updated_at;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<string> $alternative_cupids
     */
    public static function with(
        ?string $id = null,
        ?array $alternative_cupids = null,
        ?\DateTimeInterface $created_at = null,
        ?string $cupid = null,
        ?string $name = null,
        ?string $record_type = null,
        ?\DateTimeInterface $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $alternative_cupids && $obj->alternative_cupids = $alternative_cupids;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $cupid && $obj->cupid = $cupid;
        null !== $name && $obj->name = $name;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * Identifies the UK carrier.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

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
        $obj->alternative_cupids = $alternativeCupids;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * The CUPID of the carrier. This is a 3 digit number code that identifies the carrier in the UK.
     */
    public function withCupid(string $cupid): self
    {
        $obj = clone $this;
        $obj->cupid = $cupid;

        return $obj;
    }

    /**
     * The name of the carrier.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was updated.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
