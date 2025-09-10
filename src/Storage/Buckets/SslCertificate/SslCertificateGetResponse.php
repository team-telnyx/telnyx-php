<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\SslCertificate;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ssl_certificate_get_response = array{data?: SslCertificate|null}
 */
final class SslCertificateGetResponse implements BaseModel
{
    /** @use SdkModel<ssl_certificate_get_response> */
    use SdkModel;

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
