<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions\ActionBulkSetPublicIPsResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\Actions\ActionBulkSetPublicIPsResponse\Data\ActionType;

/**
 * This object represents a bulk SIM card action. It groups SIM card actions created through a bulk endpoint under a single resource for further lookup.
 *
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   actionType?: null|ActionType|value-of<ActionType>,
 *   createdAt?: string|null,
 *   recordType?: string|null,
 *   settings?: array<string,mixed>|null,
 *   updatedAt?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Identifies the resource.
     */
    #[Optional]
    public ?string $id;

    /**
     * The operation type. It can be one of the following: <br/>
     * <ul>
     * <li><code>bulk_set_public_ips</code> - set a public IP for each specified SIM card.</li>
     * </ul>.
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
     * A JSON object representation of the bulk action payload.
     *
     * @var array<string,mixed>|null $settings
     */
    #[Optional(map: 'mixed')]
    public ?array $settings;

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
     * @param array<string,mixed> $settings
     */
    public static function with(
        ?string $id = null,
        ActionType|string|null $actionType = null,
        ?string $createdAt = null,
        ?string $recordType = null,
        ?array $settings = null,
        ?string $updatedAt = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $actionType && $self['actionType'] = $actionType;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $settings && $self['settings'] = $settings;
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
     * <li><code>bulk_set_public_ips</code> - set a public IP for each specified SIM card.</li>
     * </ul>.
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
     * A JSON object representation of the bulk action payload.
     *
     * @param array<string,mixed> $settings
     */
    public function withSettings(array $settings): self
    {
        $self = clone $this;
        $self['settings'] = $settings;

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
