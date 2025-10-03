<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\AI\Assistants\HangupTool\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type hangup_tool = array{
 *   hangup: HangupToolParams, type: value-of<Type>
 * }
 */
final class HangupTool implements BaseModel
{
    /** @use SdkModel<hangup_tool> */
    use SdkModel;

    #[Api]
    public HangupToolParams $hangup;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new HangupTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * HangupTool::with(hangup: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new HangupTool)->withHangup(...)->withType(...)
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
     *
     * @param Type|value-of<Type> $type
     */
    public static function with(
        HangupToolParams $hangup,
        Type|string $type
    ): self {
        $obj = new self;

        $obj->hangup = $hangup;
        $obj['type'] = $type;

        return $obj;
    }

    public function withHangup(HangupToolParams $hangup): self
    {
        $obj = clone $this;
        $obj->hangup = $hangup;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }
}
