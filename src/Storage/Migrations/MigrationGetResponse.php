<?php

declare(strict_types=1);

namespace Telnyx\Storage\Migrations;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type migration_get_response = array{data?: MigrationParams}
 */
final class MigrationGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<migration_get_response> */
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
