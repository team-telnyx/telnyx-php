<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\LogMessages\LogMessageListResponse\LogMessage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type source_alias = array{pointer?: string|null}
 */
final class Source implements BaseModel
{
    /** @use SdkModel<source_alias> */
    use SdkModel;

    /**
     * JSON pointer (RFC6901) to the offending entity.
     */
    #[Api(optional: true)]
    public ?string $pointer;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $pointer = null): self
    {
        $obj = new self;

        null !== $pointer && $obj->pointer = $pointer;

        return $obj;
    }

    /**
     * JSON pointer (RFC6901) to the offending entity.
     */
    public function withPointer(string $pointer): self
    {
        $obj = clone $this;
        $obj->pointer = $pointer;

        return $obj;
    }
}
