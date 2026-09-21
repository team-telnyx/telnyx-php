<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type DtmfToolShape = array{
 *   sendDtmf: array<string,mixed>, type: 'send_dtmf', shared?: bool|null
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
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    #[Optional]
    public ?bool $shared;

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
    public static function with(array $sendDtmf, ?bool $shared = null): self
    {
        $self = new self;

        $self['sendDtmf'] = $sendDtmf;

        null !== $shared && $self['shared'] = $shared;

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

    /**
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    public function withShared(bool $shared): self
    {
        $self = clone $this;
        $self['shared'] = $shared;

        return $self;
    }
}
