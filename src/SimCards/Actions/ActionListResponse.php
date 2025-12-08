<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\Actions\SimCardAction\ActionType;
use Telnyx\SimCards\Actions\SimCardAction\Status;

/**
 * @phpstan-type ActionListResponseShape = array{
 *   data?: list<SimCardAction>|null, meta?: PaginationMeta|null
 * }
 */
final class ActionListResponse implements BaseModel
{
    /** @use SdkModel<ActionListResponseShape> */
    use SdkModel;

    /** @var list<SimCardAction>|null $data */
    #[Api(list: SimCardAction::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<SimCardAction|array{
     *   id?: string|null,
     *   action_type?: value-of<ActionType>|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   settings?: array<string,mixed>|null,
     *   sim_card_id?: string|null,
     *   status?: Status|null,
     *   updated_at?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<SimCardAction|array{
     *   id?: string|null,
     *   action_type?: value-of<ActionType>|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   settings?: array<string,mixed>|null,
     *   sim_card_id?: string|null,
     *   status?: Status|null,
     *   updated_at?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
