<?php

declare(strict_types=1);

namespace Telnyx\Storage\MigrationSources;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type migration_source_get_response = array{
 *   data?: MigrationSourceParams
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class MigrationSourceGetResponse implements BaseModel
{
    /** @use SdkModel<migration_source_get_response> */
    use SdkModel;

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
