<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TransferShape from \Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer
 *
 * @phpstan-type InferenceEmbeddingTransferToolShape = array{
 *   transfer: Transfer|TransferShape, type: 'transfer', shared?: bool|null
 * }
 */
final class InferenceEmbeddingTransferTool implements BaseModel
{
    /** @use SdkModel<InferenceEmbeddingTransferToolShape> */
    use SdkModel;

    /** @var 'transfer' $type */
    #[Required]
    public string $type = 'transfer';

    #[Required]
    public Transfer $transfer;

    /**
     * Whether this tool comes from the shared Tools Library. Responses merge shared tools into `tools` with `shared: true`; inline tools carry `shared: false`. Read-only: set by the server, not accepted in requests. When updating an assistant, omit `shared: true` tools from the request `tools` array and manage them through `tool_ids` instead — re-sending their definitions creates an inline duplicate (rejected with error code 10015 when the type allows only one instance per assistant).
     */
    #[Optional]
    public ?bool $shared;

    /**
     * `new InferenceEmbeddingTransferTool()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * InferenceEmbeddingTransferTool::with(transfer: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new InferenceEmbeddingTransferTool)->withTransfer(...)
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
     * @param Transfer|TransferShape $transfer
     */
    public static function with(
        Transfer|array $transfer,
        ?bool $shared = null
    ): self {
        $self = new self;

        $self['transfer'] = $transfer;

        null !== $shared && $self['shared'] = $shared;

        return $self;
    }

    /**
     * @param Transfer|TransferShape $transfer
     */
    public function withTransfer(Transfer|array $transfer): self
    {
        $self = clone $this;
        $self['transfer'] = $transfer;

        return $self;
    }

    /**
     * @param 'transfer' $type
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
