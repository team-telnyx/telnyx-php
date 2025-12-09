<?php

declare(strict_types=1);

namespace Telnyx\BulkSimCardActions;

use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse\Data;
use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse\Data\ActionType;
use Telnyx\BulkSimCardActions\BulkSimCardActionGetResponse\Data\SimCardActionsSummary;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type BulkSimCardActionGetResponseShape = array{data?: Data|null}
 */
final class BulkSimCardActionGetResponse implements BaseModel
{
    /** @use SdkModel<BulkSimCardActionGetResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|array{
     *   id?: string|null,
     *   actionType?: value-of<ActionType>|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   settings?: array<string,mixed>|null,
     *   simCardActionsSummary?: list<SimCardActionsSummary>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   id?: string|null,
     *   actionType?: value-of<ActionType>|null,
     *   createdAt?: string|null,
     *   recordType?: string|null,
     *   settings?: array<string,mixed>|null,
     *   simCardActionsSummary?: list<SimCardActionsSummary>|null,
     *   updatedAt?: string|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
