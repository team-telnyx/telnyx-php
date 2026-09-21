<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\HangupToolParams;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type HangupToolParamsShape from \Telnyx\AI\Assistants\HangupToolParams
 *
 * @phpstan-type InferenceEmbeddingHangupToolShape = array{
 *   hangup: HangupToolParams|HangupToolParamsShape,
 *   type: 'hangup',
 *   shared?: bool|null,
 * }
 */
final class InferenceEmbeddingHangupTool implements BaseModel
{
    /** @use SdkModel<InferenceEmbeddingHangupToolShape> */
    use SdkModel;

    /** @var 'hangup' $type */
    #[Required]
    public string $type = 'hangup';

    #[Required]
    public HangupToolParams $hangup;

    /**
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    #[Optional]
    public ?bool $shared;

    /**
     * `new InferenceEmbeddingHangupTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InferenceEmbeddingHangupTool::with(hangup: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InferenceEmbeddingHangupTool)->withHangup(...)
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
     * @param HangupToolParams|HangupToolParamsShape $hangup
     */
    public static function with(
        HangupToolParams|array $hangup,
        ?bool $shared = null
    ): self {
        $self = new self;

        $self['hangup'] = $hangup;

        null !== $shared && $self['shared'] = $shared;

        return $self;
    }

    /**
     * @param HangupToolParams|HangupToolParamsShape $hangup
     */
    public function withHangup(HangupToolParams|array $hangup): self
    {
        $self = clone $this;
        $self['hangup'] = $hangup;

        return $self;
    }

    /**
     * @param 'hangup' $type
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
