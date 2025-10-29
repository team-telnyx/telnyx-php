<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPProtocols\GlobalIPProtocolListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   code?: string, name?: string, recordType?: string
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The Global IP Protocol code.
     */
    #[Api(optional: true)]
    public ?string $code;

    /**
     * A name for Global IP Protocol.
     */
    #[Api(optional: true)]
    public ?string $name;

    /**
     * Identifies the type of the resource.
     */
    #[Api('record_type', optional: true)]
    public ?string $recordType;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $code = null,
        ?string $name = null,
        ?string $recordType = null
    ): self {
        $obj = new self;

        null !== $code && $obj->code = $code;
        null !== $name && $obj->name = $name;
        null !== $recordType && $obj->recordType = $recordType;

        return $obj;
    }

    /**
     * The Global IP Protocol code.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj->code = $code;

        return $obj;
    }

    /**
     * A name for Global IP Protocol.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj->name = $name;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj->recordType = $recordType;

        return $obj;
    }
}
