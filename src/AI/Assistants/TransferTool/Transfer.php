<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TransferTool;

use Telnyx\AI\Assistants\TransferTool\Transfer\Targets;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TargetsVariants from \Telnyx\AI\Assistants\TransferTool\Transfer\Targets
 * @phpstan-import-type TargetsShape from \Telnyx\AI\Assistants\TransferTool\Transfer\Targets
 *
 * @phpstan-type TransferShape = array{from: string, targets: TargetsShape}
 */
final class Transfer implements BaseModel
{
    /** @use SdkModel<TransferShape> */
    use SdkModel;

    /**
     * Number or SIP URI placing the call.
     */
    #[Required]
    public string $from;

    /**
     * The different possible targets of the transfer. The assistant will be able to choose one of the targets to transfer the call to. This can also be a dynamic variable string like `{{ targets }}` where `targets` is returned by the dynamic variables webhook and resolves to an array of target objects at runtime.
     *
     * @var TargetsVariants $targets
     */
    #[Required(union: Targets::class)]
    public string|array $targets;

    /**
     * `new Transfer()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Transfer::with(from: ..., targets: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Transfer)->withFrom(...)->withTargets(...)
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
     * @param TargetsShape $targets
     */
    public static function with(string $from, string|array $targets): self
    {
        $self = new self;

        $self['from'] = $from;
        $self['targets'] = $targets;

        return $self;
    }

    /**
     * Number or SIP URI placing the call.
     */
    public function withFrom(string $from): self
    {
        $self = clone $this;
        $self['from'] = $from;

        return $self;
    }

    /**
     * The different possible targets of the transfer. The assistant will be able to choose one of the targets to transfer the call to. This can also be a dynamic variable string like `{{ targets }}` where `targets` is returned by the dynamic variables webhook and resolves to an array of target objects at runtime.
     *
     * @param TargetsShape $targets
     */
    public function withTargets(string|array $targets): self
    {
        $self = clone $this;
        $self['targets'] = $targets;

        return $self;
    }
}
