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
 *   action_type?: value-of<ActionType>|null,
 *   created_at?: string|null,
 *   record_type?: string|null,
 *   settings?: array<string,mixed>|null,
 *   sim_card_actions_summary?: list<SimCardActionsSummary>|null,
 *   updated_at?: string|null,
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
     * @var value-of<ActionType>|null $action_type
     */
    #[Optional(enum: ActionType::class)]
    public ?string $action_type;

    /**
     * ISO 8601 formatted date-time indicating when the resource was created.
     */
    #[Optional]
    public ?string $created_at;

    #[Optional]
    public ?string $record_type;

    /**
     * A JSON object representation of the bulk action payload.
     *
     * @var array<string,mixed>|null $settings
     */
    #[Optional(map: 'mixed')]
    public ?array $settings;

    /** @var list<SimCardActionsSummary>|null $sim_card_actions_summary */
    #[Optional(list: SimCardActionsSummary::class)]
    public ?array $sim_card_actions_summary;

    /**
     * ISO 8601 formatted date-time indicating when the resource was updated.
     */
    #[Optional]
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
     * @param array<string,mixed> $settings
     * @param list<SimCardActionsSummary|array{
     *   count?: int|null, status?: value-of<Status>|null
     * }> $sim_card_actions_summary
     */
    public static function with(
        ?string $id = null,
        ActionType|string|null $action_type = null,
        ?string $created_at = null,
        ?string $record_type = null,
        ?array $settings = null,
        ?array $sim_card_actions_summary = null,
        ?string $updated_at = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $action_type && $obj['action_type'] = $action_type;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $settings && $obj['settings'] = $settings;
        null !== $sim_card_actions_summary && $obj['sim_card_actions_summary'] = $sim_card_actions_summary;
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
     * <li><code>bulk_set_public_ips</code> - set a public IP for each specified SIM card.</li>
     * </ul>.
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
        $obj['sim_card_actions_summary'] = $simCardActionsSummary;

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
