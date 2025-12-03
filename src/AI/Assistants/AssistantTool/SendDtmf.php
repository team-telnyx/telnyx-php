<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type SendDtmfShape = array{
 *   send_dtmf: array<string,mixed>, type: 'send_dtmf'
 * }
 */
final class SendDtmf implements BaseModel
{
    /** @use SdkModel<SendDtmfShape> */
    use SdkModel;

    /** @var 'send_dtmf' $type */
    #[Api]
    public string $type = 'send_dtmf';

    /** @var array<string,mixed> $send_dtmf */
    #[Api(map: 'mixed')]
    public array $send_dtmf;

    /**
     * `new SendDtmf()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * SendDtmf::with(send_dtmf: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new SendDtmf)->withSendDtmf(...)
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
     * @param array<string,mixed> $send_dtmf
     */
    public static function with(array $send_dtmf): self
    {
        $obj = new self;

        $obj->send_dtmf = $send_dtmf;

        return $obj;
    }

    /**
     * @param array<string,mixed> $sendDtmf
     */
    public function withSendDtmf(array $sendDtmf): self
    {
        $obj = clone $this;
        $obj->send_dtmf = $sendDtmf;

        return $obj;
    }
}
