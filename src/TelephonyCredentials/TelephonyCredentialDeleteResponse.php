<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type TelephonyCredentialShape from \Telnyx\TelephonyCredentials\TelephonyCredential
 *
 * @phpstan-type TelephonyCredentialDeleteResponseShape = array{
 *   data?: null|TelephonyCredential|TelephonyCredentialShape
 * }
 */
final class TelephonyCredentialDeleteResponse implements BaseModel
{
    /** @use SdkModel<TelephonyCredentialDeleteResponseShape> */
    use SdkModel;

    #[Optional]
    public ?TelephonyCredential $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param TelephonyCredentialShape $data
     */
    public static function with(TelephonyCredential|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param TelephonyCredentialShape $data
     */
    public function withData(TelephonyCredential|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
