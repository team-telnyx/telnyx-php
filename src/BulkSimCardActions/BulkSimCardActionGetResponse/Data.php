<?php

declare(strict_types=1);

namespace Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse;

use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse\Data\ActionType;
use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse\Data\SimCardActionsSummary;
use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse\Data\SimCardActionsSummary\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   id?: string|null,
 *   actionType?: value-of<ActionType>|null,
 *   createdAt?: string|null,
 *   recordType?: string|null,
 *   settings?: array<string,mixed>|null,
 *   simCardActionsSummary?: list<SimCardActionsSummary>|null,
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

    /** @var list<SimCardActionsSummary>|null $simCardActionsSummary */
    #[Optional('sim_card_actions_summary', list: SimCardActionsSummary::class)]
    public ?array $simCardActionsSummary;

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
     * @param list<SimCardActionsSummary|array{
     *   count?: int|null, status?: value-of<Status>|null
     * }> $simCardActionsSummary
     */
    public static function with(
        ?string $id = null,
        ActionType|string|null $actionType = null,
        ?string $createdAt = null,
        ?string $recordType = null,
        ?array $settings = null,
        ?array $simCardActionsSummary = null,
        ?string $updatedAt = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $actionType && $obj['actionType'] = $actionType;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $settings && $obj['settings'] = $settings;
        null !== $simCardActionsSummary && $obj['simCardActionsSummary'] = $simCardActionsSummary;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

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
     * <li><code>bulk_set_public_ips</code> - set a public IP for each specified SIM card.</li>
     * </ul>.
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
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * A JSON object representation of the bulk action payload.
     *
     * @param array<string,mixed> $settings
     */
    public function withSettings(array $settings): self
    {
        $obj = clone $this;
        $obj['settings'] = $settings;

        return $obj;
    }

    /**
     * @param list<SimCardActionsSummary|array{
     *   count?: int|null, status?: value-of<Status>|null
     * }> $simCardActionsSummary
     */
    public function withSimCardActionsSummary(
        array $simCardActionsSummary
    ): self {
        $obj = clone $this;
        $obj['simCardActionsSummary'] = $simCardActionsSummary;

        return $obj;
    }

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
