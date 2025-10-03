<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type sim_card_get_response = array{data?: SimCard}
 */
final class SimCardGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<sim_card_get_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?SimCard $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?SimCard $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(SimCard $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
