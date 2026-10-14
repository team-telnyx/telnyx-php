<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenKeys;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Revoke this token key. Acknowledged revocation blocks new admissions with the key; requests already admitted may complete. Historical usage attribution is retained. Other keys in the group are unchanged.
 *
 * @see Telnyx\Services\LlmTokenGateway\TokenKeysService::delete()
 *
 * @phpstan-type TokenKeyDeleteParamsShape = array{
 *   idempotencyKey: string, ifMatch: string
 * }
 */
final class TokenKeyDeleteParams implements BaseModel
{
    /** @use SdkModel<TokenKeyDeleteParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $idempotencyKey;

    #[Required]
    public string $ifMatch;

    /**
     * `new TokenKeyDeleteParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * TokenKeyDeleteParams::with(idempotencyKey: ..., ifMatch: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new TokenKeyDeleteParams)->withIdempotencyKey(...)->withIfMatch(...)
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
