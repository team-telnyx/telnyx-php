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
 * @see Telnyx\Services\MobilePushCredentialsService::create()
 *
 * @phpstan-type MobilePushCredentialCreateParamsShape = array{
 *   alias: string,
 *   certificate: string,
 *   private_key: string,
 *   type: Type|value-of<Type>,
 *   project_account_json_file: array<string,mixed>,
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
    #[Api]
    public string $private_key;

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
     * @var array<string,mixed> $project_account_json_file
     */
    #[Api(map: 'mixed')]
    public array $project_account_json_file;

    /**
     * `new MobilePushCredentialCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * MobilePushCredentialCreateParams::with(
     *   alias: ...,
     *   certificate: ...,
     *   private_key: ...,
     *   type: ...,
     *   project_account_json_file: ...,
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
     * @param array<string,mixed> $project_account_json_file
     */
    public static function with(
        string $alias,
        string $certificate,
        string $private_key,
        Type|string $type,
        array $project_account_json_file,
    ): self {
        $obj = new self;

        $obj['alias'] = $alias;
        $obj['certificate'] = $certificate;
        $obj['private_key'] = $private_key;
        $obj['type'] = $type;
        $obj['project_account_json_file'] = $project_account_json_file;

        return $obj;
    }

    /**
     * Alias to uniquely identify the credential.
     */
    public function withAlias(string $alias): self
    {
        $obj = clone $this;
        $obj['alias'] = $alias;

        return $obj;
    }

    /**
     * Certificate as received from APNs.
     */
    public function withCertificate(string $certificate): self
    {
        $obj = clone $this;
        $obj['certificate'] = $certificate;

        return $obj;
    }

    /**
     * Corresponding private key to the certificate as received from APNs.
     */
    public function withPrivateKey(string $privateKey): self
    {
        $obj = clone $this;
        $obj['private_key'] = $privateKey;

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
     * @param array<string,mixed> $projectAccountJsonFile
     */
    public function withProjectAccountJsonFile(
        array $projectAccountJsonFile
    ): self {
        $obj = clone $this;
        $obj['project_account_json_file'] = $projectAccountJsonFile;

        return $obj;
    }
}
