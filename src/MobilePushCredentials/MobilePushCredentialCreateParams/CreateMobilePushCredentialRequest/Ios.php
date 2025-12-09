<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type IosShape = array{
 *   alias: string, certificate: string, privateKey: string, type?: 'ios'
 * }
 */
final class Ios implements BaseModel
{
    /** @use SdkModel<IosShape> */
    use SdkModel;

    /**
     * Type of mobile push credential. Should be <code>ios</code> here.
     *
     * @var 'ios' $type
     */
    #[Required]
    public string $type = 'ios';

    /**
     * Alias to uniquely identify the credential.
     */
    #[Required]
    public string $alias;

    /**
     * Certificate as received from APNs.
     */
    #[Required]
    public string $certificate;

    /**
     * Corresponding private key to the certificate as received from APNs.
     */
    #[Required('private_key')]
    public string $privateKey;

    /**
     * `new Ios()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Ios::with(alias: ..., certificate: ..., privateKey: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Ios)->withAlias(...)->withCertificate(...)->withPrivateKey(...)
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
    public static function with(
        string $alias,
        string $certificate,
        string $privateKey
    ): self {
        $self = new self;

        $self['alias'] = $alias;
        $self['certificate'] = $certificate;
        $self['privateKey'] = $privateKey;

        return $self;
    }

    /**
     * Alias to uniquely identify the credential.
     */
    public function withAlias(string $alias): self
    {
        $self = clone $this;
        $self['alias'] = $alias;

        return $self;
    }

    /**
     * Certificate as received from APNs.
     */
    public function withCertificate(string $certificate): self
    {
        $self = clone $this;
        $self['certificate'] = $certificate;

        return $self;
    }

    /**
     * Corresponding private key to the certificate as received from APNs.
     */
    public function withPrivateKey(string $privateKey): self
    {
        $self = clone $this;
        $self['privateKey'] = $privateKey;

        return $self;
    }
}
