<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DtmfToolShape = array{
 *   sendDtmf: array<string,mixed>, type: 'send_dtmf'
 * }
 */
final class DtmfTool implements BaseModel
{
    /** @use SdkModel<DtmfToolShape> */
    use SdkModel;

    /** @var 'send_dtmf' $type */
    #[Required]
    public string $type = 'send_dtmf';

    /** @var array<string,mixed> $sendDtmf */
    #[Required('send_dtmf', map: 'mixed')]
    public array $sendDtmf;

    /**
     * `new DtmfTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * DtmfTool::with(sendDtmf: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new DtmfTool)->withSendDtmf(...)
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
     */
    public static function with(array $sendDtmf): self
    {
        $self = new self;

        $self['sendDtmf'] = $sendDtmf;

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
     * @param 'send_dtmf' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
