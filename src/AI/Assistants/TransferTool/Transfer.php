<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\TransferTool;

use Telnyx\AI\Assistants\TransferTool\Transfer\Target;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TargetShape from \Telnyx\AI\Assistants\TransferTool\Transfer\Target
 *
 * @phpstan-type TransferShape = array{
 *   from: string, targets: list<Target|TargetShape>
 * }
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
     * The different possible targets of the transfer. The assistant will be able to choose one of the targets to transfer the call to.
     *
     * @var list<Target> $targets
     */
    #[Required(list: Target::class)]
    public array $targets;

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
     * @param list<Target|TargetShape> $targets
     */
    public static function with(string $from, array $targets): self
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
     * The different possible targets of the transfer. The assistant will be able to choose one of the targets to transfer the call to.
     *
     * @param list<Target|TargetShape> $targets
     */
    public function withTargets(array $targets): self
    {
        $self = clone $this;
        $self['targets'] = $targets;

        return $self;
    }
}
