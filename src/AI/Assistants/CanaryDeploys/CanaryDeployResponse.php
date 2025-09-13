<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\CanaryDeploys;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Response model for canary deploy operations.
 *
 * @phpstan-type canary_deploy_response = array{
 *   assistantID: string,
 *   createdAt: \DateTimeInterface,
 *   updatedAt: \DateTimeInterface,
 *   versions: list<VersionConfig>,
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class CanaryDeployResponse implements BaseModel
{
    /** @use SdkModel<canary_deploy_response> */
    use SdkModel;

    #[Api('assistant_id')]
    public string $assistantID;

    #[Api('created_at')]
    public \DateTimeInterface $createdAt;

    #[Api('updated_at')]
    public \DateTimeInterface $updatedAt;

    /** @var list<VersionConfig> $versions */
    #[Api(list: VersionConfig::class)]
    public array $versions;

    /**
     * `new CanaryDeployResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CanaryDeployResponse::with(
     *   assistantID: ..., createdAt: ..., updatedAt: ..., versions: ...
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CanaryDeployResponse)
     *   ->withAssistantID(...)
     *   ->withCreatedAt(...)
     *   ->withUpdatedAt(...)
     *   ->withVersions(...)
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
     * @param list<VersionConfig> $versions
     */
    public static function with(
        string $assistantID,
        \DateTimeInterface $createdAt,
        \DateTimeInterface $updatedAt,
        array $versions,
    ): self {
        $obj = new self;

        $obj->assistantID = $assistantID;
        $obj->createdAt = $createdAt;
        $obj->updatedAt = $updatedAt;
        $obj->versions = $versions;

        return $obj;
    }

    public function withAssistantID(string $assistantID): self
    {
        $obj = clone $this;
        $obj->assistantID = $assistantID;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj->updatedAt = $updatedAt;

        return $obj;
    }

    /**
     * @param list<VersionConfig> $versions
     */
    public function withVersions(array $versions): self
    {
        $obj = clone $this;
        $obj->versions = $versions;

        return $obj;
    }
}
