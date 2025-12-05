<?php

declare(strict_types=1);

namespace Telnyx\Texml\Accounts\Conferences\Participants\ParticipantParticipantsParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CustomHeaderShape = array{name: string, value: string}
 */
final class CustomHeader implements BaseModel
{
    /** @use SdkModel<CustomHeaderShape> */
    use SdkModel;

    /**
     * The name of the custom header.
     */
    #[Api]
    public string $name;

    /**
     * The value of the custom header.
     */
    #[Api]
    public string $value;

    /**
     * `new CustomHeader()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CustomHeader::with(name: ..., value: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CustomHeader)->withName(...)->withValue(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(string $name, string $value): self
    {
        $obj = new self;

        $obj['name'] = $name;
        $obj['value'] = $value;

        return $obj;
    }

    /**
     * The name of the custom header.
     */
    public function withName(string $name): self
    {
        $obj = clone $this;
        $obj['name'] = $name;

        return $obj;
    }

    /**
     * The value of the custom header.
     */
    public function withValue(string $value): self
    {
        $obj = clone $this;
        $obj['value'] = $value;

        return $obj;
    }
}
