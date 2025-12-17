<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ReferShape from \Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer
 *
 * @phpstan-type SipReferToolShape = array{refer: Refer|ReferShape, type: 'refer'}
 */
final class SipReferTool implements BaseModel
{
    /** @use SdkModel<SipReferToolShape> */
    use SdkModel;

    /** @var 'refer' $type */
    #[Required]
    public string $type = 'refer';

    #[Required]
    public Refer $refer;

    /**
     * `new SipReferTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SipReferTool::with(refer: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SipReferTool)->withRefer(...)
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
     * @param Refer|ReferShape $refer
     */
    public static function with(Refer|array $refer): self
    {
        $self = new self;

        $self['refer'] = $refer;

        return $self;
    }

    /**
     * @param Refer|ReferShape $refer
     */
    public function withRefer(Refer|array $refer): self
    {
        $self = clone $this;
        $self['refer'] = $refer;

        return $self;
    }
}
