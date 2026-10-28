<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ActionResponseShape from \Telnyx\BrowserSessions\Actions\ActionResponse
 *
 * @phpstan-type ActionNewResponseShape = array{
 *   data?: null|ActionResponse|ActionResponseShape
 * }
 */
final class ActionNewResponse implements BaseModel
{
    /** @use SdkModel<ActionNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?ActionResponse $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ActionResponse|ActionResponseShape|null $data
     */
    public static function with(ActionResponse|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param ActionResponse|ActionResponseShape $data
     */
    public function withData(ActionResponse|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
