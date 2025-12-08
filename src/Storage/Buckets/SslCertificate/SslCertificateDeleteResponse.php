<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\SslCertificate;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificate\IssuedBy;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificate\IssuedTo;

/**
 * @phpstan-type SslCertificateDeleteResponseShape = array{
 *   data?: SslCertificate|null
 * }
 */
final class SslCertificateDeleteResponse implements BaseModel
{
    /** @use SdkModel<SslCertificateDeleteResponseShape> */
    use SdkModel;

    #[Optional]
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
