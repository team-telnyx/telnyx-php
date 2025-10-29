<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\Type;

/**
 * Creates a new mobile push credential.
 *
 * @see Telnyx\MobilePushCredentials->create
 *
 * @phpstan-type MobilePushCredentialCreateParamsShape = array{
 *   alias: string,
 *   certificate: string,
 *   privateKey: string,
 *   type: Type|value-of<Type>,
 *   projectAccountJsonFile: array<string, mixed>,
 * }
 */
final class MobilePushCredentialCreateParams implements BaseModel
{
    /** @use SdkModel<MobilePushCredentialCreateParamsShape> */
    use SdkModel;
    use SdkParams;

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
    #[Api('private_key')]
    public string $privateKey;

    /**
     * Type of mobile push credential. Should be <code>android</code> here.
     *
     * @var value-of<Type> $type
     */
    #[Api(enum: Type::class)]
    public string $type;

    /**
     * Private key file in JSON format.
     *
     * @var array<string, mixed> $projectAccountJsonFile
     */
    #[Api('project_account_json_file', map: 'mixed')]
    public array $projectAccountJsonFile;

    /**
     * `new MobilePushCredentialCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MobilePushCredentialCreateParams::with(
     *   alias: ...,
     *   certificate: ...,
     *   privateKey: ...,
     *   type: ...,
     *   projectAccountJsonFile: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new MobilePushCredentialCreateParams)
     *   ->withAlias(...)
     *   ->withCertificate(...)
     *   ->withPrivateKey(...)
     *   ->withType(...)
     *   ->withProjectAccountJsonFile(...)
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
     *
     * @param Type|value-of<Type> $type
     * @param array<string, mixed> $projectAccountJsonFile
     */
    public static function with(
        string $alias,
        string $certificate,
        string $privateKey,
        Type|string $type,
        array $projectAccountJsonFile,
    ): self {
        $obj = new self;

        $obj->alias = $alias;
        $obj->certificate = $certificate;
        $obj->privateKey = $privateKey;
        $obj['type'] = $type;
        $obj->projectAccountJsonFile = $projectAccountJsonFile;

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
        $obj->privateKey = $privateKey;

        return $obj;
    }

    /**
     * Type of mobile push credential. Should be <code>android</code> here.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    /**
     * Private key file in JSON format.
     *
     * @param array<string, mixed> $projectAccountJsonFile
     */
    public function withProjectAccountJsonFile(
        array $projectAccountJsonFile
    ): self {
        $obj = clone $this;
        $obj->projectAccountJsonFile = $projectAccountJsonFile;

        return $obj;
    }
}
