<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenKeys;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TokenKeyShape from \Telnyx\LlmTokenGateway\TokenKeys\TokenKey
 *
 * @phpstan-type TokenKeyResponseShape = array{data: TokenKey|TokenKeyShape}
 */
final class TokenKeyResponse implements BaseModel
{
    /** @use SdkModel<TokenKeyResponseShape> */
    use SdkModel;

    #[Required]
    public TokenKey $data;

    /**
     * `new TokenKeyResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TokenKeyResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TokenKeyResponse)->withData(...)
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
     * @param TokenKey|TokenKeyShape $data
     */
    public static function with(TokenKey|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param TokenKey|TokenKeyShape $data
     */
    public function withData(TokenKey|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
