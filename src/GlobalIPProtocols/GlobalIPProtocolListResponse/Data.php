<?php

declare(strict_types=1);

namespace Telnyx\GlobalIPProtocols\GlobalIPProtocolListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DataShape = array{
 *   code?: string|null, name?: string|null, record_type?: string|null
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The Global IP Protocol code.
     */
    #[Optional]
    public ?string $code;

    /**
     * A name for Global IP Protocol.
     */
    #[Optional]
    public ?string $name;

    /**
     * Identifies the type of the resource.
     */
    #[Optional]
    public ?string $record_type;

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
        ?string $record_type = null
    ): self {
        $obj = new self;

        null !== $code && $obj['code'] = $code;
        null !== $name && $obj['name'] = $name;
        null !== $record_type && $obj['record_type'] = $record_type;

        return $obj;
    }

    /**
     * The Global IP Protocol code.
     */
    public function withCode(string $code): self
    {
        $obj = clone $this;
        $obj['code'] = $code;

        return $obj;
    }

    /**
     * A name for Global IP Protocol.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     */
    public function withRecordType(string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
