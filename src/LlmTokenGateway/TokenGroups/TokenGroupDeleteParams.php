<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Revoke resource and its keys atomically; retain historical attribution, never detach into an ungoverned service key.
 *
 * @see Telnyx\Services\LlmTokenGateway\TokenGroupsService::delete()
 *
 * @phpstan-type TokenGroupDeleteParamsShape = array{
 *   idempotencyKey: string, ifMatch: string
 * }
 */
final class TokenGroupDeleteParams implements BaseModel
{
    /** @use SdkModel<TokenGroupDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $idempotencyKey;

    #[Required]
    public string $ifMatch;

    /**
     * `new TokenGroupDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TokenGroupDeleteParams::with(idempotencyKey: ..., ifMatch: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TokenGroupDeleteParams)->withIdempotencyKey(...)->withIfMatch(...)
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
     */
    public static function with(string $idempotencyKey, string $ifMatch): self
    {
        $self = new self;

        $self['idempotencyKey'] = $idempotencyKey;
        $self['ifMatch'] = $ifMatch;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    public function withIfMatch(string $ifMatch): self
    {
        $self = clone $this;
        $self['ifMatch'] = $ifMatch;

        return $self;
    }
}
