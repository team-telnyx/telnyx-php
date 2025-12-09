<?php

declare(strict_types=1);

namespace Telnyx\Storage\Buckets\SslCertificate;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificate\IssuedBy;
use Telnyx\Storage\Buckets\SslCertificate\SslCertificate\IssuedTo;

/**
 * @phpstan-type SslCertificateShape = array{
 *   id?: string|null,
 *   createdAt?: \DateTimeInterface|null,
 *   issuedBy?: IssuedBy|null,
 *   issuedTo?: IssuedTo|null,
 *   validFrom?: \DateTimeInterface|null,
 *   validTo?: \DateTimeInterface|null,
 * }
 */
final class SslCertificate implements BaseModel
{
    /** @use SdkModel<SslCertificateShape> */
    use SdkModel;

    /**
     * Unique identifier for the SSL certificate.
     */
    #[Optional]
    public ?string $id;

    /**
     * Time when SSL certificate was uploaded.
     */
    #[Optional('created_at')]
    public ?\DateTimeInterface $createdAt;

    #[Optional('issued_by')]
    public ?IssuedBy $issuedBy;

    #[Optional('issued_to')]
    public ?IssuedTo $issuedTo;

    /**
     * The time the certificate is valid from.
     */
    #[Optional('valid_from')]
    public ?\DateTimeInterface $validFrom;

    /**
     * The time the certificate is valid to.
     */
    #[Optional('valid_to')]
    public ?\DateTimeInterface $validTo;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param IssuedBy|array{
     *   commonName?: string|null,
     *   organization?: string|null,
     *   organizationUnit?: string|null,
     * } $issuedBy
     * @param IssuedTo|array{
     *   commonName?: string|null,
     *   organization?: string|null,
     *   organizationUnit?: string|null,
     * } $issuedTo
     */
    public static function with(
        ?string $id = null,
        ?\DateTimeInterface $createdAt = null,
        IssuedBy|array|null $issuedBy = null,
        IssuedTo|array|null $issuedTo = null,
        ?\DateTimeInterface $validFrom = null,
        ?\DateTimeInterface $validTo = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $issuedBy && $self['issuedBy'] = $issuedBy;
        null !== $issuedTo && $self['issuedTo'] = $issuedTo;
        null !== $validFrom && $self['validFrom'] = $validFrom;
        null !== $validTo && $self['validTo'] = $validTo;

        return $self;
    }

    /**
     * Unique identifier for the SSL certificate.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Time when SSL certificate was uploaded.
     */
    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * @param IssuedBy|array{
     *   commonName?: string|null,
     *   organization?: string|null,
     *   organizationUnit?: string|null,
     * } $issuedBy
     */
    public function withIssuedBy(IssuedBy|array $issuedBy): self
    {
        $self = clone $this;
        $self['issuedBy'] = $issuedBy;

        return $self;
    }

    /**
     * @param IssuedTo|array{
     *   commonName?: string|null,
     *   organization?: string|null,
     *   organizationUnit?: string|null,
     * } $issuedTo
     */
    public function withIssuedTo(IssuedTo|array $issuedTo): self
    {
        $self = clone $this;
        $self['issuedTo'] = $issuedTo;

        return $self;
    }

    /**
     * The time the certificate is valid from.
     */
    public function withValidFrom(\DateTimeInterface $validFrom): self
    {
        $self = clone $this;
        $self['validFrom'] = $validFrom;

        return $self;
    }

    /**
     * The time the certificate is valid to.
     */
    public function withValidTo(\DateTimeInterface $validTo): self
    {
        $self = clone $this;
        $self['validTo'] = $validTo;

        return $self;
    }
}
