<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\DtmfTool\Type;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DtmfToolShape = array{
 *   sendDtmf: array<string,mixed>, type: value-of<Type>
 * }
 */
final class DtmfTool implements BaseModel
{
    /** @use SdkModel<DtmfToolShape> */
    use SdkModel;

    /** @var array<string,mixed> $sendDtmf */
    #[Required('send_dtmf', map: 'mixed')]
    public array $sendDtmf;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
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
     * @param array<string,mixed> $sendDtmf
     * @param Type|value-of<Type> $type
     */
    public static function with(array $sendDtmf, Type|string $type): self
    {
        $self = new self;

        $self['sendDtmf'] = $sendDtmf;
        $self['type'] = $type;

        return $self;
    }

    /**
     * @param array<string,mixed> $sendDtmf
     */
    public function withSendDtmf(array $sendDtmf): self
    {
        $self = clone $this;
        $self['sendDtmf'] = $sendDtmf;

        return $self;
    }

    /**
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
