<?php

declare(strict_types=1);

namespace Telnyx\ManagedAccounts\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\ManagedAccounts\ManagedAccount;

/**
 * @phpstan-type ActionDisableResponseShape = array{data?: ManagedAccount|null}
 */
final class ActionDisableResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ActionDisableResponseShape> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?ManagedAccount $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?ManagedAccount $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(ManagedAccount $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
