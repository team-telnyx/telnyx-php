<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CreateAndroidPushCredentialRequestShape = array{
 *   alias: string, projectAccountJsonFile: array<string,mixed>, type?: 'android'
 * }
 */
final class CreateAndroidPushCredentialRequest implements BaseModel
{
    /** @use SdkModel<CreateAndroidPushCredentialRequestShape> */
    use SdkModel;

    /**
     * Type of mobile push credential. Should be <code>android</code> here.
     *
     * @var 'android' $type
     */
    #[Required]
    public string $type = 'android';

    /**
     * Alias to uniquely identify the credential.
     */
    #[Required]
    public string $alias;

    /**
     * Private key file in JSON format.
     *
     * @var array<string,mixed> $projectAccountJsonFile
     */
    #[Required('project_account_json_file', map: 'mixed')]
    public array $projectAccountJsonFile;

    /**
     * `new CreateAndroidPushCredentialRequest()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CreateAndroidPushCredentialRequest::with(
     *   alias: ..., projectAccountJsonFile: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CreateAndroidPushCredentialRequest)
     *   ->withAlias(...)
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
     * @param array<string,mixed> $projectAccountJsonFile
     */
    public static function with(
        string $alias,
        array $projectAccountJsonFile
    ): self {
        $self = new self;

        $self['alias'] = $alias;
        $self['projectAccountJsonFile'] = $projectAccountJsonFile;

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
     * Private key file in JSON format.
     *
     * @param array<string,mixed> $projectAccountJsonFile
     */
    public function withProjectAccountJsonFile(
        array $projectAccountJsonFile
    ): self {
        $self = clone $this;
        $self['projectAccountJsonFile'] = $projectAccountJsonFile;

        return $self;
    }
}
