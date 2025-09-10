<?php

declare(strict_types=1);

namespace Telnyx\Fqdns;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type fqdn_get_response = array{data?: Fqdn|null}
 */
final class FqdnGetResponse implements BaseModel
{
    /** @use SdkModel<fqdn_get_response> */
    use SdkModel;

    #[Api(optional: true)]
    public ?Fqdn $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?Fqdn $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(Fqdn $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
