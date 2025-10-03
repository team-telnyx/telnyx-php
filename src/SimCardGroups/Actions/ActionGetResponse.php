<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type action_get_response = array{data?: SimCardGroupAction}
 */
final class ActionGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<action_get_response> */
    use SdkModel;

    use SdkResponse;

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
     */
    public static function with(?SimCardGroupAction $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    /**
     * This object represents a SIM card group action request. It allows tracking the current status of an operation that impacts the SIM card group and SIM card in it.
     */
    public function withData(SimCardGroupAction $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
