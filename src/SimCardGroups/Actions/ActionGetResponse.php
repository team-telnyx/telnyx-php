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
 * @phpstan-type ActionGetResponseShape = array{data?: SimCardGroupAction|null}
 */
final class ActionGetResponse implements BaseModel
{
    /** @use SdkModel<ActionGetResponseShape> */
    use SdkModel;

    /**
     * This object represents a SIM card group action request. It allows tracking the current status of an operation that impacts the SIM card group and SIM card in it.
     */
    #[Api(optional: true)]
    public ?SimCardGroupAction $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SimCardGroupAction|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   settings?: Settings|null,
     *   sim_card_group_id?: string|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(SimCardGroupAction|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * This object represents a SIM card group action request. It allows tracking the current status of an operation that impacts the SIM card group and SIM card in it.
     *
     * @param SimCardGroupAction|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   settings?: Settings|null,
     *   sim_card_group_id?: string|null,
     *   status?: value-of<Status>|null,
     *   type?: value-of<Type>|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(SimCardGroupAction|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
