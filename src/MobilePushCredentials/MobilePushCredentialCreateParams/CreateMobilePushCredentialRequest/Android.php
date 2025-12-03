<?php

declare(strict_types=1);

namespace Telnyx\MobilePushCredentials\MobilePushCredentialCreateParams\CreateMobilePushCredentialRequest;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type AndroidShape = array{
 *   alias: string, project_account_json_file: array<string,mixed>, type: 'android'
 * }
 */
final class Android implements BaseModel
{
    /** @use SdkModel<AndroidShape> */
    use SdkModel;

    /**
     * Type of mobile push credential. Should be <code>android</code> here.
     *
     * @var 'android' $type
     */
    #[Api]
    public string $type = 'android';

    /**
     * Alias to uniquely identify the credential.
     */
    #[Api]
    public string $alias;

    /**
     * Private key file in JSON format.
     *
     * @var array<string,mixed> $project_account_json_file
     */
    #[Api(map: 'mixed')]
    public array $project_account_json_file;

    /**
     * `new Android()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Android::with(alias: ..., project_account_json_file: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Android)->withAlias(...)->withProjectAccountJsonFile(...)
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
     * @param array<string,mixed> $project_account_json_file
     */
    public static function with(
        string $alias,
        array $project_account_json_file
    ): self {
        $obj = new self;

        $obj->alias = $alias;
        $obj->project_account_json_file = $project_account_json_file;

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
     * Private key file in JSON format.
     *
     * @param array<string,mixed> $projectAccountJsonFile
     */
    public function withProjectAccountJsonFile(
        array $projectAccountJsonFile
    ): self {
        $obj = clone $this;
        $obj->project_account_json_file = $projectAccountJsonFile;

        return $obj;
    }
}
