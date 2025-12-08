<?php

declare(strict_types=1);

namespace Telnyx\Rooms\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Rooms\Actions\ActionGenerateJoinClientTokenResponse\Data;

/**
 * @phpstan-type ActionGenerateJoinClientTokenResponseShape = array{
 *   data?: Data|null
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
     * @param Data|array{
     *   token?: string|null,
     *   refresh_token?: string|null,
     *   refresh_token_expires_at?: \DateTimeInterface|null,
     *   token_expires_at?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param Data|array{
     *   token?: string|null,
     *   refresh_token?: string|null,
     *   refresh_token_expires_at?: \DateTimeInterface|null,
     *   token_expires_at?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(Data|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
