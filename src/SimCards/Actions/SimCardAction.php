<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\Actions\SimCardAction\ActionType;
use Telnyx\SimCards\Actions\SimCardAction\Status;
use Telnyx\SimCards\Actions\SimCardAction\Status\Value;

/**
 * This object represents a SIM card action. It allows tracking the current status of an operation that impacts the SIM card.
 *
 * @phpstan-type SimCardActionShape = array{
 *   id?: string|null,
 *   action_type?: value-of<ActionType>|null,
 *   created_at?: string|null,
 *   record_type?: string|null,
 *   settings?: array<string,mixed>|null,
 *   sim_card_id?: string|null,
 *   status?: Status|null,
 *   updated_at?: string|null,
 * }
 */
final class SimCardAction implements BaseModel
{
    /** @use SdkModel<SimCardActionShape> */
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
     * @var value-of<ActionType>|null $action_type
     */
    #[Api(enum: ActionType::class, optional: true)]
    public ?string $action_type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    #[Api(optional: true)]
    public ?string $record_type;

    /**
     * A JSON object representation of the action params.
     *
     * @var array<string,mixed>|null $settings
     */
    #[Api(map: 'mixed', nullable: true, optional: true)]
    public ?array $settings;

    /**
     * The related SIM card identifier.
     */
    #[Api(optional: true)]
    public ?string $sim_card_id;

    #[Api(optional: true)]
    public ?Status $status;

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
     * @param ActionType|value-of<ActionType> $action_type
     * @param array<string,mixed>|null $settings
     * @param Status|array{reason?: string|null, value?: value-of<Value>|null} $status
     */
    public static function with(
        ?string $id = null,
        ActionType|string|null $action_type = null,
        ?string $created_at = null,
        ?string $record_type = null,
        ?array $settings = null,
        ?string $sim_card_id = null,
        Status|array|null $status = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $action_type && $obj['action_type'] = $action_type;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $settings && $obj['settings'] = $settings;
        null !== $sim_card_id && $obj['sim_card_id'] = $sim_card_id;
        null !== $status && $obj['status'] = $status;
        null !== $updated_at && $obj['updated_at'] = $updated_at;

        return $obj;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

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
        $obj['action_type'] = $actionType;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * A JSON object representation of the action params.
     *
     * @param array<string,mixed>|null $settings
     */
    public function withSettings(?array $settings): self
    {
        $obj = clone $this;
        $obj['settings'] = $settings;

        return $obj;
    }

    /**
     * The related SIM card identifier.
     */
    public function withSimCardID(string $simCardID): self
    {
        $obj = clone $this;
        $obj['sim_card_id'] = $simCardID;

        return $obj;
    }

    /**
     * @param Status|array{reason?: string|null, value?: value-of<Value>|null} $status
     */
    public function withStatus(Status|array $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }
}
