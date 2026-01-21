<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\AssistantTool;

use Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TransferShape from \Telnyx\AI\Assistants\AssistantTool\InferenceEmbeddingTransferTool\Transfer
 *
 * @phpstan-type InferenceEmbeddingTransferToolShape = array{
 *   transfer: Transfer|TransferShape, type: 'transfer'
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
    public static function with(Transfer|array $transfer): self
    {
        $self = new self;

        $self['transfer'] = $transfer;

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
}
