<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type SessionShape from \Telnyx\BrowserSessions\Session
 *
 * @phpstan-type BrowserSessionNewResponseShape = array{
 *   data?: null|Session|SessionShape
 * }
 */
final class BrowserSessionNewResponse implements BaseModel
{
    /** @use SdkModel<BrowserSessionNewResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Session $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Session|SessionShape|null $data
     */
    public static function with(Session|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Session|SessionShape $data
     */
    public function withData(Session|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
