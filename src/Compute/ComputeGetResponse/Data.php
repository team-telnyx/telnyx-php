<?php

declare(strict_types=1);

namespace Telnyx\Compute\ComputeGetResponse;

use Telnyx\Compute\ComputeGetResponse\Data\Placement;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type PlacementShape from \Telnyx\Compute\ComputeGetResponse\Data\Placement
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   ownerFunctionID?: string|null,
 *   placement?: null|Placement|PlacementShape,
 *   recordType?: string|null,
 *   status?: string|null,
 *   type?: string|null,
 *   updatedAt?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * ID of the function that owns and ships this actor type. Empty when the type is unowned.
     */
    #[Optional('owner_function_id')]
    public ?string $ownerFunctionID;

    /**
     * Last deployment fan-out report, not a live probe. Omitted on actor types without a placement-aware deployment.
     */
    #[Optional]
    public ?Placement $placement;

    #[Optional('record_type')]
    public ?string $recordType;

    #[Optional]
    public ?string $status;

    #[Optional]
    public ?string $type;

    #[Optional('updated_at')]
    public ?string $updatedAt;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Placement|PlacementShape|null $placement
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?string $ownerFunctionID = null,
        Placement|array|null $placement = null,
        ?string $recordType = null,
        ?string $status = null,
        ?string $type = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $ownerFunctionID && $self['ownerFunctionID'] = $ownerFunctionID;
        null !== $placement && $self['placement'] = $placement;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        null !== $type && $self['type'] = $type;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * ID of the function that owns and ships this actor type. Empty when the type is unowned.
     */
    public function withOwnerFunctionID(string $ownerFunctionID): self
    {
        $self = clone $this;
        $self['ownerFunctionID'] = $ownerFunctionID;

        return $self;
    }

    /**
     * Last deployment fan-out report, not a live probe. Omitted on actor types without a placement-aware deployment.
     *
     * @param Placement|PlacementShape $placement
     */
    public function withPlacement(Placement|array $placement): self
    {
        $self = clone $this;
        $self['placement'] = $placement;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
