<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions\WaitForAction\Condition;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type KindShape = array{kind: 'dom_stable'}
 */
final class Kind implements BaseModel
{
    /** @use SdkModel<KindShape> */
    use SdkModel;

    /** @var 'dom_stable' $kind */
    #[Required]
    public string $kind = 'dom_stable';

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(): self
    {
        return new self;
    }

    /**
     * @param 'dom_stable' $kind
     */
    public function withKind(string $kind): self
    {
        $self = clone $this;
        $self['kind'] = $kind;

        return $self;
    }
}
