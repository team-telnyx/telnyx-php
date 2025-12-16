<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\Actions\ActionGenerateJoinClientTokenResponse\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Rooms\Actions\ActionGenerateJoinClientTokenResponse\Data
 *
 * @phpstan-type ActionGenerateJoinClientTokenResponseShape = array{
 *   data?: null|Data|DataShape
 * }
 */
final class ActionGenerateJoinClientTokenResponse implements BaseModel
{
    /** @use SdkModel<ActionGenerateJoinClientTokenResponseShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param DataShape $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
