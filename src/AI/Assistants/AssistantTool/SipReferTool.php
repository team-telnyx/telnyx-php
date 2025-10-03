<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type sip_refer_tool = array{refer: Refer, type: value-of<Type>}
 */
final class SipReferTool implements BaseModel
{
    /** @use SdkModel<sip_refer_tool> */
    use SdkModel;

    #[Api]
    public Refer $refer;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new SipReferTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SipReferTool::with(refer: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SipReferTool)->withRefer(...)->withType(...)
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
    public static function with(Refer $refer, Type|string $type): self
    {
        $obj = new self;

        $obj->refer = $refer;
        $obj['type'] = $type;

        return $obj;
    }

    public function withRefer(Refer $refer): self
    {
        $obj = clone $this;
        $obj->refer = $refer;

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
