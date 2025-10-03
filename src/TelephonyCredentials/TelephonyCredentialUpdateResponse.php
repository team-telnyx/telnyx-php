<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type telephony_credential_update_response = array{
 *   data?: TelephonyCredential
 * }
 */
final class TelephonyCredentialUpdateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<telephony_credential_update_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?TelephonyCredential $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?TelephonyCredential $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(TelephonyCredential $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
