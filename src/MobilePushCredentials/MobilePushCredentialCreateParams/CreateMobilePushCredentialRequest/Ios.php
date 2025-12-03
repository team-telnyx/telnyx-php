<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type IosShape = array{
 *   alias: string, certificate: string, private_key: string, type: 'ios'
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
    #[Api]
    public string $type = 'ios';

    /**
     * Alias to uniquely identify the credential.
     */
    #[Api]
    public string $alias;

    /**
     * Certificate as received from APNs.
     */
    #[Api]
    public string $certificate;

    /**
     * Corresponding private key to the certificate as received from APNs.
     */
    #[Api]
    public string $private_key;

    /**
     * `new Ios()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Ios::with(alias: ..., certificate: ..., private_key: ...)
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
        string $private_key
    ): self {
        $obj = new self;

        $obj->alias = $alias;
        $obj->certificate = $certificate;
        $obj->private_key = $private_key;

        return $obj;
    }

    /**
     * Alias to uniquely identify the credential.
     */
    public function withAlias(string $alias): self
    {
        $obj = clone $this;
        $obj->alias = $alias;

        return $obj;
    }

    /**
     * Certificate as received from APNs.
     */
    public function withCertificate(string $certificate): self
    {
        $obj = clone $this;
        $obj->certificate = $certificate;

        return $obj;
    }

    /**
     * Corresponding private key to the certificate as received from APNs.
     */
    public function withPrivateKey(string $privateKey): self
    {
        $obj = clone $this;
        $obj->private_key = $privateKey;

        return $obj;
    }
}
