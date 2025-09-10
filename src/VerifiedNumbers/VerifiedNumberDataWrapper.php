<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type verified_number_data_wrapper = array{data?: VerifiedNumber|null}
 */
final class VerifiedNumberDataWrapper implements BaseModel
{
    /** @use SdkModel<verified_number_data_wrapper> */
    use SdkModel;

    #[Api(optional: true)]
    public ?VerifiedNumber $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?VerifiedNumber $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(VerifiedNumber $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
