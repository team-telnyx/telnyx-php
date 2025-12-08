<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardGroups\Actions\SimCardGroupAction\Settings;
use Telnyx\SimCardGroups\Actions\SimCardGroupAction\Status;
use Telnyx\SimCardGroups\Actions\SimCardGroupAction\Type;

/**
 * @phpstan-type ActionListResponseShape = array{
 *   data?: list<SimCardGroupAction>|null, meta?: PaginationMeta|null
 * }
 */
final class ActionListResponse implements BaseModel
{
    /** @use SdkModel<ActionListResponseShape> */
    use SdkModel;

    /** @var list<SimCardGroupAction>|null $data */
    #[Api(list: SimCardGroupAction::class, optional: true)]
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
     * @param list<SimCardGroupAction|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   settings?: Settings|null,
     *   sim_card_group_id?: string|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
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
     * @param list<SimCardGroupAction|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   settings?: Settings|null,
     *   sim_card_group_id?: string|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
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
