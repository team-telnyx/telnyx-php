<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\SimCards\Actions\SimCardAction\ActionType;
use Telnyx\SimCards\Actions\SimCardAction\Status;

/**
 * @phpstan-type ActionGetResponseShape = array{data?: SimCardAction|null}
 */
final class ActionGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ActionGetResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * This object represents a SIM card action. It allows tracking the current status of an operation that impacts the SIM card.
     */
    #[Api(optional: true)]
    public ?SimCardAction $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param SimCardAction|array{
     *   id?: string|null,
     *   action_type?: value-of<ActionType>|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   settings?: array<string,mixed>|null,
     *   sim_card_id?: string|null,
     *   status?: Status|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(SimCardAction|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * This object represents a SIM card action. It allows tracking the current status of an operation that impacts the SIM card.
     *
     * @param SimCardAction|array{
     *   id?: string|null,
     *   action_type?: value-of<ActionType>|null,
     *   created_at?: string|null,
     *   record_type?: string|null,
     *   settings?: array<string,mixed>|null,
     *   sim_card_id?: string|null,
     *   status?: Status|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(SimCardAction|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
