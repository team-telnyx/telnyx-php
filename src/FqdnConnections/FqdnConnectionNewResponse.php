<?php

declare(strict_types=1);

namespace Telnyx\FqdnConnections;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type FqdnConnectionNewResponseShape = array{data?: FqdnConnection|null}
 */
final class FqdnConnectionNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<FqdnConnectionNewResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?FqdnConnection $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?FqdnConnection $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(FqdnConnection $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
