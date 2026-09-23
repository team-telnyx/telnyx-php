<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ReferShape from \Telnyx\AI\Assistants\AssistantTool\SipReferTool\Refer
 *
 * @phpstan-type SipReferToolShape = array{
 *   refer: Refer|ReferShape, type: 'refer', shared?: bool|null
 * }
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
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    #[Optional]
    public ?bool $shared;

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
    public static function with(Refer|array $refer, ?bool $shared = null): self
    {
        $self = new self;

        $self['refer'] = $refer;

        null !== $shared && $self['shared'] = $shared;

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

    /**
     * @param 'refer' $type
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
