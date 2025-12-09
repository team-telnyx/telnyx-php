<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer\CustomHeader;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer\SipHeader;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer\Target;
use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Type;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SipReferToolShape = array{refer: Refer, type: value-of<Type>}
 */
final class SipReferTool implements BaseModel
{
    /** @use SdkModel<SipReferToolShape> */
    use SdkModel;

    #[Required]
    public Refer $refer;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
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
     * @param Refer|array{
     *   targets: list<Target>,
     *   customHeaders?: list<CustomHeader>|null,
     *   sipHeaders?: list<SipHeader>|null,
     * } $refer
     * @param Type|value-of<Type> $type
     */
    public static function with(Refer|array $refer, Type|string $type): self
    {
        $obj = new self;

        $obj['refer'] = $refer;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * @param Refer|array{
     *   targets: list<Target>,
     *   customHeaders?: list<CustomHeader>|null,
     *   sipHeaders?: list<SipHeader>|null,
     * } $refer
     */
    public function withRefer(Refer|array $refer): self
    {
        $obj = clone $this;
        $obj['refer'] = $refer;

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
