<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReferShape = array{
 *   refer: \Telnyx\AI\Assistants\AssistantTool\Refer\Refer, type: 'refer'
 * }
 */
final class Refer implements BaseModel
{
    /** @use SdkModel<ReferShape> */
    use SdkModel;

    /** @var 'refer' $type */
    #[Api]
    public string $type = 'refer';

    #[Api]
    public Refer\Refer $refer;

    /**
     * `new Refer()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Refer::with(refer: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Refer)->withRefer(...)
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
    public static function with(
        Refer\Refer $refer
    ): self {
        $obj = new self;

        $obj->refer = $refer;

        return $obj;
    }

    public function withRefer(
        Refer\Refer $refer
    ): self {
        $obj = clone $this;
        $obj->refer = $refer;

        return $obj;
    }
}
