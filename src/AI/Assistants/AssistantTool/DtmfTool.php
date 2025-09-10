<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\DtmfTool\Type;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type dtmf_tool = array{
 *   sendDtmf: array<string, mixed>, type: value-of<Type>
 * }
 */
final class DtmfTool implements BaseModel
{
    /** @use SdkModel<dtmf_tool> */
    use SdkModel;

    /** @var array<string, mixed> $sendDtmf */
    #[Api('send_dtmf', map: 'mixed')]
    public array $sendDtmf;

    /** @var value-of<Type> $type */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * `new DtmfTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DtmfTool::with(sendDtmf: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DtmfTool)->withSendDtmf(...)->withType(...)
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
     * @param array<string, mixed> $sendDtmf
     * @param Type|value-of<Type> $type
     */
    public static function with(array $sendDtmf, Type|string $type): self
    {
        $obj = new self;

        $obj->sendDtmf = $sendDtmf;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }

    /**
     * @param array<string, mixed> $sendDtmf
     */
    public function withSendDtmf(array $sendDtmf): self
    {
        $obj = clone $this;
        $obj->sendDtmf = $sendDtmf;

        return $obj;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj->type = $type instanceof Type ? $type->value : $type;

        return $obj;
    }
}
