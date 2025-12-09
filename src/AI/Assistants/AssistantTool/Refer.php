<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\Refer\Refer\CustomHeader;
use Telnyx\AI\Assistants\AssistantTool\Refer\Refer\SipHeader;
use Telnyx\AI\Assistants\AssistantTool\Refer\Refer\Target;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ReferShape = array{
 *   refer: \Telnyx\AI\Assistants\AssistantTool\Refer\Refer, type?: 'refer'
 * }
 */
final class Refer implements BaseModel
{
    /** @use SdkModel<ReferShape> */
    use SdkModel;

    /** @var 'refer' $type */
    #[Required]
    public string $type = 'refer';

    #[Required]
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
     *
     * @param Refer\Refer|array{
     *   targets: list<Target>,
     *   customHeaders?: list<CustomHeader>|null,
     *   sipHeaders?: list<SipHeader>|null,
     * } $refer
     */
    public static function with(
        Refer\Refer|array $refer
    ): self {
        $self = new self;

        $self['refer'] = $refer;

        return $self;
    }

    /**
     * @param Refer\Refer|array{
     *   targets: list<Target>,
     *   customHeaders?: list<CustomHeader>|null,
     *   sipHeaders?: list<SipHeader>|null,
     * } $refer
     */
    public function withRefer(
        Refer\Refer|array $refer
    ): self {
        $self = clone $this;
        $self['refer'] = $refer;

        return $self;
    }
}
