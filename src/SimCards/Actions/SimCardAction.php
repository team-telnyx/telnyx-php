<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\Actions\SimCardAction\ActionType;
use Telnyx\SimCards\Actions\SimCardAction\Status;

/**
 * This object represents a SIM card action. It allows tracking the current status of an operation that impacts the SIM card.
 *
 * @phpstan-type sim_card_action = array{
 *   id?: string,
 *   actionType?: value-of<ActionType>,
 *   createdAt?: string,
 *   recordType?: string,
 *   settings?: array<string, mixed>|null,
 *   simCardID?: string,
 *   status?: Status,
 *   updatedAt?: string,
 * }
 */
final class SimCardAction implements BaseModel
{
    /** @use SdkModel<sim_card_action> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $id;

    /**
     * The operation type. It can be one of the following: <br/>
     * <ul>
     *  <li><code>enable</code> - move the SIM card to the <code>enabled</code> status</li>
     *  <li><code>enable_standby_sim_card</code> - move a SIM card previously on the <code>standby</code> status to the <code>enabled</code> status after it consumes data.</li>
     *  <li><code>disable</code> - move the SIM card to the <code>disabled</code> status</li>
     *  <li><code>set_standby</code> - move the SIM card to the <code>standby</code> status</li>
     *  </ul>.
     *
     * @var value-of<ActionType>|null $actionType
     */
    #[Api('action_type', enum: ActionType::class, optional: true)]
    public ?string $actionType;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    #[Api('record_type', optional: true)]
    public ?string $recordType;

    /**
     * A JSON object representation of the action params.
     *
     * @var array<string, mixed>|null $settings
     */
    #[Api(map: 'mixed', nullable: true, optional: true)]
    public ?array $settings;

    /**
     * The related SIM card identifier.
     */
    #[Api('sim_card_id', optional: true)]
    public ?string $simCardID;

    #[Api(optional: true)]
    public ?Status $status;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Api('updated_at', optional: true)]
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
     * @param ActionType|value-of<ActionType> $actionType
     * @param array<string, mixed>|null $settings
     */
    public static function with(
        ?string $id = null,
        ActionType|string|null $actionType = null,
        ?string $createdAt = null,
        ?string $recordType = null,
        ?array $settings = null,
        ?string $simCardID = null,
        ?Status $status = null,
        ?string $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $actionType && $obj['actionType'] = $actionType;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $recordType && $obj->recordType = $recordType;
        null !== $settings && $obj->settings = $settings;
        null !== $simCardID && $obj->simCardID = $simCardID;
        null !== $status && $obj->status = $status;
        null !== $updatedAt && $obj->updatedAt = $updatedAt;

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
     * The operation type. It can be one of the following: <br/>
     * <ul>
     *  <li><code>enable</code> - move the SIM card to the <code>enabled</code> status</li>
     *  <li><code>enable_standby_sim_card</code> - move a SIM card previously on the <code>standby</code> status to the <code>enabled</code> status after it consumes data.</li>
     *  <li><code>disable</code> - move the SIM card to the <code>disabled</code> status</li>
     *  <li><code>set_standby</code> - move the SIM card to the <code>standby</code> status</li>
     *  </ul>.
     *
     * @param ActionType|value-of<ActionType> $actionType
     */
    public function withActionType(ActionType|string $actionType): self
    {
        $obj = clone $this;
        $obj['actionType'] = $actionType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * A JSON object representation of the action params.
     *
     * @param array<string, mixed>|null $settings
     */
    public function withSettings(?array $settings): self
    {
        $obj = clone $this;
        $obj->settings = $settings;

        return $obj;
    }

    /**
     * The related SIM card identifier.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj->simCardID = $simCardID;

        return $obj;
    }

    public function withStatus(Status $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }
}
