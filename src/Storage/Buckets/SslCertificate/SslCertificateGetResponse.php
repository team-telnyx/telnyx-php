<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\SslCertificate;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type ssl_certificate_get_response = array{data?: SslCertificate}
 */
final class SslCertificateGetResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<ssl_certificate_get_response> */
    use SdkModel;

    use SdkResponse;

    #[Api(optional: true)]
    public ?SslCertificate $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?SslCertificate $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(SslCertificate $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
