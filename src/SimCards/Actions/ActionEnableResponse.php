<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ActionEnableResponseShape = array{data?: SimCardAction|null}
 */
final class ActionEnableResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ActionEnableResponseShape> */
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
     */
    public static function with(?SimCardAction $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    /**
     * This object represents a SIM card action. It allows tracking the current status of an operation that impacts the SIM card.
     */
    public function withData(SimCardAction $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
