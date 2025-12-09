<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Optional;
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
 *   actionType?: value-of<ActionType>|null,
 *   createdAt?: string|null,
 *   recordType?: string|null,
 *   settings?: array<string,mixed>|null,
 *   simCardID?: string|null,
 *   status?: Status|null,
 *   updatedAt?: string|null,
 * }
 */
final class SimCardAction implements BaseModel
{
    /** @use SdkModel<SimCardActionShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
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
    #[Optional('action_type', enum: ActionType::class)]
    public ?string $actionType;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    #[Optional('record_type')]
    public ?string $recordType;

    /**
     * A JSON object representation of the action params.
     *
     * @var array<string,mixed>|null $settings
     */
    #[Optional(map: 'mixed', nullable: true)]
    public ?array $settings;

    /**
     * The related SIM card identifier.
     */
    #[Optional('sim_card_id')]
    public ?string $simCardID;

    #[Optional]
    public ?Status $status;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
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
     * @param ActionType|value-of<ActionType> $actionType
     * @param array<string,mixed>|null $settings
     * @param Status|array{reason?: string|null, value?: value-of<Value>|null} $status
     */
    public static function with(
        ?string $id = null,
        ActionType|string|null $actionType = null,
        ?string $createdAt = null,
        ?string $recordType = null,
        ?array $settings = null,
        ?string $simCardID = null,
        Status|array|null $status = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $actionType && $self['actionType'] = $actionType;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $settings && $self['settings'] = $settings;
        null !== $simCardID && $self['simCardID'] = $simCardID;
        null !== $status && $self['status'] = $status;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Identifies the resource.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
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
        $self = clone $this;
        $self['actionType'] = $actionType;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * A JSON object representation of the action params.
     *
     * @param array<string,mixed>|null $settings
     */
    public function withSettings(?array $settings): self
    {
        $self = clone $this;
        $self['settings'] = $settings;

        return $self;
    }

    /**
     * The related SIM card identifier.
     */
    public function withSimCardID(string $simCardID): self
    {
        $self = clone $this;
        $self['simCardID'] = $simCardID;

        return $self;
    }

    /**
     * @param Status|array{reason?: string|null, value?: value-of<Value>|null} $status
     */
    public function withStatus(Status|array $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
