<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type sim_card_group_update_response = array{data?: SimCardGroup}
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class SimCardGroupUpdateResponse implements BaseModel
{
    /** @use SdkModel<sim_card_group_update_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?SimCardGroup $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?SimCardGroup $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(SimCardGroup $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
