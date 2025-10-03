<?php

declare(strict_types=1);

namespace Telnyx\Storage\MigrationSources;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type migration_source_delete_response = array{
 *   data?: MigrationSourceParams
 * }
 */
final class MigrationSourceDeleteResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<migration_source_delete_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?MigrationSourceParams $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?MigrationSourceParams $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(MigrationSourceParams $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
