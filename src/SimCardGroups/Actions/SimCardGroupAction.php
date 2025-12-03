<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardGroups\Actions\SimCardGroupAction\Settings;
use Telnyx\SimCardGroups\Actions\SimCardGroupAction\Status;
use Telnyx\SimCardGroups\Actions\SimCardGroupAction\Type;

/**
 * This object represents a SIM card group action request. It allows tracking the current status of an operation that impacts the SIM card group and SIM card in it.
 *
 * @phpstan-type SimCardGroupActionShape = array{
 *   id?: string|null,
 *   created_at?: string|null,
 *   record_type?: string|null,
 *   settings?: Settings|null,
 *   sim_card_group_id?: string|null,
 *   status?: value-of<Status>|null,
 *   type?: value-of<Type>|null,
 *   updated_at?: string|null,
 * }
 */
final class SimCardGroupAction implements BaseModel
{
    /** @use SdkModel<SimCardGroupActionShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * A JSON object representation of the action params.
     */
    #[Api(optional: true)]
    public ?Settings $settings;

    /**
     * The SIM card group identification.
     */
    #[Api(optional: true)]
    public ?string $sim_card_group_id;

    /** @var value-of<Status>|null $status */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /**
     * Represents the type of the operation requested.
     *
     * @var value-of<Type>|null $type
     */
    #[Api(enum: Type::class, optional: true)]
    public ?string $type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api(optional: true)]
    public ?string $updated_at;

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
        ?string $id = null,
        ?string $created_at = null,
        ?string $record_type = null,
        ?Settings $settings = null,
        ?string $sim_card_group_id = null,
        Status|string|null $status = null,
        Type|string|null $type = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $record_type && $obj->record_type = $record_type;
        null !== $settings && $obj->settings = $settings;
        null !== $sim_card_group_id && $obj->sim_card_group_id = $sim_card_group_id;
        null !== $status && $obj['status'] = $status;
        null !== $type && $obj['type'] = $type;
        null !== $updated_at && $obj->updated_at = $updated_at;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->record_type = $recordType;

        return $obj;
    }

    /**
     * A JSON object representation of the action params.
     */
    public function withSettings(Settings $settings): self
    {
        $obj = clone $this;
        $obj->settings = $settings;

        return $obj;
    }

    /**
     * The SIM card group identification.
     */
    public function withSimCardGroupID(string $simCardGroupID): self
    {
        $obj = clone $this;
        $obj->sim_card_group_id = $simCardGroupID;

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

    /**
     * Represents the type of the operation requested.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updated_at = $updatedAt;

        return $obj;
    }
}
