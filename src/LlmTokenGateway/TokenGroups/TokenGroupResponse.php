<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TokenGroupShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroup
 *
 * @phpstan-type TokenGroupResponseShape = array{data: TokenGroup|TokenGroupShape}
 */
final class TokenGroupResponse implements BaseModel
{
    /** @use SdkModel<TokenGroupResponseShape> */
    use SdkModel;

    #[Required]
    public TokenGroup $data;

    /**
     * `new TokenGroupResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TokenGroupResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TokenGroupResponse)->withData(...)
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
     * @param TokenGroup|TokenGroupShape $data
     */
    public static function with(TokenGroup|array $data): self
    {
        $self = new self;

        $self['data'] = $data;

        return $self;
    }

    /**
     * @param TokenGroup|TokenGroupShape $data
     */
    public function withData(TokenGroup|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
