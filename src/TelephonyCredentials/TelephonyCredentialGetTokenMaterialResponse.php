<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TokenMaterialShape from \Telnyx\TelephonyCredentials\TokenMaterial
 *
 * @phpstan-type TelephonyCredentialGetTokenMaterialResponseShape = array{
 *   data?: null|TokenMaterial|TokenMaterialShape
 * }
 */
final class TelephonyCredentialGetTokenMaterialResponse implements BaseModel
{
    /** @use SdkModel<TelephonyCredentialGetTokenMaterialResponseShape> */
    use SdkModel;

    /**
     * What a server needs to mint login tokens for the credential itself, with no request per token (`TelephonyCredential#to_jwt` in telnyx-ruby 3.1.0 or later). As sensitive as `sip_password`: keep it on the server.
     */
    #[Optional]
    public ?TokenMaterial $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TokenMaterial|TokenMaterialShape|null $data
     */
    public static function with(TokenMaterial|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * What a server needs to mint login tokens for the credential itself, with no request per token (`TelephonyCredential#to_jwt` in telnyx-ruby 3.1.0 or later). As sensitive as `sip_password`: keep it on the server.
     *
     * @param TokenMaterial|TokenMaterialShape $data
     */
    public function withData(TokenMaterial|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
