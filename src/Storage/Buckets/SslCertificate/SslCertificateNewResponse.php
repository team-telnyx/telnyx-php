<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\SslCertificate;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificate\IssuedBy;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificate\IssuedTo;

/**
 * @phpstan-type SslCertificateNewResponseShape = array{data?: SslCertificate|null}
 */
final class SslCertificateNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<SslCertificateNewResponseShape> */
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
     *
     * @param SslCertificate|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   issued_by?: IssuedBy|null,
     *   issued_to?: IssuedTo|null,
     *   valid_from?: \DateTimeInterface|null,
     *   valid_to?: \DateTimeInterface|null,
     * } $data
     */
    public static function with(SslCertificate|array|null $data = null): self
    {
        $obj = new self;

        null !== $data && $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param SslCertificate|array{
     *   id?: string|null,
     *   created_at?: \DateTimeInterface|null,
     *   issued_by?: IssuedBy|null,
     *   issued_to?: IssuedTo|null,
     *   valid_from?: \DateTimeInterface|null,
     *   valid_to?: \DateTimeInterface|null,
     * } $data
     */
    public function withData(SslCertificate|array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }
}
