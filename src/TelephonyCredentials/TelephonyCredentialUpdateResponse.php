<?php

declare(strict_types=1);

namespace Telnyx\TelephonyCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type TelephonyCredentialUpdateResponseShape = array{
 *   data?: TelephonyCredential|null
 * }
 */
final class TelephonyCredentialUpdateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<TelephonyCredentialUpdateResponseShape> */
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
     *
     * @param TelephonyCredential|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   expired?: bool|null,
     *   expires_at?: string|null,
     *   name?: string|null,
     *   record_type?: string|null,
     *   resource_id?: string|null,
     *   sip_password?: string|null,
     *   sip_username?: string|null,
     *   updated_at?: string|null,
     * } $data
     */
    public static function with(TelephonyCredential|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param TelephonyCredential|array{
     *   id?: string|null,
     *   created_at?: string|null,
     *   expired?: bool|null,
     *   expires_at?: string|null,
     *   name?: string|null,
     *   record_type?: string|null,
     *   resource_id?: string|null,
     *   sip_password?: string|null,
     *   sip_username?: string|null,
     *   updated_at?: string|null,
     * } $data
     */
    public function withData(TelephonyCredential|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
