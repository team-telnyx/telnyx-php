<?php

declare(strict_types=1);

namespace Telnyx\Storage\Migrations\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Storage\Migrations\MigrationParams;

/**
 * @phpstan-type action_stop_response = array{data?: MigrationParams}
 */
final class ActionStopResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<action_stop_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?MigrationParams $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?MigrationParams $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(MigrationParams $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
